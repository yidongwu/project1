<?php
use yii\helpers\Url;
use yii\helpers\Html;

$news_menu_list = $this->params['news_menu_list'];
?>

<!--头条热点--[start]-->
    <div class="row">
    <h3 class="text-left">TOP - 今日热点</h3>

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
            foreach($news_lists['top'] as $k => $top_hot_item) {
                $image = $k+1;
                $image_url = Html::a('<img src="static/images/'.$image.'.jpg" alt="First slide" width="1600" height="900">', ['news/view', 'id' => $top_hot_item['id'],'name'=>substr(md5($top_hot_item['title']),0,15),'type' => $top_hot_item['type']]);
                if(!$k) {
                    $div = <<<DIV
            <div class="item active">
                {$image_url}
                <div class="carousel-caption">{$top_hot_item['title']}</div>
            </div>
DIV;
                } else {
                    $div = <<<DIV
            <div class="item">
                {$image_url}
                <div class="carousel-caption">{$top_hot_item['title']}</div>
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
<!--头条热点--[end]-->

<div class="row">
    <!--各导航栏的头条循环展示--[start]-->
    <div class="list-group">
        <?php
        foreach($news_lists['items'] as $k => $news_item) {
            $img = 2;
            $more = Html::a('更多>>', [$news_menu_list[$k]['url']]);
            $image_url = Html::a('<img src="static/images/'.$img.'.jpg" alt="First slide" width="1600" height="900">', ['news/view', 'id' => $news_item['id'],'name'=>substr(md5($news_item['title']),0,15),'type' => $news_item['type']]);
            $type_item = <<<Type
        <h3 class="text-left">TOP - {$news_menu_list[$k]['name']} <small>{$more}</small></h3>
        <div class="carousel slide">
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner">
                <div class="item active">
                    {$image_url}
                    <div class="carousel-caption">{$news_item['title']}</div>
                </div>
            </div>
        </div>
Type;
            echo $type_item;
            // echo Html::a($news_item['title'], ['news/view', 'id' => $news_item['id'],'name'=>substr(md5($news_item['title']),0,15),'type' => $news_item['type']], ['class' => 'list-group-item active']);
        }
        ?>
    </div>
    <!--各导航栏的头条循环展示--[start]-->
</div>







