<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Fakultas;

/* @var $this yii\web\View */
/* @var $model app\models\prodi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prodi-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'id_fakultas')->dropDownList(ArrayHelper::map(Fakultas::find()->all(),'id_fakultas','nama_fakultas'), ['prompt' => 'Pilih'])->label('Fakultas'); ?>

    <?= $form->field($model, 'prodi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
