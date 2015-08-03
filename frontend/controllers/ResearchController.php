<?php

namespace frontend\controllers;

use Yii;
use yii\base\Model;
use common\models\DocumentType;
use common\models\Document;
use common\models\Research;
use frontend\models\search\ResearchSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\search\DocumentSearch;
use Intervention\Image\ImageManagerStatic;
use trntv\filekit\actions\DeleteAction;
use trntv\filekit\actions\UploadAction;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;

use common\models\ResearchLog;
/**
 * ResearchController implements the CRUD actions for Research model.
 */
class ResearchController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access'=>[
                'class'=>AccessControl::className(),
                'rules'=>[
                  [
                    'allow'=>true,
                    'roles'=>['@']
                  ]
                ]
            ]
        ];
    }

    /**
     * @return array
     */
    public function actions()
    {
        return [
            'document-upload' => [
                'class' => UploadAction::className(),
                'deleteRoute' => 'document-delete',
                'on afterSave' => function ($event) {
                    /* @var $file \League\Flysystem\File */
                    // $file = $event->file;
                    // $img = ImageManagerStatic::make($file->read())->fit(215, 215);
                    // $file->put($img->encode());
                }
            ],
            'document-delete' => [
                'class' => DeleteAction::className()
            ]
        ];
    }

    /**
     * Lists all Research models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ResearchSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Research model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model,
            'documents'=>$this->findDocuments($model->id)
        ]);
    }

    /**
     * Creates a new Research model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Research([
            'scenario'=>'default',
            'submission_status' => Research::SUBMISSION_STATUS_DRAFT
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->addLog($model->id,serialize($model->attributes),'create','Create Record');
            return $this->redirect(['attach-files', 'research_id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Research model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        $this->checkAccess($model);

          if ($model->load(Yii::$app->request->post()) && $model->save()) {
               $this->addLog($model->id,serialize($model->attributes),'update','Update Record');
               return $this->redirect(['attach-files', 'research_id' => $model->id]);
          } else {
              return $this->render('update', [
                  'model' => $model,
              ]);
          }
    }

    /**
     * Deletes an existing Research model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (($model = Research::find()->byDraft($id)->one()) !== null) {
           $this->addLog($model->id,serialize($model->attributes),'delete','Delete Record');
           $model->delete();
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Research model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Research the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Research::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findDocuments($research_id)
    {
        if (count($model = Document::find()->byResearch($research_id)->all()) > 0) {
            return $model;
        } else {
           $this->createDocument($research_id);
           return $this->findDocuments($research_id);
        }
    }

    public function actionAttachFiles($research_id){

        $documents = $this->findDocuments($research_id);
        $model = $this->findModel($research_id);
        $this->checkAccess($model);

        if (Model::loadMultiple($documents, Yii::$app->request->post()) && Model::validateMultiple($documents)) {
            foreach ($documents as $document) {

                $document->save(false);
            }
            $this->addLog($research_id,serialize($documents),'attachfile','Attach file');

            return $this->redirect(['view', 'id' => $research_id]);
        }

        return $this->render('attach-files', [
            'research_id' => $research_id,
            'documents'=>$documents,
            'research'=>$documents[0]->research,
        ]);
    }

    protected function createDocument($research_id){

        $documentTypes = DocumentType::find()->all();

        foreach ($documentTypes as $doc) {
           $model = Yii::createObject([
                'class' => Document::className(),
                'research_id' => $research_id,
                'document_type_id' => $doc->id
           ]);

           $model->save();
           unset($model);
        }
    }

    public function actionSubmission($research_id){

        $model = $this->findModel($research_id);
        $model->scenario='submission';

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->submission_status = Research::SUBMISSION_STATUS_SUBMIT;
            $model->submit_at = time();
            if($model->save()){
                $this->addLog($research_id,serialize($model->attributes),'submit','Submition file');
                Yii::$app->getSession()->setFlash('alert',[
                'body'=>'ลงทะเบียนงานวิจัยเสร็จเรียบร้อย! เจ้าหน้าที่จะติดต่อกลับไปเร็วที่สุด..',
                'options'=>['class'=>'alert-success']
                ]);
                return $this->redirect(['index']);
            }else{
                return $this->refersh();
            }
        }

        return $this->render('submission',[
            'model' => $model
        ]);
    }

    public function checkAccess(Research $model){
      if (!Yii::$app->user->can('updateOwnResearch', ['research' => $model])) {
        throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
      }
    }

    public function addLog($research_id,$data,$type,$message=''){
      $model = new ResearchLog;
      $model->research_id = $research_id;
      $model->message = $message;
      $model->data = $data;
      $model->type = $type;
      $model->save();
    }
}
