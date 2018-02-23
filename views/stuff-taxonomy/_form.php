<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\gf\ActiveRecord\StuffTaxonomy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stuff-taxonomy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'measure') ?>

    <?= $form->field($model, 'parent') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
