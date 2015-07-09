<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\ResearchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('frontend', 'Attach File');
$this->params['breadcrumbs'][] = ['label' => strip_tags(Yii::t('frontend', 'Researches')), 'url' => ['index']];
$this->params['breadcrumbs'][] = strip_tags($this->title);
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="container">    
            <div class="row bs-wizard" style="border-bottom:0;">
                
                <div class="col-xs-3 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">ข้อมูลงานวิจัย</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="<?=Url::to(['research/update','id'=>$research->id]);?>" class="bs-wizard-dot"></a>
                  
                </div>
                
                <div class="col-xs-3 bs-wizard-step active"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">แนบไฟล์เอกสาร</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="<?=Url::to(['research/attach-files','research_id'=>$research->id]);?>" class="bs-wizard-dot"></a>
                 
                </div>

                 <div class="col-xs-3 bs-wizard-step disabled"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">ตรวจสอบข้อมูล</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="<?=Url::to(['research/attach-files','research_id'=>$research->id]);?>" class="bs-wizard-dot"></a>
                 
                </div>
                
                <div class="col-xs-3 bs-wizard-step disabled"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">ส่งงานวิจัย</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  
                </div>
            </div>
  </div>

<div class="research-attach panel panel-default">
<div class="panel-body">
<p> <label> ชื่องานวิจัย : </label> <?= $research->name_th; ?></p>

        <?php $form = ActiveForm::begin(); ?>
<blockquote>
    <p>หลังจากอัพโหลดไฟล์เสร็จทุกรายการ กรุณาคลิกบันทึกที่ด้านล่างด้วยครับ..</p>
</blockquote>
        <table class="table table-bordered">
        <tbody>
        <?php
        $i=1;
        foreach ($documents as $index => $document) {
            echo "<tr><td style='width:30px;text-align:center;'><strong>{$i}</strong></td><td>".($document->filename?'<i style="color:green;" class="glyphicon glyphicon-ok"></i> ':'')."{$document->documentType->name}</td><td style='width:80px;'>";
            echo \trntv\filekit\widget\Upload::widget([
                                'model'=>$document,
                                'attribute'=>"[{$index}]attach_file",
                                'url'=>['document-upload'],
                                'sortable'=>true,
                                'maxFileSize'=>10 * 1024 * 1024, 
                                'maxNumberOfFiles'=>1, // default 1
                            ]);
            echo '</td></tr>';
            $i++;
        }
        ?>
        </tbody>
        </table>
            <div class="form-group">
                    <?= Html::submitButton('SAVE', ['class' =>'btn btn-yellow btn-lg btn-block']) ?>
            </div>
        <?php ActiveForm::end(); ?>
</div>
</div>
