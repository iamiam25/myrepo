<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\db\ActiveRecord;
//use yii\behaviors\TimestampBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "checkuser".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $comment
 * @property string $checkin
 * @property integer $status
 *
 * @property Users $user
 */
class Checkuser extends \yii\db\ActiveRecord
{
   // public $checkin_formatted;
    public $str_date;
    public $end_date;
    /**

     * @inheritdoc
     */
    public static function tableName()
    {
        return 'checkuser';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'],'required' ],
            [['user_id', 'status' ], 'integer'],
            [['status'], 'default', 'value' => '0'],
           [['checkin'], 'filter', 'filter' => function ($value) {
                if(!preg_match("/^[\d\+]+$/",$value) && $value > 0){
                    return strtotime($value);
                }
                else{
                    return $value;
                }
            }],
         //   [['str_date','end_date'], 'date', 'format' => 'd-m-yyyy'],
            [['comment'], 'string', 'max' => 250]

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
            'comment' => 'Коммент',
            'checkin' => 'Дата/вермя',
            'status' => 'Статус',
        ];
    }

    /**
     * @inheritdoc
     * write checkin timestamp in base when doing data save to database
     */

    public function behaviors()
     {
         return [
             [
                 'class' => TimestampBehavior::className(),
                 'createdAtAttribute' => 'checkin',
                 'updatedAtAttribute' => false, //обновление атрибута
                 'value' => function() { return date('U'); },

                     //new Expression('NOW()'),
             ],
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
