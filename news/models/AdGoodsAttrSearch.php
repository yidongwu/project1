<?php

namespace news\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use news\models\AdGoodsAttr;

/**
 * AdGoodsAttrSearch represents the model behind the search form of `news\models\AdGoodsAttr`.
 */
class AdGoodsAttrSearch extends AdGoodsAttr
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'attr_id', 'goods_id', 'is_display', 'is_delete', 'create_time', 'update_time'], 'integer'],
            [['attr_value'], 'safe'],
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
        $query = AdGoodsAttr::find();

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
            'attr_id' => $this->attr_id,
            'goods_id' => $this->goods_id,
            'is_display' => $this->is_display,
            'is_delete' => $this->is_delete,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'attr_value', $this->attr_value]);

        return $dataProvider;
    }
}
