<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Venue;

/**
 * VenueSearch represents the model behind the search form of `app\models\Venue`.
 */
class VenueSearch extends Venue
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hasStudySpace', 'hasPoolTable', 'hasPingPong', 'hasLiveMusic', 'hasDanceHall', 'hasSportStreaming', 'layoutStyleId'], 'integer'],
            [['name', 'city', 'country', 'address', 'postcode', 'venueCategory', 'websiteURL', 'mapURL', 'tel1', 'tel2', 'about'], 'safe'],
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
        $query = Venue::find();

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
            'hasStudySpace' => $this->hasStudySpace,
            'hasPoolTable' => $this->hasPoolTable,
            'hasPingPong' => $this->hasPingPong,
            'hasLiveMusic' => $this->hasLiveMusic,
            'hasDanceHall' => $this->hasDanceHall,
            'hasSportStreaming' => $this->hasSportStreaming,
            'layoutStyleId' => $this->layoutStyleId,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'postcode', $this->postcode])
            ->andFilterWhere(['like', 'venueCategory', $this->venueCategory])
            ->andFilterWhere(['like', 'websiteURL', $this->websiteURL])
            ->andFilterWhere(['like', 'mapURL', $this->mapURL])
            ->andFilterWhere(['like', 'tel1', $this->tel1])
            ->andFilterWhere(['like', 'tel2', $this->tel2])
            ->andFilterWhere(['like', 'about', $this->about]);

        return $dataProvider;
    }
}
