<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "raporty".
 *
 * @property int $id
 * @property string|null $data_utworzenia
 * @property string $przedmiot
 * @property int $id_user
 * @property string $opis
 * @property float|null $budzet
 * @property float|null $kwota_zakupu
 * @property string|null $kto_opiniuje
 * @property string|null $FV
 * @property string $status
 * @property string $archiwum
 */
class Raportyarchiwum extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'raporty';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_utworzenia'], 'safe'],
            [['przedmiot', 'id_user', 'opis'], 'required'],
            [['id_user', 'id_dzialu'], 'integer'],
            [['opis', 'status', 'archiwum'], 'string'],
            [['budzet', 'kwota_zakupu'], 'number'],
            [['przedmiot'], 'string', 'max' => 200],
            [['kto_opiniuje'], 'string', 'max' => 11],
            [['FV'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_utworzenia' => 'Data Utworzenia',
            'przedmiot' => 'Przedmiot',
            'id_user' => 'Id User',
            'id_dzialu' => 'Id Dzialu',
            'opis' => 'Opis',
            'budzet' => 'Budzet',
            'kwota_zakupu' => 'Kwota Zakupu',
            'kto_opiniuje' => 'Kto Opiniuje',
            'FV' => 'Fv',
            'status' => 'Status',
            'archiwum' => 'Archiwum',
        ];
    }
}
