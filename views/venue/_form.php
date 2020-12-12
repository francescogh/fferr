<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Venue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venue-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'postcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'venueCategory')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'websiteURL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mapURL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hasStudySpace')->textInput() ?>

    <?= $form->field($model, 'hasPoolTable')->textInput() ?>

    <?= $form->field($model, 'hasPingPong')->textInput() ?>

    <?= $form->field($model, 'hasLiveMusic')->textInput() ?>

    <?= $form->field($model, 'hasDanceHall')->textInput() ?>

    <?= $form->field($model, 'hasSportStreaming')->textInput() ?>

    <?= $form->field($model, 'about')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'layoutStyleId')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
