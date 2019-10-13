<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BreedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Breeds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="breed-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Breed', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'density',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
