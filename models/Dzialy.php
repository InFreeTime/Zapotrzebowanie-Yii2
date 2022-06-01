<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dzialy".
 *
 * @property int $id
 * @property string $nazwa_dzialu
 */
class Dzialy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dzialy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nazwa_dzialu'], 'required'],
            [['nazwa_dzialu'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nazwa_dzialu' => 'Nazwa Dzialu',
        ];
    }
     public function getRaporty() 
    {
        return $this->hasMany(Raporty::className(), ['id_dzialu'=>'id']);
    }
}
