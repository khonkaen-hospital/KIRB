<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Research;
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
                'format'=>'raw',
                'value'=>function($model){
                    return '<span style="display: block;line-height:20px;" class="label '.$model->submissionStatusColor.'" >'.$model->submissionStatusLabel.'</span>';
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
                'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>',
                'buttons'=> [
                  'update'=> function($url, $model, $key){
                      return $model->SubmisstionStatusEdit ? Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['class'=>'btn btn-default']) : null;
                  },
                  'delete'=> function($url, $model, $key){
                    $options = [
                      'title' => Yii::t('yii', 'Delete'),
                      'aria-label' => Yii::t('yii', 'Delete'),
                      'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                      'data-method' => 'post',
                      'data-pjax' => '0',
                      'class'=>'btn btn-default'
                    ];
                      return $model->SubmisstionStatusEdit ? Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options) : null;
                  }
                ]
            ],
       ],
    ]); ?>

</div>
