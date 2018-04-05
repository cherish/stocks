<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\bootstrap\Alert;

$this->title = '会员注册--军民融合';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
<?php if (Yii::$app->session->hasFlash('success')): ?>
        <?= Alert::widget([
		'options' => [
			'class' => 'alert-success',
		],
		'body' => '恭喜你注册成功',
	]);
       ?>
        <p>
            <?= Html::a('登陆', ['/site/login'], ['class' => 'profile-link']) ?>
        </p>
        <?php else: ?>
        <div class="row">
            <div class="col-lg-6">
                <?php
                    $form = ActiveForm::begin([
                                'id' => 'contact-form',
                    ]);
                    ?>
                    <?= $form->field($model, 'mobile', ['enableAjaxValidation' => true])->textInput() ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?=
                    $form->field($model, 'verifyCode', ['enableAjaxValidation' => true])->widget(Captcha::className(), [
                        'captchaAction' => 'site/captcha',
                        'imageOptions' => ['id' => 'captchaimg', 'alt' => '点击换图', 'title' => '点击换图', 'style' => 'cursor:pointer'],
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ])
                ?>
                <div class="form-group">
                        <?= Html::submitButton('立即注册', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    
                        <?= Html::a('登陆', ['/site/login'], ['class' => 'profile-link']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <?php endif; ?>
</div>