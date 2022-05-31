<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "opiniujacy".
 *
 * @property int $id
 * @property string $nazwa
 * @property string $email
 */
class Opiniujacy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'opiniujacy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nazwa', 'email'], 'required'],
            [['id'], 'integer'],
            [['nazwa'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nazwa' => 'Nazwa',
            'email' => 'Email',
        ];
    }
     public function getRekomendacje() 
    {
        return $this->hasMany(Rekomendacje::className(), ['id_opiniujacego'=>'id']);
    }
}
