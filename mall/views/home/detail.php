<?php
/**
 * Created by PhpStorm.
 * User: youfind006
 * Date: 2018/9/5
 * Time: 16:36
 */
use yii\helpers\Html;
?>

<div class="row text-center">
    <div class="col-md-4">
        <img src="https://img14.360buyimg.com/n7/jfs/t24490/225/1613521471/279579/866ca48c/5b63f12fNdc088210.jpg" alt="..." class="img-thumbnail">
    </div>
    <div class="col-md-5">
        <h1 class="text-center"><?php echo $goods_info['goods_detail']['name']; ?></h1>
        <?php
            foreach($goods_info['goods_attrs'] as $k => $goods_item) {
                $attrs = $goods_item['attr_name'] . ':' . $goods_item['attr_value'];
                echo '<h6><span class="label label-default">'.$attrs.'</span></h6>';
            }
        ?>
        <?php
            echo Html::a('加入购物车', ['cart/add', 'gid' => $goods_info['goods_detail']['gid']], ['class' => "btn btn-danger"]);
        ?>
        <?php
        echo Html::a('降价通知', ['cart/subscribe', 'gid' => $goods_info['goods_detail']['gid']], ['class' => "btn btn-danger"]);
        ?>

    </div>
    <div class="col-md-3"><img src="https://img14.360buyimg.com/n7/jfs/t24490/225/1613521471/279579/866ca48c/5b63f12fNdc088210.jpg" alt="..." class="img-thumbnail"></div>
</div>
