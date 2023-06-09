<?php

use app\models\Trabajos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TrabajosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Trabajos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trabajos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Trabajos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idtrabajos',
            'fechaI',
            'fechaF',
            'descripcion',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Trabajos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idtrabajos' => $model->idtrabajos]);
                 }
            ],
        ],
    ]); ?>


</div>
