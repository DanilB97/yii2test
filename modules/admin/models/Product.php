<?php

namespace app\modules\admin\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property \yii\web\UploadedFile $img
 * @property int $price
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'price'], 'required'],
            [['category_id', 'price'], 'integer'],
            [['name'], 'string', 'max' => 60],
            [['name'], 'unique'],
            [['img'], 'file', 'extensions' => 'png, jpg']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'img' => 'Image',
            'price' => 'Price',
        ];
    }

    public function uploadImage($filename)
    {
        $this->img->saveAs(\Yii::$app->basePath . '/web/product/' . $filename, false);
    }

    public function generateName()
    {
        return time() . uniqid($this->img->baseName) . ".{$this->img->extension}";
    }
}
