<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\gf\ActiveRecord\StuffTaxonomy */

$this->title = 'Create Stuff Taxonomy';
$this->params['breadcrumbs'][] = ['label' => 'Stuff Taxonomies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stuff-taxonomy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
