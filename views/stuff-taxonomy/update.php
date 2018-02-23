<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\gf\ActiveRecord\StuffTaxonomy */

$this->title = 'Update Stuff Taxonomy: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Stuff Taxonomies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => (string)$model->_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stuff-taxonomy-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
