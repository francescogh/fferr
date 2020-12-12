<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VenueSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venue-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'city') ?>

    <?= $form->field($model, 'country') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'postcode') ?>

    <?php // echo $form->field($model, 'venueCategory') ?>

    <?php // echo $form->field($model, 'websiteURL') ?>

    <?php // echo $form->field($model, 'mapURL') ?>

    <?php // echo $form->field($model, 'tel1') ?>

    <?php // echo $form->field($model, 'tel2') ?>

    <?php // echo $form->field($model, 'hasStudySpace') ?>

    <?php // echo $form->field($model, 'hasPoolTable') ?>

    <?php // echo $form->field($model, 'hasPingPong') ?>

    <?php // echo $form->field($model, 'hasLiveMusic') ?>

    <?php // echo $form->field($model, 'hasDanceHall') ?>

    <?php // echo $form->field($model, 'hasSportStreaming') ?>

    <?php // echo $form->field($model, 'about') ?>

    <?php // echo $form->field($model, 'layoutStyleId') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
