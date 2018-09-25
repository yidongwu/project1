<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Alert;
?>

<div class="col-sm-12">
    <div class="widget-box ">
        <div class="header text-left">
            <h4 class="lighter smaller">
                <i class="icon-comment blue"></i>
                话题：<?php echo $news_title->title; ?>
            </h4>
        </div>

        <div class="widget-body">
            <div class="widget-main no-padding">
                <div class="dialogs">
                    <?php
                    foreach($reviews_list as $review_item) {
                        $review_time = date("Y-m-d H:i:s", $review_item['date']);
                        //$review = $review_item['review'];
                        $review_id = $review_item['id'];
                        $agree_url = Html::a(" 顶<i class='icon-only icon-share-alt'>{$review_item['agree']}</i>", ['reviews/agree', 'id' => $review_item['id'], 'news_id' => $review_item['goods_news_id']], ['class' => 'btn btn-minier btn-info']);
                        $disagree_url = Html::a(" 踩<i class='icon-only icon-share-alt'>{$review_item['disagree']}</i>", ['reviews/disagree', 'id' => $review_item['id'], 'news_id' => $review_item['goods_news_id']], ['class' => 'btn btn-minier btn-info']);
                        $user = $review_item->userName->username;
                        $review = <<<REVIEW
                    <div class="itemdiv dialogdiv">
                        <div class="user">
                            <img alt="Alexa's Avatar" src="assets/avatars/avatar4.png" />
                        </div>

                        <div class="body text-left">
                            <div class="time">
                                <i class="icon-time"></i>
                                <span class="green">{$review_time}</span>
                            </div>

                            <div class="name">
                                <a href="#">{$user}</a>
                            </div>
                            <div class="text">{$review_item['review']}</div>

                            <div class="tools">
                                {$agree_url}
                                {$disagree_url}
                            </div>
                        </div>
                    </div>
REVIEW;
                        echo $review;
                    }
                    ?>

                </div>
            </div><!-- /widget-main -->
        </div><!-- /widget-body -->
    </div><!-- /widget-box -->
</div>






