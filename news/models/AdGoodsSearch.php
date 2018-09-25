<?php

namespace news\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use news\models\AdGoods;

/**
 * AdGoodsSearch represents the model behind the search form of `news\models\AdGoods`.
 */
class AdGoodsSearch extends AdGoods
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'parent_type_id', 'type_id', 'brand_id', 'create_time', 'update_time', 'is_display', 'is_delete'], 'integer'],
            [['goods_name', 'goods_url', 'goods_pic_url'], 'safe'],
            [['current_original_price', 'old_original_price'], 'number'],
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
        $query = AdGoods::find();

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
            'parent_type_id' => $this->parent_type_id,
            'type_id' => $this->type_id,
            'current_original_price' => $this->current_original_price,
            'old_original_price' => $this->old_original_price,
            'brand_id' => $this->brand_id,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'is_display' => $this->is_display,
            'is_delete' => $this->is_delete,
        ]);

        $query->andFilterWhere(['like', 'goods_name', $this->goods_name])
            ->andFilterWhere(['like', 'goods_url', $this->goods_url])
            ->andFilterWhere(['like', 'goods_pic_url', $this->goods_pic_url]);

        return $dataProvider;
    }
}
