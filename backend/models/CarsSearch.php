<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Cars;

/**
 * CarsSearch represents the model behind the search form about `backend\models\Cars`.
 */
class CarsSearch extends Cars
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'make_id', 'model_id', 'year', 'condition_id', 'exterior_color', 'interior_color', 'interior_type', 'transmission', 'engine', 'drivetrain', 'body_type', 'featured', 'status', 'type', 'location', 'ad_type', 'date_created', 'date_edited', 'lang_id'], 'integer'],
            [['slug', 'name', 'title', 'image', 'description', 'price', 'milage', 'inspection'], 'safe'],
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
        $query = Cars::find();

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
            'user_id' => $this->user_id,
            'make_id' => $this->make_id,
            'model_id' => $this->model_id,
            'year' => $this->year,
            'condition_id' => $this->condition_id,
            'exterior_color' => $this->exterior_color,
            'interior_color' => $this->interior_color,
            'interior_type' => $this->interior_type,
            'transmission' => $this->transmission,
            'engine' => $this->engine,
            'drivetrain' => $this->drivetrain,
            'body_type' => $this->body_type,
            'featured' => $this->featured,
            'status' => $this->status,
            'type' => $this->type,
            'location' => $this->location,
            'ad_type' => $this->ad_type,
            'date_created' => $this->date_created,
            'date_edited' => $this->date_edited,
            'lang_id' => $this->lang_id,
        ]);

        $query->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'milage', $this->milage])
            ->andFilterWhere(['like', 'inspection', $this->inspection]);

        return $dataProvider;
    }
}
