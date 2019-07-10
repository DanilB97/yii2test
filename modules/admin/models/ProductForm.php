<?php

namespace app\modules\admin\models;


use yii\base\Model;

class ProductForm extends Model
{
    /** @var $img \yii\web\UploadedFile */
    public $img;
    public $category_id;
    public $name;
    public $price;


    public function rules()
    {
        return [
            ['name', 'required'],
            [['category_id', 'price'], 'integer'],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    public function uploadImage($filename)
    {
        $this->img->saveAs(\Yii::$app->basePath . '/web/product/' . $filename);
    }

    public function generateName()
    {
        return time() . uniqid($this->img->baseName) . ".{$this->img->extension}";
    }
}