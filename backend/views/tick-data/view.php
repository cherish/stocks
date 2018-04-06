<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TickData */

$this->title = $model->date;
$this->params['breadcrumbs'][] = ['label' => 'Tick Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tick-data-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'date' => $model->date, 'code' => $model->code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'date' => $model->date, 'code' => $model->code], [
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
            'index',
            'date',
            'open',
            'close',
            'high',
            'low',
            'volume',
            'code',
        ],
    ]) ?>

</div>
