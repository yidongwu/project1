<?php

namespace api_log\models;

use Yii;

/**
 * This is the model class for table "ad_goods".
 *
 * @property string $id
 * @property string $parent_type_id 商品父类id，如：家电，移动设备等，这个是父类
 * @property string $type_id 商品类别，如：电视，手机等，这个是子类
 * @property string $goods_name 商品名称
 * @property string $current_original_price 商品当前价格
 * @property string $old_original_price 商品旧价格
 * @property string $brand_id 商品品牌id
 * @property string $goods_url 商品url
 * @property string $goods_pic_url 商品缩略图url
 * @property string $create_time
 * @property string $update_time
 * @property int $is_display 是否显示，1显示，0不显示
 * @property int $is_delete 是否删除，0删除，1删除
 */
class AdGoods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ad_goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_type_id', 'type_id', 'current_original_price', 'old_original_price', 'goods_url', 'goods_pic_url', 'create_time', 'update_time'], 'required'],
            [['parent_type_id', 'type_id', 'brand_id', 'create_time', 'update_time', 'is_display', 'is_delete', 'stock'], 'integer'],
            [['current_original_price', 'old_original_price'], 'number'],
            [['goods_name'], 'string', 'max' => 1024],
            [['goods_url', 'goods_pic_url'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_type_id' => 'Parent Type ID',
            'type_id' => 'Type ID',
            'goods_name' => 'Goods Name',
            'current_original_price' => 'Current Original Price',
            'old_original_price' => 'Old Original Price',
            'brand_id' => 'Brand ID',
            'goods_url' => 'Goods Url',
            'goods_pic_url' => 'Goods Pic Url',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'is_display' => 'Is Display',
            'is_delete' => 'Is Delete',
        ];
    }

    public function getGoodsAttrs() {
        return $this->hasMany(AdGoodsAttr::className(), ['goods_id' => 'id']);
    }
}
