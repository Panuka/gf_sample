<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\gf\ActiveRecord\Operation */

$this->title = 'Update Operation: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Operations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => (string)$model->_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="operation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
