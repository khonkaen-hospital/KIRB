<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ResearchSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="research-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'kecode') ?>

    <?php echo $form->field($model, 'date_receive') ?>

    <?php echo $form->field($model, 'no_receive') ?>

    <?php echo $form->field($model, 'name_th') ?>

    <?php // echo $form->field($model, 'name_en') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'type_id') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'fund_id') ?>

    <?php // echo $form->field($model, 'fund_description') ?>

    <?php // echo $form->field($model, 'detail') ?>

    <?php // echo $form->field($model, 'submission_status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'submit_at') ?>

    <?php // echo $form->field($model, 'reject_at') ?>

    <?php // echo $form->field($model, 'approve_at') ?>

    <?php // echo $form->field($model, 'success_at') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
