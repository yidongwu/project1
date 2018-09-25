<?php

namespace news\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use news\models\News;

/**
 * NewsSearch represents the model behind the search form of `news\models\News`.
 */
class NewsSearch extends News
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['_id', 'id', 'title', 'content', 'date', 'create_date', 'url', 'source', 'display', 'delete'], 'safe'],
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
        $query = News::find();

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
        $query->andFilterWhere(['like', '_id', $this->_id])
            ->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'create_date', $this->create_date])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'display', $this->display])
            ->andFilterWhere(['like', 'delete', $this->delete]);

        return $dataProvider;
    }
}
