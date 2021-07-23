<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;
use app\models\Prodi;
use app\models\Fakultas;
use app\models\Provinces;
use app\models\Regencies;
use app\models\Districts;
use app\models\Villages;

/* @var $this yii\web\View */
/* @var $model app\models\Mahasiswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?php $model->isNewRecord==1? $model->jekel='L':$model->jekel; ?>

    <?= $form->field($model, 'jekel')->radioList(array('L'=>'Laki-laki','P'=>'Perempuan'))->label('Jenis Kelamin') ?>

    <?= $form->field($model, 'tgl')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Pilih Tanggal ...'],
        'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd-M-yyyy'  ]
    ]); ?>

    <?= $form->field($model, 'id_fakultas')->dropDownList(Fakultas::getFakultas(),
        ['id'=>'fakultas','prompt'=>'Select Jurusan...'])
    ?>


    <?=  $form->field($model, 'id_prodi')
        ->widget(DepDrop::classname(), 
            [
            'data' => Prodi::getProdiList($model->id_fakultas), 
            'options' => ['id' => 'prodi','prompt' => 'Select Prodi.....'],
            'pluginOptions' => [
                'depends' => ['fakultas'],
                'placeholder' => 'Select Prodi.....',
                'url' => Url::to(['mahasiswa/subcat'])
            ]
        ])
    ?>

    <?= $form->field($model, 'id_provinsi')->dropDownList(Provinces::getProv(),
        ['id'=>'provinces','prompt'=>'Select Provinsi...'])
    ?>

    <?=  $form->field($model, 'id_kab')
        ->widget(DepDrop::classname(), 
            [
            'data' => Regencies::getKab($model->id_provinsi), 
            'options' => ['id' => 'name','prompt' => 'Select Kab/Kota.....'],
            'pluginOptions' => [
                'depends' => ['provinces'],
                'placeholder' => 'Select Kab/Kota.....',
                'url' => Url::to(['mahasiswa/kab'])
            ]
        ])
    ?>
    


      <!-- $form->field($model, 'id_kel')
        ->widget(DepDrop::classname(), 
            [
            'data' => Districts::getKelurahan($model->id_kab), 
            'options' => ['id' => 'name','prompt' => 'Select Kecamatan.....'],
            'pluginOptions' => [
                'depends' => ['provinces','regencies'],
                'placeholder' => 'Select Kecamatan.....',
                'url' => Url::to(['mahasiswa/kel'])
            ]
        ]) -->
    
    
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(array('rows'=>4)) ?>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

        <?= $form->field($model, 'foto')->fileInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <!-- <button>Submit</button> -->

    <?php ActiveForm::end() ?>

    <?php ActiveForm::end(); ?>

</div>
