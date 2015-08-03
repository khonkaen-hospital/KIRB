<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Research */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Research',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Researches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="research-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
