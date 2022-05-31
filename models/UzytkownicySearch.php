<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Uzytkownicy;

/**
 * UzytkownicySearch represents the model behind the search form of `app\models\Uzytkownicy`.
 */
class UzytkownicySearch extends Uzytkownicy
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_opiniujacy', 'id_dzialu'], 'integer'],
            [['username', 'imie', 'nazwisko', 'dostep_admin', 'dostep_user'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Uzytkownicy::find()
                ->joinWith(['raporty']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_opiniujacy' => $this->id_opiniujacy,
            'id_dzialu' => $this->id_dzialu,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'imie', $this->imie])
            ->andFilterWhere(['like', 'nazwisko', $this->nazwisko])
            ->andFilterWhere(['like', 'dostep_admin', $this->dostep_admin])
            ->andFilterWhere(['like', 'dostep_user', $this->dostep_user]);

        return $dataProvider;
    }
}
