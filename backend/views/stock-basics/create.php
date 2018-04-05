<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\StockBasics */

$this->title = 'Create Stock Basics';
$this->params['breadcrumbs'][] = ['label' => 'Stock Basics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-basics-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
