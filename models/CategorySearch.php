<?php


namespace app\models;


use yii\data\ActiveDataProvider;

class CategorySearch extends Category
{
    public function rules()
    {
        return [
            [['name'], 'safe']
        ];
    }

    public function search($search)
    {
        $query = parent::find();
        $dataProvider = new ActiveDataProvider(['query' => $query]);
        $this->load($search);

        if(!$this->validate()){
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }

}