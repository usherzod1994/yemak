<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ye_restaurant_cat".
 *
 * @property int $id
 * @property int|null $rest_id
 * @property int|null $cat_id
 *
 * @property Category $cat
 * @property Restaurant $rest
 */
class RestaurantCat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ye_restaurant_cat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rest_id', 'cat_id'], 'integer'],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['cat_id' => 'id']],
            [['rest_id'], 'exist', 'skipOnError' => true, 'targetClass' => Restaurant::className(), 'targetAttribute' => ['rest_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rest_id' => 'Rest ID',
            'cat_id' => 'Cat ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Category::className(), ['id' => 'cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRest()
    {
        return $this->hasOne(Restaurant::className(), ['id' => 'rest_id']);
    }
}
