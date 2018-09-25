<?php

namespace news\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use news\models\AdMenu;

/**
 * AdMenuSearch represents the model behind the search form of `news\models\AdMenu`.
 */
class AdMenuSearch extends AdMenu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'parent_id', 'is_display', 'created_at', 'updated_at'], 'integer'],
            [['name', 'url', 'icon'], 'safe'],
            [['sort'], 'number'],
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
        $query = AdMenu::find();

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
            'type' => $this->type,
            'parent_id' => $this->parent_id,
            'sort' => $this->sort,
            'is_display' => $this->is_display,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'icon', $this->icon]);

        return $dataProvider;
    }
}
