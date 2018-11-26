<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$reset_link = Yii::$app->urlManager->createAbsoluteUrl(['v1/users/verify-registration', 'token' => $model->reset_token, 'email' =>$model->user_email]);
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($model->full_name) ?>,</p>

    <p>Click this link to verify your account:</p>

    <a href = '<?= Html::encode($reset_link) ?>'><?= Html::encode($reset_link) ?></a>
</div>
