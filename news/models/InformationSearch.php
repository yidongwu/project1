<?php

namespace news\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\mongodb\Query;
use news\models\Information;

/**
 * AdMenuSearch represents the model behind the search form of `news\models\AdMenu`.
 */
class InformationSearch extends Information
{
    public function rules()
    {
        return [
            [['display','id'], 'integer'],
            [['title', 'url', 'date','source'], 'safe']
        ];
    }

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
        $query = self::find()->select(['_id','id','title', 'date','url','source','display','delete']);
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $provider;
        }

        $query->andFilterWhere([
            'source' => $this->source
        ]);
        return $provider;
        $models = $provider->getModels();
        return $models;
    }

/*    public function search($params)
    {
        $query = new Query();
        $query->select(['title', 'date','url','source','display','delete'])->from('news')->limit(10);
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $provider;
        }

        $query->andFilterWhere([
            'source' => $this->source
        ]);
        return $provider;
        $models = $provider->getModels();
        return $models;
    }*/
}
