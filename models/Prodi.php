<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prodi".
 *
 * @property int $id
 * @property string $prodi
 * @property string $keterangan
 */
class Prodi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prodi';
    }

    public static function getProdiList($fakultasID, $dependent = false)
    {
        $subCategory = self::find()
        ->select(['prodi as name', 'id'])
        ->where(['id_fakultas' => $fakultasID])
        ->asArray()
        ->all();

        return $subCategory;
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prodi', 'keterangan'], 'required'],
            [['prodi', 'keterangan'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prodi' => 'Prodi',
            'keterangan' => 'Keterangan',
        ];
    }
}
