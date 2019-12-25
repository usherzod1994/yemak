<?php
/**
 * @var $this \yii\web\View
 * @var $searchModel \app\models\CategorySearch
 * @var $dataProvider \yii\data\ActiveDataProvider
 */

use yii\grid\GridView;

echo GridView::widget([
    'filterModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        ['class' => 'yii\grid\ActionColumn']
    ],
]);

