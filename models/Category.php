<?php


namespace app\models;


use yii\db\ActiveRecord;

/**
 * Class Category
 * @package app\models
 * @property int $id
 * @property string $name
 */

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%category}}';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
        ];
    }

    public function getRestaurantCats()
    {
        return $this->hasMany(RestaurantCat::className(), ['cat_id' => 'id']);
    }


}