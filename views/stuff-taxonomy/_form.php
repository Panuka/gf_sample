<?php

use yii\helpers\Html;
use yii\jui\AutoComplete;
use yii\jui\Tabs;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\gf\ActiveRecord\StuffTaxonomy */
/* @var $availableCategory array */
/* @var $form yii\widgets\ActiveForm */

//$complateParams = [
//    'clientOptions' => [
//        'source' => $availableCategory,
//    ],
//    'options' => [
//        'class' => 'form-control'
//    ]
//];

?>

<div class="stuff-taxonomy-form">
    <div>
        <?php $form = ActiveForm::begin();

        $title = $form->field($model, 'title');
        $parent = $form->field($model, 'parent_id')->dropDownList(\app\models\gf\ActiveRecord\StuffTaxonomy::getCategoriesComplit(), ['prompt'=>'Select Category']);
        $groupFormHtml = '';
        $groupFormHtml .= $title;
        $groupFormHtml .= $parent;
        $groupFormHtml .= $form->field($model, 'is_group')->hiddenInput();

        $elementFormHtml = '';
        $elementFormHtml .= $title;
        $elementFormHtml .= $parent;
        $elementFormHtml .= $form->field($model, 'measure');
        ?>
        <?= Tabs::widget([
            'items' => [
                [
                    'label' => 'Group',
                    'content' => $groupFormHtml
                ],
                [
                    'label' => 'Stuff',
                    'content' => $elementFormHtml
                ]
            ],
            'options' => ['tag' => 'div'],
            'itemOptions' => ['tag' => 'div'],
            'clientOptions' => ['collapsible' => false],
        ]); ?>


        <br>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

<?php
    $script = <<< JS
    $('#w0').submit(function () {
        $('.ui-tabs-panel[aria-hidden=true]').remove();
        var isGroup = $('#w1-tab0').attr('aria-hidden')=='false';
        $('#stufftaxonomy-is_group').val(isGroup?1:0);
    });
JS;
    $this->registerJs($script, yii\web\View::POS_READY);
