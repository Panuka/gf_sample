<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\gf\ActiveRecord\Roadmap */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="roadmap-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'steps') ?>

    <?= $form->field($model, 'outVolume') ?>

    <?= $form->field($model, 'uid') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>