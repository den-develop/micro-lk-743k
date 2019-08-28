<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\SessionAction */

$this->title = 'Update Session Action: ' . $model->session_action_id;
$this->params['breadcrumbs'][] = ['label' => 'Session Actions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->session_action_id, 'url' => ['view', 'id' => $model->session_action_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="session-action-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
