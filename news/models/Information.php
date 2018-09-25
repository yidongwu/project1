<?php

namespace news\models;

use Yii;
use yii\mongodb\ActiveRecord;

/**
 * This is the model class for table "ad_menu".
 *
 * @property string $id 自增id
 * @property string $type 菜单类型.0后台,1前台
 * @property string $parent_id 上级菜单id
 * @property string $name 名称
 * @property string $url url地址
 * @property string $icon 图标
 * @property double $sort 排序
 * @property int $is_display 是否显示.0否,1是
 * @property string $created_at 创建时间
 * @property string $updated_at 最后修改时间
 */
class Information extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return ['_id','id', 'title', 'date', 'create_date', 'content','source','url','display','delete'];
    }

    /**
     * {@inheritdoc}
     */

}
