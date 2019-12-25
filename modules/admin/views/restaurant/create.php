<?php

/**
 * @var $this \yii\web\View
 * @var $model \app\models\Restaurant
 * @var $categories array
 */

use kartik\time\TimePicker;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = "Restaurant Add";
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin();
?>

<?= $form->field($model, 'categories')->dropDownList($categories) ?>
<?= $form->field($model, 'name')->textInput() ?>
<?= $form->field($model, 'phone')->textInput() ?>
<?= $form->field($model, 'address')->textInput() ?>
<?= $form->field($model, 'start_time')->widget(TimePicker::className(), [
//    'name' => 'start_time',
    'pluginOptions' => [
        'showSeconds' => true,
        'showMeridian' => false,
        'minuteStep' => 1,
        'secondStep' => 5,
    ]
]) ?>
<?//= TimePicker::widget([
//    'name' => 'start_time',
//    'pluginOptions' => [
//        'showSeconds' => true,
//        'showMeridian' => false,
//        'minuteStep' => 1,
//        'secondStep' => 5,
//    ]
//]); ?>
<?= $form->field($model, 'end_time')->widget(TimePicker::className(), [
    'pluginOptions' => [
        'showSeconds' => true,
        'showMeridian' => false,
        'minuteStep' => 1,
        'secondStep' => 5,
    ]
]) ?>
<?= $form->field($model, 'file')->fileInput() ?>

<?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>

<?php ActiveForm::end(); ?>
