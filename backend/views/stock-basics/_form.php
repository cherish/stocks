<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StockBasics */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-basics-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'industry')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pe')->textInput() ?>

    <?= $form->field($model, 'outstanding')->textInput() ?>

    <?= $form->field($model, 'totals')->textInput() ?>

    <?= $form->field($model, 'totalAssets')->textInput() ?>

    <?= $form->field($model, 'liquidAssets')->textInput() ?>

    <?= $form->field($model, 'fixedAssets')->textInput() ?>

    <?= $form->field($model, 'reserved')->textInput() ?>

    <?= $form->field($model, 'reservedPerShare')->textInput() ?>

    <?= $form->field($model, 'esp')->textInput() ?>

    <?= $form->field($model, 'bvps')->textInput() ?>

    <?= $form->field($model, 'pb')->textInput() ?>

    <?= $form->field($model, 'timeToMarket')->textInput() ?>

    <?= $form->field($model, 'undp')->textInput() ?>

    <?= $form->field($model, 'perundp')->textInput() ?>

    <?= $form->field($model, 'rev')->textInput() ?>

    <?= $form->field($model, 'profit')->textInput() ?>

    <?= $form->field($model, 'gpr')->textInput() ?>

    <?= $form->field($model, 'npr')->textInput() ?>

    <?= $form->field($model, 'holders')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
