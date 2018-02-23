<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\gf\ActiveRecord\Roadmap */
/* @var $form yii\widgets\ActiveForm */
/* @var $form yii\widgets\ActiveForm */
/* @var $catalogsDto \app\application\roadmap\dto\CatalogsDto */
?>
<style>
    .flow, .flow > div {
        display: block;
        padding: 9.5px;
        margin: 0 0 10px;
        font-size: 13px;
        line-height: 1.42857143;
        color: #333;
        word-break: break-all;
        word-wrap: break-word;
        background-color: #f5f5f5;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
<div class="roadmap-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title') ?>
    <?= $form->field($model, 'outVolume') ?>
    <?= $form->field($model, 'uid') ?>

    <div id="roadmap">
        <div class="col-md-4">
            <div id="categories" ref="categories"
                 data-json="<?= htmlspecialchars(json_encode($catalogsDto->taxonomyDto->toInlineArray())) ?>">
                <div is="cat-item"
                     v-for="(cat, index) in categories"
                     v-bind:key="cat._id"
                     v-bind:title="cat.title"
                     v-bind:level="cat.level"
                ></div>
            </div>
            <hr>
            <div>Действия</div>
            <div id="operations" ref="operations"
                 data-json="<?= htmlspecialchars(json_encode($catalogsDto->operationsDto)) ?>">
                <div is="cat-item"
                     v-for="(cat, index) in operations"
                     v-bind:key="cat.id"
                     v-bind:title="cat.title"
                ></div>
            </div>
        </div>




        <div class="col-md-8 flow">
            <table class="table table-striped table-bordered step">
                <tr>
                    <td colspan="3">Шаг 1.</td>
                </tr>
                <tr>
                    <td>Сырье</td>
                    <td>Курица</td>
                    <td>10гр</td>
                </tr>
                <tr>
                    <td>Операции</td>
                    <td colspan="2">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>2</td>
                                <td>Резка кубиками</td>
                                <td>Очень быстро!</td>
                                <td>10 сек</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Доп. сырье</td>
                    <td colspan="2">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>Курица</td>
                                <td>10гр</td>
                            </tr>
                            <tr>
                                <td>Курица</td>
                                <td>10гр</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>


            <table class="table table-striped table-bordered step">
                <tr>
                    <td colspan="3">Шаг 2.</td>
                </tr>
                <tr>
                    <td>Операции</td>
                    <td colspan="2">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>2</td>
                                <td>Резка кубиками</td>
                                <td>Очень быстро!</td>
                                <td>10 сек</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>


        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<script src="/roadmap.js"></script>


