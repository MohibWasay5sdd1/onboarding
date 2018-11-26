<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

//$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['v1/users/app/reset-password', 'token' => $model->resetToken]);
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($model->userName) ?>,</p>

  <p> You are successfully registered to a free trial version of 30 days. Your due date to purchase the application is the last day of the trial period. In order to avail the premium version, please check an invoice sent to your email account.</p>
<p></p>
<p>Thank you.</p>
    <!-- <p><strong><?= Html::encode($model->resetCode) ?></strong></p> -->
</div>
