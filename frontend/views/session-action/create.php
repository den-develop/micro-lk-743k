<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\SessionAction */

$this->title = 'Create Session Action';
$this->params['breadcrumbs'][] = ['label' => 'Session Actions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="session-action-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
