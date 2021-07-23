<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MahasiswaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nim') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'jekel') ?>

    <?= $form->field($model, 'tgl') ?>

    <?php echo $form->field($model, 'id_fakultas') ?>

    <?php  echo $form->field($model, 'id_prodi') ?>

    <?php  echo $form->field($model, 'id_provinsi') ?>

    <?php  echo $form->field($model, 'id_kab') ?>

    <?php echo $form->field($model, 'email') ?>

    <?php  echo $form->field($model, 'alamat') ?>

    <?php  echo $form->field($model, 'foto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
