<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TickData */

$this->title = 'Create Tick Data';
$this->params['breadcrumbs'][] = ['label' => 'Tick Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tick-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
