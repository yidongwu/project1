<?php

namespace mall\models;

use Yii;

/**
 * This is the model class for table "ad_cart".
 *
 * @property int $id 表主键，自增长
 * @property int $uid 用户id
 * @property int $pid 商品id
 * @property string $sumprice 本商品总价
 * @property int $quantity 总数量
 * @property string $price 商品价格
 * @property int $saved save for later 状态 1:保存，0:马上订购
 * @property int $addtime 生成时间
 */
class AdCart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ad_cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'pid', 'addtime', 'state'], 'required'],
            [['uid', 'pid', 'quantity', 'saved', 'addtime', 'state'], 'integer'],
            [['sumprice', 'price'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'pid' => 'Pid',
            'sumprice' => 'Sumprice',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'saved' => 'Saved',
            'state' => 'State',
            'addtime' => 'Addtime',
        ];
    }

    public function getGoodsName() {
        return $this->hasOne(AdGoods::className(), ['id' => 'pid']);
    }
}
