<?php


namespace app\modules\admin\controllers;


use app\models\Category;
use app\models\Restaurant;
use app\models\RestaurantSearch;
use Cassandra\Time;
use Yii;
use yii\helpers\ArrayHelper;
use yii\i18n\Formatter;
use yii\web\Controller;

class RestaurantController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new RestaurantSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate()
    {
        $model = new Restaurant();
        $categories = Category::find()->all();
        $categories = ArrayHelper::map($categories, 'id', 'name');

        if ($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'categories' => $categories
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Restaurant::findOne(['id' => $id]);

        $categories = Category::find()->all();
        $categories = ArrayHelper::map($categories, 'id', 'name');

        if ($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'categories' => $categories
        ]);

    }

    public function actionTime(){
        $formatter = new Formatter();
        return $formatter->asTime( time(), 'H:i:s');
    }

}