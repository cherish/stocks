<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TickDataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tick-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'index') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'open') ?>

    <?= $form->field($model, 'close') ?>

    <?= $form->field($model, 'high') ?>

    <?php // echo $form->field($model, 'low') ?>

    <?php // echo $form->field($model, 'volume') ?>

    <?php // echo $form->field($model, 'code') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
