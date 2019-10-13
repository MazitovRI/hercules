<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Str */

$this->title = 'Создать улицу';
$this->params['breadcrumbs'][] = ['label' => 'Улицы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="str-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'city' => $city
    ]) ?>

</div>
