<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SessionActionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="session-action-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'session_action_id') ?>

    <?= $form->field($model, 'session_id') ?>

    <?= $form->field($model, 'action_type') ?>

    <?= $form->field($model, 'action_data') ?>

    <?= $form->field($model, 'action_time') ?>

    <?php // echo $form->field($model, 'action_data_raw') ?>

    <?php // echo $form->field($model, 'action_type_raw') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
