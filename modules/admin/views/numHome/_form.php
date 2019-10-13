<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NumHome */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="num-home-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Номер') ?>

    <?= $form->field($model, 'str_id')->widget(kartik\select2\Select2::classname(), [
        'data' => $str,
        'language' => 'ru',
        'options' => ['placeholder' => 'Выбирите улицу ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Улица') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
