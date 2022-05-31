<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Opinie;

/**
 * OpinieSearch represents the model behind the search form of `app\models\Opinie`.
 */
class OpinieSearch extends Opinie {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'id_zapotrzebowania', 'id_opiniujacego', 'id_user'], 'integer'],
            [['tresc', 'data_opiniowania'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Opinie::find();
                //->joinWith(['raporty']);

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
            'id_zapotrzebowania' => $this->id_zapotrzebowania,
            'id_opiniujacego' => $this->id_opiniujacego,
            'id_user' => $this->id_user,
            'data_opiniowania' => $this->data_opiniowania,
        ]);

        $query->andFilterWhere(['like', 'tresc', $this->tresc]);

        return $dataProvider;
    }

}
