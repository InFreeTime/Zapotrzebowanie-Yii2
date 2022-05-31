<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Raporty;
use yii;

/**
 * RaportySearch represents the model behind the search form of `app\models\Raporty`.
 */
class RaportySearch extends Raporty
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
//    public function kto($kto) {
//        
//        $ciag = $this-> kto_opiniuje;
//        
//        $i = explode(",", $ciag);
//        switch ($i){
//            case 0:
//                $kto=0;
//                break;
//            case 1:
//                $kto=1;
//                break;
//            case 2:
//                $kto=2;
//                break;
//            case 3:
//                $kto=3;
//                break;
//            default:
//                $kto=0;
//        
//    }
//    }
    public function search($params)
    {
//        $ciag = $this-> kto_opiniuje;
//        
//        $j = explode(",", $ciag);
//        for($i=0; $i < count($j); $i++){
//            if($j[$i] == 1){
//                $kto= $j[$i];
//            }else{
//                $kto =0;
//            }
//            
//        }
       if (isset(Yii::$app->user->identity->id_dzialu)){
           $id_dzial = Yii::$app->user->identity->id_dzialu;
       }else{
           $id_dzial =0;
       }
        
        if ($id_dzial ==1){
            
                    $query = Raporty::find()->where(['=' ,'id_dzialu', 1]);
            
        }else{
                    $query = Raporty::find();
            
        }
         
        
        
//        $query = Raporty::find()->where(['like' ,'kto_opiniuje', $kto]);
//        
//        $query->orFilterWhere(['=', 'id_user', 1]);

        $query->andFilterWhere(['like' ,'archiwum', 'nie']);

               


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
