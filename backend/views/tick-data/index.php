<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TickDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tick Datas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tick-data-index">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'date',
            'open',
            'close',
            'high',
            'low',
            'volume',
            'code',
            'basic.name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
