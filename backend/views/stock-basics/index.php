<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StockBasicsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-basics-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'code',
            'name',
            'industry',
            'area',
            'pe',
            //'outstanding',
            //'totals',
            //'totalAssets',
            //'liquidAssets',
            //'fixedAssets',
            //'reserved',
            //'reservedPerShare',
            //'esp',
            //'bvps',
            //'pb',
            //'timeToMarket:datetime',
            //'undp',
            //'perundp',
            //'rev',
            //'profit',
            //'gpr',
            //'npr',
            //'holders',

            [
            'class' => 'yii\grid\ActionColumn',
            'header' => '操作',
            'template' => '{view}   {update}  {detail} ',
            'buttons' => [
                'detail' => function ($url, $model) {
                    return Html::a('明细', Yii::$app->urlManager->createUrl(['/tick-data/index', 'code' => $model->code]), ['title' => '明细']);
                },
            ],
        ],
    ],
    ]); ?>
</div>
