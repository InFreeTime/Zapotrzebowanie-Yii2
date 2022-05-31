<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int|null $id_opiniujacy
 * @property string $username
 * @property string $imie
 * @property string $nazwisko
 * @property string $dostep_admin
 * @property string $dostep_user
 */
class Uzytkownicy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_opiniujacy', 'id_dzialu'], 'integer'],
            [['username', 'imie', 'nazwisko', 'dostep_admin', 'dostep_user', 'id_dzialu'], 'required'],
            [['dostep_admin', 'dostep_user'], 'string'],
            [['username', 'imie', 'nazwisko'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_opiniujacy' => 'Id Opiniujacy',
            'id_dzialu' => 'Id Dzialu',
            'username' => 'Username',
            'imie' => 'Imie',
            'nazwisko' => 'Nazwisko',
            'dostep_admin' => 'Dostep Admin',
            'dostep_user' => 'Dostep User',
        ];
    }
      public function getRaporty() 
    {
        return $this->hasMany(Raporty::className(), ['id_user'=>'id']);
    }
      public function getRekomendacje() 
    {
        return $this->hasMany(Rekomendacje::className(), ['id_user'=>'id']);
    }
}
