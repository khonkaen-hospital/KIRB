<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = Yii::t('frontend', 'Submission');
$this->params['breadcrumbs'][] = ['label' => strip_tags(Yii::t('frontend', 'Researches')), 'url' => ['index']];
$this->params['breadcrumbs'][] = strip_tags($this->title);
?>

<h1><?= Html::encode($this->title) ?></h1>
 <?php $form = ActiveForm::begin(); ?>
 <?= $form->errorSummary($model) ?>
<div class="container">    
            <div class="row bs-wizard" style="border-bottom:0;">
                
                <div class="col-xs-3 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">ข้อมูลงานวิจัย</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="<?=Url::to(['research/update','id'=>$model->id]);?>" class="bs-wizard-dot"></a>
                  
                </div>
                
                <div class="col-xs-3 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">แนบไฟล์เอกสาร</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="<?=Url::to(['research/attach-files','research_id'=>$model->id]);?>" class="bs-wizard-dot"></a>
                 
                </div>

                 <div class="col-xs-3 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">ตรวจสอบข้อมูล</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="<?=Url::to(['research/attach-files','research_id'=>$model->id]);?>" class="bs-wizard-dot"></a>
                 
                </div>
                
                <div class="col-xs-3 bs-wizard-step active"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">ส่งงานวิจัย</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  
                </div>
            </div>
  </div>

<div class="research-attach panel panel-default">
<div class="panel-body">

<dl class="dl-vertical">
  <p>
  	<dt>ชื่อ-นามสกุล</dt>
  	<dd><?= $model->researcherName; ?></dd>
  </p>
  <p>
  	<dt> <?= $model->getAttributeLabel('name_th') ?></dt>
  	<dd><?= $model->name_th; ?></dd>
  </p>
  <p>
  	 <dt><?= $model->getAttributeLabel('name_en') ?></dt>
  	 <dd><?= $model->name_en; ?></dd> 
  </p>


</dl>
<blockquote>

  <?= $form->field($model, 'confirm_submission')->checkbox() ?>
  <p>กรุณาตรวจสอบข้อมูลงานวิจัยให้ถูกต้อง</p>
  <small>ตรวจสอบรายละเอียดงานวิจัย</small>
  <small>ตรวจสอบเอกสารไฟล์แนบ</small>
  <small>เมื่อทำการลงทะเบียนแล้ว คุณจะไม่สามารถแก้ไขข้อมูลได้จนกว่าจะได้รับอนุญาติ</small>
  </blockquote>
<div class="form-group">
     <?= Html::submitButton('ลงทะเบียน', ['class' =>'btn btn-success btn-lg btn-block']) ?>
</div>
</div>
</div>

  <?php ActiveForm::end(); ?>