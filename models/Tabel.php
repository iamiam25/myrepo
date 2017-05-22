<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
//use yii\db\

/**
 * This is the model class for table "tabel".
 *
 * @property integer $id
 * @property integer $user_id

 * @property integer $start_d
 * @property integer $end_d
 * @property integer $worked
 * @property integer $type_d
 * @property integer $dop_time
 *
 * @property User $user
 */
class Tabel extends \yii\db\ActiveRecord
{
    public $str_date;
    public $end_date;
   // public $diff_hour;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'start_d', 'end_d', 'type_d', 'dop_time'], 'integer'],
            [['str_date','end_date'], 'safe'],
            [['worked','diff_hour'], 'number'],
            //'numberPattern' => '/^\d+(.\d{1,2})?$/'],
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
            'user_id' => 'User ID',
          //  'date1' => 'Дань',
            'start_d' => 'приход',
            'end_d' => 'уход',
            'worked' => 'отработано',
            'diff_hour' => 'Разница',
            'type_d' => 'тип дня',
            'dop_time' => 'доп время',
        ];
    }

    public static function truncTable()
    {
    //$this->cre
    $command = Yii::$app->db->createCommand();
      return  $command->truncateTable('tabel');
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
