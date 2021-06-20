<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mahasiswa".
 *
 * @property int $id
 * @property string $nim
 * @property string $nama
 * @property string $jekel
 * @property string $tgl
 * @property int $id_fakultas
 * @property int $id_prodi
 * @property string $email
 * @property string $alamat
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mahasiswa';
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nim', 'nama', 'jekel', 'tgl', 'id_fakultas', 'id_prodi', 'email', 'alamat'], 'required'],
            [['tgl'], 'safe'],
            [['id_fakultas', 'id_prodi'], 'integer'],
            [['nim'], 'string', 'max' => 18],
            [['nama', 'email'], 'string', 'max' => 50],
            [['jekel'], 'string', 'max' => 1],
            [['alamat'], 'string', 'max' => 100],
            [['id_fakultas'], 'exist', 'skipOnError' => true, 'targetClass' => Fakultas::className(), 'targetAttribute' => ['id_fakultas' => 'id']],
            [['id_prodi'], 'exist', 'skipOnError' => true, 'targetClass' => Prodi::className(), 'targetAttribute' => ['id_prodi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nim' => 'Nim',
            'nama' => 'Nama',
            'jekel' => 'Jekel',
            'tgl' => 'Tgl',
            'id_fakultas' => 'Id Fakultas',
            'id_prodi' => 'Id Prodi',
            'email' => 'Email',
            'alamat' => 'Alamat',
        ];
    }

     public function getFakultas()
    {
       return $this->hasOne(Fakultas::className(), ['id_fakultas' => 'id_fakultas']);
    }

    Public function getProdi()
    {
        return $this->hasOne(Prodi::className(), ['id' => 'id_prodi']);
    }
}
