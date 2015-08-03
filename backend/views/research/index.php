<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ResearchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Researches');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Basic Table</h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <?php echo Html::a('<i class="fa fa-plus"></i> '.Yii::t('backend', 'Create {modelClass}', [
                'modelClass' => 'Research',
            ]), ['create'], ['class' => '']) ?>
        </p>
        </div>
    </div>
    <div class="ibox-content">
      <div class="research-index">

          <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

          <p>


          <?php echo GridView::widget([
              'dataProvider' => $dataProvider,
              'filterModel' => $searchModel,
              'tableOptions'=>['class'=>'table table-condensed'],
              'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],

                  //'id',
                  'kecode',
                  // 'date_receive',
                  // 'no_receive',
                  'name_th',
                  // 'name_en',
                  // 'user_id',
                  // 'type_id',
                  // 'category_id',
                  // 'fund_id',
                  // 'fund_description',
                  // 'detail:ntext',
                  // 'submission_status',
                  // 'created_at',
                  // 'updated_at',
                  // 'submit_at',
                  // 'reject_at',
                  // 'approve_at',
                  // 'success_at',

                  ['class' => 'yii\grid\ActionColumn'],
              ],
          ]); ?>

      </div>

    </div>
</div>
