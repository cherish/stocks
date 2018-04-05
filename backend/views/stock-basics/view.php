<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StockBasics */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-basics-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->code], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'code',
            'name',
            'industry',
            'area',
            'pe',
            'outstanding',
            'totals',
            'totalAssets',
            'liquidAssets',
            'fixedAssets',
            'reserved',
            'reservedPerShare',
            'esp',
            'bvps',
            'pb',
            'timeToMarket:datetime',
            'undp',
            'perundp',
            'rev',
            'profit',
            'gpr',
            'npr',
            'holders',
        ],
    ]) ?>

</div>
