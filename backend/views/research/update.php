<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Research */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Research',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Researches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="research-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
