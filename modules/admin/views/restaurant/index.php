<?php
/**
 * @var $this \yii\web\View
 * @var $searchModel \app\models\RestaurantSearch
 * @var $dataProvider \yii\data\ActiveDataProvider
 *
 */

use yii\grid\GridView;

echo GridView::widget(
    [
        'filterModel' => $searchModel,
        'dataProvider' => $dataProvider,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
           /* 'start_time:time',
            'end_time:time',*/
            'start_time',
            'end_time',
            'phone',
            'address',
//            'created_at:datetime',
            ['class' => 'yii\grid\ActionColumn']
        ]
    ]
);