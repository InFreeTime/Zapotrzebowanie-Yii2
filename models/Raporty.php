<?php

namespace app\models;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use Yii;

/**
 * This is the model class for table "raporty".
 *
 * @property int $id
 * @property string|null $data_utworzenia
 * @property string $przedmiot
 * @property int $id_user
 * @property int $id_user
 * @property string $opis
 * @property float|null $budzet
 * @property float|null $kwota_zakupu
 * @property string|null $kto_opiniuje
 * @property string|null $FV
 * @property string $status
 * @property string $archiwum
 */
class Raporty extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'raporty';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['data_utworzenia'], 'safe'],
            [['przedmiot', 'id_user', 'id_dzialu', 'opis'], 'required'],
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
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'data_utworzenia' => 'Data Utworzenia',
            'przedmiot' => 'Przedmiot',
            'id_user' => 'Id User',
            'id_dzialu' => 'Id dzialu',
            'opis' => 'Opis',
            'budzet' => 'Budzet',
            'kwota_zakupu' => 'Kwota Zakupu',
            'kto_opiniuje' => 'Kto Opiniuje',
            'FV' => 'Fv',
            'status' => 'Status',
            'archiwum' => 'Archiwum',
            'uzytkownicyNazwa' => Yii::t('app', 'Wytworzył'),
        ];
    }

    public function getListaDropdown() {
        $opiniujacy = Opiniujacy::find()->all();
        $listaOpiniujacy = ArrayHelper::map($opiniujacy, 'id', 'nazwa');

        return $listaOpiniujacy;
    }

    public function getUzytkownicy() {
        return $this->hasOne(Uzytkownicy::className(), ['id' => 'id_user']);
    }

    /* Pobiera nazwę dzialu */

    public function getUzytkownicyNazwa() {
        if (!empty($this->uzytkownicy->imie . ' ' . $this->uzytkownicy->nazwisko)) {
            return $this->uzytkownicy->imie . ' ' . $this->uzytkownicy->nazwisko;
        } else {
            return null;
        }
    }

    public function getOpinie() {
        return $this->hasOne(Opinie::className(), ['id_zapotrzebowania' => 'id']);
    }

    public function getPrzycisk() {

        $query = Opinie::find()
                        ->where(['id_zapotrzebowania' => $this->opinie->id_zapotrzebowania])
                        ->andWhere(['id_opiniujacego' => Yii::$app->user->identity->id_opiniujacy])->count();
        if ($query == 1) {
            $czy_istnieje = true;
        } else {
            $czy_istnieje = false;
        }

        $j = explode(",", $this->kto_opiniuje);
        if (in_array(Yii::$app->user->identity->id_opiniujacy, $j)) {
            $kto = Yii::$app->user->identity->id_opiniujacy;
        } else {
            $kto = false;
        }

        $sprawdz_opinie = Html::a('Przeglądaj<span class="glyphicon glyphicon-print"></span>',
                        ['rekomendacje/index', 'id_zapotrzebowania' => $this->id],
                        ['class' => 'btn btn-xs btn-info']);
        if ($kto != 0 && $czy_istnieje != true) {


            $dodaj_opinie = Html::a('Dodaj <i class="fa fa-plus fa-lg" aria-hidden="true"></i>',
                            ['rekomendacje/create', 'id' => $this->id, 'id_opiniujacego' => $this->kto_opiniuje],
                            ['class' => 'btn btn-success']);
        } else {
            $dodaj_opinie = null;
        }
        return $sprawdz_opinie . $dodaj_opinie;
    }

}
