<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TickData */

$this->title = 'Update Tick Data: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tick Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->date, 'url' => ['view', 'date' => $model->date, 'code' => $model->code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tick-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
