<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\ResearchType;
use common\models\ResearchFund;
/* @var $this yii\web\View */
/* @var $model common\models\Research */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="research-form  panel panel-default">
<div class="panel-body">


    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model); ?>
    
    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'name_th')->textArea(['maxlength' => true]) ?></div>
        <div class="col-md-6"> <?= $form->field($model, 'name_en')->textArea(['maxlength' => true]) ?></div>
    </div>
    <div class="row">
        <div class="col-md-6">
             <?= $form->field($model, 'type_id')->dropDownList(ArrayHelper::map(ResearchType::find()->all(),'id','name'),['prompt'=>'เลือกประเภทงานวิจัย...']) ?>
        </div>  
        <div class="col-md-6">
            <?= $form->field($model, 'fund_id')->dropDownList(ArrayHelper::map(ResearchFund::find()->all(),'id','name'),['prompt'=>'เลือกแหล่งเงินทุน...']) ?>
        </div>              
    </div>

    <?= $form->field($model, 'fund_description')->textArea(['maxlength' => true]) ?>
    <?= $form->field($model, 'detail')->textArea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('frontend', 'Submission') : Yii::t('frontend', 'Update'), ['class' => 'btn btn-yellow btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
</div>
</div>
