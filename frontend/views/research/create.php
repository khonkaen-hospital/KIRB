<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Research */

$this->title = strip_tags(Yii::t('frontend', 'Create Research'));
$this->params['breadcrumbs'][] = ['label' => strip_tags(Yii::t('frontend', 'Researches')), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="research-create">

    <h1><?= Html::encode($this->title) ?></h1>
<div class="container">    
            <div class="row bs-wizard" style="border-bottom:0;">
                
                <div class="col-xs-3 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">ข้อมูลงานวิจัย</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  
                </div>
                
                <div class="col-xs-3 bs-wizard-step disabled"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">แนบไฟล์เอกสาร</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                 
                </div>

                 <div class="col-xs-3 bs-wizard-step disabled"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">ตรวจสอบข้อมูล</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                 
                </div>
                
                <div class="col-xs-3 bs-wizard-step disabled"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">ส่งงานวิจัย</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  
                </div>
            </div>
  </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
