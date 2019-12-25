<?php


namespace app\modules\admin\controllers;


use app\models\Category;
use app\models\CategorySearch;
use Yii;
use yii\web\Controller;

class CategoryController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
           'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate()
    {
        $model = new Category();
        if ($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['index']);
        }

        return $this->render('create', [
           'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Category::findOne(['id' => $id]);

        if ($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model
        ]);

    }

}