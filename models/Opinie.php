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
 * @property string|null $data_opiniowania
 */
class Opinie extends \yii\db\ActiveRecord
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
        ];
    }
     public function getRaporty() 
    {
        return $this->hasMany(Raporty::className(), ['id'=>'id_zapotrzebowania']);
    }
}
