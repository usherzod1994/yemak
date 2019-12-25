<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/**
 *
 * @var $this \yii\web\View
 * @var $model \app\models\Category
 */

$this->title = "Category Add";
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin();

?>

<?= $form->field($model, 'name')->textInput() ?>

<?=Html::submitButton('Create', ['class' => 'btn btn-success'])?>

<?php ActiveForm::end(); ?>

