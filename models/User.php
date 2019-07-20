<?php


namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $reg_date
 * @property string $level
 */
class User extends ActiveRecord implements IdentityInterface
{

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {

    }

    public function validateAuthKey($authKey)
    {

    }

    public function checkPassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }
}