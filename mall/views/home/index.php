<?php
/**
 * Created by PhpStorm.
 * User: youfind006
 * Date: 2018/9/5
 * Time: 16:36
 */
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

    <div class="row">

        <div id="myCarousel" class="carousel slide">
            <!-- 轮播（Carousel）指标 -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner">
                <?php
                foreach($top3 as $k => $top_hot_item) {
                    $image = $k+1;
                    $image_url = Html::a('<img src="https://img14.360buyimg.com/n7/jfs/t24490/225/1613521471/279579/866ca48c/5b63f12fNdc088210.jpg" alt="First slide" width="1600" height="400">', ['home/detail', 'id' => $top_hot_item['id']]);
                    if(!$k) {
                        $div = <<<DIV
            <div class="item active">
                {$image_url}
                <div class="carousel-caption">{$top_hot_item['goods_name']}</div>
            </div>
DIV;
                    } else {
                        $div = <<<DIV
            <div class="item">
                {$image_url}
                <div class="carousel-caption">{$top_hot_item['goods_name']}</div>
            </div>
DIV;
                    }

                    echo $div;
                }
                ?>
            </div>

            <!-- 轮播（Carousel）导航按钮 -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
<div class="row" style="margin-top: 50px"></div>
<?php
    foreach($goods_list as $goods_item) {
        $goods_name = trim(strip_tags($goods_item['goods_name']));
        $goods_detail_url = Html::a("<div class='col-md-2'><img src='https://img14.360buyimg.com/n7/jfs/t24490/225/1613521471/279579/866ca48c/5b63f12fNdc088210.jpg' alt='' class='img-thumbnail'><span>".mb_substr($goods_name, 0, 14) . '...'."</span><br>￥ ".$goods_item['current_original_price']."</div>", ['home/detail', 'id' => $goods_item['id']], ['title' => $goods_name]);
        echo $goods_detail_url;
    }

echo LinkPager::widget([
    'pagination' => $page,
])
?>