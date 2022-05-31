<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Raportyarchiwum;

/**
 * RaportyarchiwumSearch represents the model behind the search form of `app\models\Raportyarchiwum`.
 */
class RaportyarchiwumSearch extends Raportyarchiwum
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_dzialu'], 'integer'],
            [['data_utworzenia', 'przedmiot', 'opis', 'kto_opiniuje', 'FV', 'status', 'archiwum'], 'safe'],
            [['budzet', 'kwota_zakupu'], 'number'],
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
        $query = Raportyarchiwum::find()
                   ->where(['=' ,'archiwum', 'tak']);

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
            'data_utworzenia' => $this->data_utworzenia,
            'id_user' => $this->id_user,
            'id_dzialu' => $this->id_dzialu,
            'budzet' => $this->budzet,
            'kwota_zakupu' => $this->kwota_zakupu,
        ]);

        $query->andFilterWhere(['like', 'przedmiot', $this->przedmiot])
            ->andFilterWhere(['like', 'opis', $this->opis])
            ->andFilterWhere(['like', 'kto_opiniuje', $this->kto_opiniuje])
            ->andFilterWhere(['like', 'FV', $this->FV])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'archiwum', $this->archiwum]);

        return $dataProvider;
    }
}
