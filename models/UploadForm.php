<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, jfif',
              'logo', 'types' => 'jpg,jpeg,png,gif', 'allowEmpty' => true],

        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            // $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->imageFile->saveAs(file_get_contents($this->imageFile->tempName));
            // $this->imageFile->saveAs('uploads/' . $this->imageFile->tempName);
            return true;
        } else {
            return false;
        }
    }

    public function beforeSave() {
    if ($file = CUploadedFile::getInstance($this, 'logo')) {
        $this->logo = file_get_contents($file->tempName);
    }
    return parent::beforeSave();
}
}