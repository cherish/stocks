<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StockBasics */

$this->title = '更新: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => '列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stock-basics-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
