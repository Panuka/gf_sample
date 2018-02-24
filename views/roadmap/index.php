<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roadmaps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roadmap-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Roadmap', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            '_id',
//            'steps',
            'outVolume',
            'uid',

            ['class' => 'yii\grid\ActionColumn', 'buttons'=>['update'=>function(){return '';}]],
        ],
    ]); ?>
</div>
