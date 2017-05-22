<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "profiln".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $work_day
 * @property integer $rest_day
 * @property integer $work_hour
 * @property integer $dinner_hour
 * @property string $FIO
 * @property string $filial
 *
 * @property User $user
 */
class Profiln extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profiln';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'work_day', 'rest_day', 'work_hour', 'dinner_hour'], 'integer'],
            [['work_day'],'default','value' => '22'],
            [['rest_day'], 'default', 'value' => '14'],
            [['work_hour'], 'default', 'value' => '8'],
            [['dinner_hour'], 'default', 'value' => '1'],
            [['FIO'], 'required'],
            [['FIO'], 'string', 'max' => 250],
            [['filial'], 'string', 'max' => 150],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'work_day' => 'Рабочии(дни)',
            'rest_day' => 'Отпуск(дн)',
            'work_hour' => 'Рабочие(ч)',
            'dinner_hour' => 'Обед(ч)',
            'FIO' => 'ФИО',
            'filial' => 'Филиал',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
