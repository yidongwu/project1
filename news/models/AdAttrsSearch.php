<?php

namespace news\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use news\models\AdAttrs;

/**
 * AdAttrsSearch represents the model behind the search form of `news\models\AdAttrs`.
 */
class AdAttrsSearch extends AdAttrs
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'goods_id', 'type_id', 'is_display', 'is_delete', 'create_time', 'update_time'], 'integer'],
            [['attr_name'], 'safe'],
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
        $query = AdAttrs::find();

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
            'goods_id' => $this->goods_id,
            'type_id' => $this->type_id,
            'is_display' => $this->is_display,
            'is_delete' => $this->is_delete,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'attr_name', $this->attr_name]);

        return $dataProvider;
    }
}
