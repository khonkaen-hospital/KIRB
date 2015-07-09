<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\ResearchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = Yii::t('frontend', 'Researches');
$this->params['breadcrumbs'][] = strip_tags($this->title);
?>
<div class="research-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="text-right">
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('frontend', 'Submission'), ['create'], ['class' => 'btn btn-lg btn-yellow']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=>'kecode',
                'value'=>function($model){
                    return $model->kecode;
                },
                'options'=>['style'=>'width:100px;']
            ],
            // 'date_receive',
            // 'no_receive',
            [
                'header'=>'ชื่องานวิจัย',
                'format'=>'html',
                'value'=>function($model){
                    return $model->name_th.'<br><small><i> '.$model->name_en.'</i></small>';
                }
            ],
            'created_at:dateTime',
            'submit_at:dateTime',
            [
                'attribute'=>'submissionStatusLabel',
                'options'=>['style'=>'width:100px;'],
                'format'=>'html',
                'value'=>function($model){
                    return $model->submissionStatusLabel==='Draft'?'<span style="color:#DB5F5F;">'.$model->submissionStatusLabel.'</span>':$model->submissionStatusLabel;
                },
                'contentOptions'=>['class'=>'text-center','style'=>'font-weight:bold;']
            ],
            // 'name_th',
            // 'name_en',
            // 'name_en',
            // 'user_id',
            // 'create_date',
            // 'update_date',
            // 'type_id',
            // 'category_id',

            [
                'class' => 'yii\grid\ActionColumn',
                'options'=>['style'=>'width:120px;'],
                'buttonOptions'=>['class'=>'btn btn-default'],
                'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>'
         ], ],
    ]); ?>

</div>
