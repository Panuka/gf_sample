<?php

use app\models\gf\ActiveRecord\StuffTaxonomy;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stuff Taxonomies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stuff-taxonomy-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Stuff Taxonomy', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            '_id',
            'title',
            'measure',
            'parent',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
