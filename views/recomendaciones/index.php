<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecomendacionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recomendaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recomendaciones-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Recomendaciones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'usuario_id',
            'publicacion_id',
            'destinatario_id',
            'texto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
