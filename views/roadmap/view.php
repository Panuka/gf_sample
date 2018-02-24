<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\gf\ActiveRecord\Roadmap */
/* @var $this yii\web\View */
/* @var $model app\models\gf\ActiveRecord\Roadmap */
/* @var $form yii\widgets\ActiveForm */
/* @var $form yii\widgets\ActiveForm */
/* @var $catalogsDto \app\application\roadmap\dto\CatalogsDto */

$this->title = $model->_id;
$this->params['breadcrumbs'][] = ['label' => 'Roadmaps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->title;
?>
<style xmlns:v-bind="http://www.w3.org/1999/xhtml" xmlns:v-bind="http://www.w3.org/1999/xhtml">
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

<div class="roadmap-view">

    <h1><?= Html::encode($model->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => (string)$model->_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => (string)$model->_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
    <div class="roadmap-form">

        <?php $form = ActiveForm::begin(); ?>

        <div>Roadmap for <strong><?=$model->title?></strong> in volume <strong><?=$model->outVolume?></strong> [uid: <?=$model->uid?>]</div>
        <hr>
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




            <div class="col-md-8 flow" ref="roadmap"
                 data-json="<?= htmlspecialchars($model->steps) ?>">
                <table class="table table-striped table-bordered step" v-for="(step, ind) in steps" >
                    <tr>
                        <td colspan="3">Шаг {{ind+1}}.</td>
                    </tr>
                    <tr v-if="step.stuff">
                        <td>Сырье</td>
                        <td>{{step.stuff.title}}</td>
                        <td>{{step.stuff.count}} {{step.stuff.measure}}</td>
                    </tr>
                    <tr v-if="step.operations.length > 0">
                        <td>Операции</td>
                        <td colspan="2">
                            <table class="table table-striped table-bordered">
                                <tr v-for="(operation,i) in step.operations">
                                    <td>{{ actionCount(i) }}</td>
                                    <td>{{operation.title}}</td>
                                    <td v-if="operation.comment">{{operation.comment}}</td>
                                    <td>{{operation.time}} сек</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr v-if="step.stuffAddiction.length > 0">
                        <td>Доп. сырье</td>
                        <td colspan="2">
                            <table class="table table-striped table-bordered">
                                <tr v-for="stuff in step.stuffAddiction">
                                    <td>{{stuff.title}}</td>
                                    <td>{{stuff.count}} {{stuff.measure}}</td>
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

</div>

