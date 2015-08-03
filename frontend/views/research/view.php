<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Research */

$this->title = 'รายละเอียดงานวิจัย';
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Researches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="research-view">
    <h1><?= Html::encode($this->title) ?></h1>
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

                 <div class="col-xs-3 bs-wizard-step active"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">ตรวจสอบข้อมูล</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="<?=Url::to(['research/attach-files','research_id'=>$model->id]);?>" class="bs-wizard-dot"></a>

                </div>

                <div class="col-xs-3 bs-wizard-step disabled"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">ส่งงานวิจัย</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>

                </div>
            </div>
  </div>
<div class="panel panel-default">
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
          <p>
            <dt><?= $model->getAttributeLabel('researchType') ?></dt>
            <dd><?= $model->researchTypeName; ?></dd>
          </p>
          <p>
            <dt><?= $model->getAttributeLabel('researchFundName') ?></dt>
            <dd><?= $model->researchFundName; ?></dd>
          </p>
           <p>
            <dt><?= $model->getAttributeLabel('fund_description') ?></dt>
            <dd><?= $model->fund_description; ?></dd>
          </p>
           <p>
            <dt><?= $model->getAttributeLabel('detail') ?></dt>
            <dd><?= $model->detail; ?></dd>
          </p>

        </dl>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <h3> เอกสารที่แนบมา</h3>
           <table class="table table-bordered">
        <tbody>
        <?php
        $i=1;
        foreach ($documents as $index => $document) {
            echo "<tr><td style='width:30px;text-align:center;'><strong>{$i}</strong></td><td>".($document->filename?'<i style="color:green;" class="glyphicon glyphicon-ok"></i> ':'')."{$document->documentType->name}</td>";

            echo '</tr>';
            $i++;
        }
        ?>
        </tbody>
        </table>
          <?php if(Yii::$app->user->can('updateOwnResearch', ['research' => $model])): ?>
              <?= Html::a(Yii::t('frontend','Submit Research'),['research/submission','research_id'=>$model->id],['class'=>'btn btn-lg btn-block btn-success']);?>
          <?php endif ?>
    </div>

</div>
</div>
