<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Research */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="research-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'kecode')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'date_receive')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'no_receive')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'name_th')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'user_id')->textInput() ?>

    <?php echo $form->field($model, 'type_id')->textInput() ?>

    <?php echo $form->field($model, 'category_id')->textInput() ?>

    <?php echo $form->field($model, 'fund_id')->textInput() ?>

    <?php echo $form->field($model, 'fund_description')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'detail')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'submission_status')->dropDownList([ 'draft' => 'Draft', 'submit' => 'Submit', 'reject' => 'Reject', 'approve' => 'Approve', 'success' => 'Success', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'created_at')->textInput() ?>

    <?php echo $form->field($model, 'updated_at')->textInput() ?>

    <?php echo $form->field($model, 'submit_at')->textInput() ?>

    <?php echo $form->field($model, 'reject_at')->textInput() ?>

    <?php echo $form->field($model, 'approve_at')->textInput() ?>

    <?php echo $form->field($model, 'success_at')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
