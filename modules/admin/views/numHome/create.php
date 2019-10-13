<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NumHome */

$this->title = 'Добавить дом';
$this->params['breadcrumbs'][] = ['label' => 'Дома', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="num-home-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'str' => $str
    ]) ?>

</div>
