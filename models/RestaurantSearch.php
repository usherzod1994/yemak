<?php


namespace app\models;


use yii\data\ActiveDataProvider;

class RestaurantSearch extends Restaurant
{
    public function rules()
    {
        return [
            [['name','phone', 'address'], 'safe']
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
        $query->andFilterWhere(['like', 'phone', $this->phone]);
        $query->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }

}