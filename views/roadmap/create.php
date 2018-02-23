<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\gf\ActiveRecord\Roadmap */
/* @var $catalogsDto \app\application\roadmap\dto\CatalogsDto */

$this->title = 'Create Roadmap';
$this->params['breadcrumbs'][] = ['label' => 'Roadmaps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roadmap-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'catalogsDto' => $catalogsDto,
    ]) ?>

</div>
