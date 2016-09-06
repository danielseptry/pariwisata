<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TempatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tempat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama_tempat') ?>

    <?= $form->field($model, 'mlat') ?>

    <?= $form->field($model, 'mlong') ?>

    <?= $form->field($model, 'gambar') ?>

    <?php // echo $form->field($model, 'deskripsi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
