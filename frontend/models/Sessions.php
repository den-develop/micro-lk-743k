<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "sessions".
 *
 * @property int $id
 * @property int $operators_id
 * @property int $salon_id
 * @property int $tariff_id
 * @property string $time_start
 * @property string $time_finish
 * @property int $is_additional_sale
 * @property int $is_test
 * @property string $created_at
 * @property string $updated_at
 *
 * @property SessionAction[] $sessionActions
 */
class Sessions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sessions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['operators_id', 'salon_id', 'tariff_id', 'is_additional_sale', 'is_test'], 'required'],
            [['operators_id', 'salon_id', 'tariff_id', 'is_additional_sale', 'is_test'], 'integer'],
            [['time_start', 'time_finish', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'operators_id' => 'Operators ID',
            'salon_id' => 'Salon ID',
            'tariff_id' => 'Tariff ID',
            'time_start' => 'Time Start',
            'time_finish' => 'Time Finish',
            'is_additional_sale' => 'Is Additional Sale',
            'is_test' => 'Is Test',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSessionActions()
    {
        return $this->hasMany(SessionAction::className(), ['session_id' => 'id']);
    }
}
