<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $reg_date
 * @property string $level
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required'],
            [['reg_date'], 'safe'],
            [['name'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 64],
            [['password', 'level'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['password'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'reg_date' => 'Reg Date',
            'level' => 'Level',
        ];
    }
}
