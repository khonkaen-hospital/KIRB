<?php
/* @var $this \yii\web\View */
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;

/* @var $content string */

$this->beginContent('@frontend/views/layouts/base.php')
?>
<div id="content">

    <section class="page-banner-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2><?=$this->title?></h2>
                </div>
                <div class="col-md-6">

                <?php echo Breadcrumbs::widget([
                    'options'=>['class'=>'page-pagin'],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                   
                </div>
            </div>
        </div>
    </section>

    <section class="faqs-section">
        <div class="container">

            <?php if(Yii::$app->session->hasFlash('alert')):?>
                <?php 

                echo \yii\bootstrap\Alert::widget([
                    'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
                    'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
                ])?>
            <?php endif; ?>

           <?php echo $content ?>

        </div>
    </section>
</div>

        


        

 
<?php $this->endContent() ?>