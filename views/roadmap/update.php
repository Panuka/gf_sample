<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\gf\ActiveRecord\Roadmap */

$this->title = 'Update Roadmap: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Roadmaps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->_id, 'url' => ['view', 'id' => (string)$model->_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="roadmap-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
