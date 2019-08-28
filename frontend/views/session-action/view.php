<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\SessionAction */

$this->title = $model->session_action_id;
$this->params['breadcrumbs'][] = ['label' => 'Session Actions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="session-action-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->session_action_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->session_action_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'session_action_id',
            'session_id',
            'action_type:ntext',
            'action_data:ntext',
            'action_time',
            'action_data_raw',
            'action_type_raw:ntext',
            'session.operators_id',
            'session.salon_id',
        ],
    ]) ?>

</div>
