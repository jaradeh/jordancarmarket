<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FavList;

/**
 * FavListSearch represents the model behind the search form about `backend\models\FavList`.
 */
class FavListSearch extends FavList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'listing_id', 'user_id', 'status', 'date_added'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = FavList::find();

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
            'listing_id' => $this->listing_id,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'date_added' => $this->date_added,
        ]);

        return $dataProvider;
    }
}
