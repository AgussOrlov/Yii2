<?php

use app\models\Clientes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ClientesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>body{background-color: #46687D;} </style>
<div class="clientes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Clientes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idCli',
            'telefono',
            'email:email',
            'domicilio',
            'razon',
            [
                'format'=>'html',
                'value' =>function($data){return Html::img($data->logo,['width'=>'60px']);},
            ],
            'fechaAlta',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Clientes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idCli' => $model->idCli]);
                }
            ],
        ],
    ]); ?>


</div>
