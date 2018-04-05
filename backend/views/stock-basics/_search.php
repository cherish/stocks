<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StockBasicsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-basics-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'industry') ?>

    <?= $form->field($model, 'area') ?>

    <?= $form->field($model, 'pe') ?>

    <?php // echo $form->field($model, 'outstanding') ?>

    <?php // echo $form->field($model, 'totals') ?>

    <?php // echo $form->field($model, 'totalAssets') ?>

    <?php // echo $form->field($model, 'liquidAssets') ?>

    <?php // echo $form->field($model, 'fixedAssets') ?>

    <?php // echo $form->field($model, 'reserved') ?>

    <?php // echo $form->field($model, 'reservedPerShare') ?>

    <?php // echo $form->field($model, 'esp') ?>

    <?php // echo $form->field($model, 'bvps') ?>

    <?php // echo $form->field($model, 'pb') ?>

    <?php // echo $form->field($model, 'timeToMarket') ?>

    <?php // echo $form->field($model, 'undp') ?>

    <?php // echo $form->field($model, 'perundp') ?>

    <?php // echo $form->field($model, 'rev') ?>

    <?php // echo $form->field($model, 'profit') ?>

    <?php // echo $form->field($model, 'gpr') ?>

    <?php // echo $form->field($model, 'npr') ?>

    <?php // echo $form->field($model, 'holders') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
