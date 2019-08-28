<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "session_action".
 *
 * @property int $session_action_id
 * @property int $session_id
 * @property string $action_type
 * @property string $action_data
 * @property string $action_time
 * @property int $action_data_raw
 * @property string $action_type_raw
 *
 * @property Sessions $session
 */
class SessionAction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'session_action';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['session_id', 'action_type', 'action_data'], 'required'],
            [['session_id', 'action_data_raw'], 'integer'],
            [['action_type', 'action_data', 'action_type_raw'], 'string'],
            [['action_time'], 'safe'],
            [['session_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sessions::className(), 'targetAttribute' => ['session_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'session_action_id' => 'Session Action ID',
            'session_id' => 'Session ID',
            'action_type' => 'Action Type',
            'action_data' => 'Action Data',
            'action_time' => 'Action Time',
            'action_data_raw' => 'Action Data Raw',
            'action_type_raw' => 'Action Type Raw',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSession()
    {
        return $this->hasOne(Sessions::className(), ['id' => 'session_id']);
    }

    /**
     * Selects data for chart build.
     *
     * @return array
     * @throws \yii\db\Exception
     */
    public static function chartData()
    {
        return Yii::$app->db->createCommand('
            select 
                date(action_time) as date, 
                avg(action_data_raw) as seat_time
            from
                session_action
            where
                action_type_raw=:action_type_raw
            group by
                date(action_time)
            ')
            ->bindValue(':action_type_raw', 'Seat')
            ->queryAll();
    }
}
