<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SessionActionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Session Actions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="session-action-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Session Action', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'session_action_id',
            'session_id',
            'action_type:ntext',
            'action_data:ntext',
            'action_time',
            'action_data_raw',
            'action_type_raw:ntext',
            [
                'attribute' => 'session_id',
                'value' => 'session.operators_id',
                'label' => 'Operators ID'
            ],
            [
                'attribute' => 'session_id',
                'value' => 'session.salon_id',
                'label' => 'Salon ID'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
