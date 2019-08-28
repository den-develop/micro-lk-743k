<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SessionAction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="session-action-form">

    <?php
        $form = ActiveForm::begin();
    ?>

    <?= $form->field($model, 'session_id')->textInput() ?>

    <?= $form->field($model, 'action_type')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'action_data')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'action_time')->textInput() ?>

    <?= $form->field($model, 'action_data_raw')->textInput() ?>

    <?= $form->field($model, 'action_type_raw')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
