<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Research */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Researches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="research-view">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'kecode',
            'date_receive',
            'no_receive',
            'name_th',
            'name_en',
            'user_id',
            'type_id',
            'category_id',
            'fund_id',
            'fund_description',
            'detail:ntext',
            'submission_status',
            'created_at',
            'updated_at',
            'submit_at',
            'reject_at',
            'approve_at',
            'success_at',
        ],
    ]) ?>

</div>
