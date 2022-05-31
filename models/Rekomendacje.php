<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "opinie".
 *
 * @property int $id
 * @property int $id_zapotrzebowania
 * @property int $id_opiniujacego
 * @property int $id_user
 * @property string|null $tresc
 * @property string|null $rekomendacja
 * @property string|null $data_opiniowania
 */
class Rekomendacje extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'opinie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_zapotrzebowania', 'id_opiniujacego', 'id_user'], 'required'],
            [['id_zapotrzebowania', 'id_opiniujacego', 'id_user'], 'integer'],
            [['tresc'], 'string'],
            [['data_opiniowania'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_zapotrzebowania' => 'Id Zapotrzebowania',
            'id_opiniujacego' => 'Id Opiniujacego',
            'id_user' => 'Id User',
            'tresc' => 'Tresc',
            'data_opiniowania' => 'Data Opiniowania',
            'opiniujacyNazwa' => Yii::t('app', 'Opiniujacy'),
            'uzytkownicyNazwa' => Yii::t('app', 'Wytworzył'),


        ];
    }
        public function getOpiniujacy()
    {        
        return $this->hasOne(Opiniujacy::className(), ['id' => 'id_opiniujacego']);
                                   
    }
 
        /* Pobiera nazwę dzialu */
    public function getOpiniujacyNazwa() {
        if (!empty($this->opiniujacy->nazwa)){
            return $this->opiniujacy->nazwa;
        }else{
            return null;
        }
    }
           public function getUzytkownicy()
    {        
        return $this->hasOne(Uzytkownicy::className(), ['id' => 'id_user']);
                                   
    }
 
        /* Pobiera nazwę dzialu */
    public function getUzytkownicyNazwa() {
        if (!empty($this->uzytkownicy->imie . ' ' . $this->uzytkownicy->nazwisko)){
            return $this->uzytkownicy->imie . ' ' . $this->uzytkownicy->nazwisko;
        }else{
            return null;
        }
    }
}
