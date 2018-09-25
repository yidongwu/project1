<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 2018/8/12
 * Time: 13:57
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <div class="space-6"></div>

            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="widget-box transparent invoice-box">
                        <div class="widget-header widget-header-large">
                            <h3 class="grey lighter pull-left position-relative">
                                <i class="icon-leaf green"></i>
                                Customer Invoice
                            </h3>

                            <div class="widget-toolbar no-border invoice-info">
                                <span class="invoice-info-label">Invoice:</span>
                                <span class="red">#121212</span>

                                <br />
                                <span class="invoice-info-label">Date:</span>
                                <span class="blue">03/03/2013</span>
                            </div>

                            <div class="widget-toolbar hidden-480">
                                <a href="#">
                                    <i class="icon-print"></i>
                                </a>
                            </div>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main padding-24">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
                                                <b>Company Info</b>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <ul class="list-unstyled spaced">
                                                <li>
                                                    <i class="icon-caret-right blue"></i>
                                                    Street, City
                                                </li>

                                                <li>
                                                    <i class="icon-caret-right blue"></i>
                                                    Zip Code
                                                </li>

                                                <li>
                                                    <i class="icon-caret-right blue"></i>
                                                    State, Country
                                                </li>

                                                <li>
                                                    <i class="icon-caret-right blue"></i>
                                                    Phone:
                                                    <b class="red">111-111-111</b>
                                                </li>

                                                <li class="divider"></li>

                                                <li>
                                                    <i class="icon-caret-right blue"></i>
                                                    Paymant Info
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- /span -->

                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
                                                <b>Customer Info</b>
                                            </div>
                                        </div>

                                        <div>
                                            <ul class="list-unstyled  spaced">
                                                <li>
                                                    <i class="icon-caret-right green"></i>
                                                    Street, City
                                                </li>

                                                <li>
                                                    <i class="icon-caret-right green"></i>
                                                    Zip Code
                                                </li>

                                                <li>
                                                    <i class="icon-caret-right green"></i>
                                                    State, Country
                                                </li>

                                                <li class="divider"></li>

                                                <li>
                                                    <i class="icon-caret-right green"></i>
                                                    Contact Info
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- /span -->
                                </div><!-- row -->

                                <div class="space"></div>

                                <div>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>商品</th>
                                            <th class="hidden-xs">数量</th>
                                            <th>单件商品总价</th>
                                            <th>订单状态</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        if(!empty($cart['data'])) {
                                            foreach($cart['data'] as $k => $item) {
                                                switch($item['state']) {
                                                    case 0 : $state = '未付款';break;
                                                    case 1 : $state = '已付款';break;
                                                    case 2 : $state = '退款';break;
                                                    case 3 : $state = '处理中';break;
                                                    case 4 : $state = '已付款等待发货';break;
                                                    case 5 : $state = '已付款已发货';break;
                                                    case 6 : $state = '已收货';break;
                                                    case 7 : $state = '退货';break;
                                                    case 8 : $state = '已完成';break;
                                                    case 9 : $state = '异常订单';break;
                                                    case 10 : $state = '关闭订单';break;
                                                }
                                                $del_btn = Html::a('删除', ['cart/delete', 'id' => $item['id'], 'pid' => $item['goods_id']]);
                                                $tr = <<<TR
                                        <tr>
                                            <td class="center">{$k}</td>

                                            <td>
                                                <a href="#">{$item['goods_name']}</a>
                                            </td>
                                            <td class="hidden-xs">{$item['quantity']}</td>
                                            <td>{$item['sumprice']}</td>
                                            <td>{$state}</td>
                                            <td class="glyphicon glyphicon-trash">{$del_btn}</td>
                                        </tr>
TR;
                                                echo $tr;
                                            }
                                        } else {
                                            $tr = <<<TR
                                        <tr>
                                            <p style="color:red">购物车空空</p>
                                        </tr>
TR;
                                            echo $tr;
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="hr hr8 hr-double hr-dotted"></div>

                                <div class="row">
                                    <div class="col-sm-5 pull-right">
                                        <h4 class="pull-right">
                                            Total amount :
                                            <span class="red"><?php echo isset($cart['total_price']) ? $cart['total_price'] : 0; ?></span>
                                            <?php
                                            $form = ActiveForm::begin(['action' => ['pay/index'],'method'=>'post',]);
                                            ?>
                                            <?php echo Html::submitButton('去付款', ['class'=>'btn btn-primary','name' =>'submit-button']); ?>
                                            <?php ActiveForm::end(); ?>
                                        </h4>
                                    </div>
                                    <div class="col-sm-7 pull-left"> Extra Information </div>
                                </div>

                                <div class="space-6"></div>
                                <div class="well">
                                    Thank you for choosing Ace Company products.
                                    We believe you will be satisfied by our services.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->
