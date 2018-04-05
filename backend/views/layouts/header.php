<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>
<header class="main-header">

    <?= Html::a('<span class="logo-mini">导航</span><span class="logo-lg" style="margin-right:90px;">系统菜单</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" title="最大化菜单">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;股票管理系统</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu system-message">
                    <a href="javascript:;" class="dropdown-toggle system-message-count" data-toggle="dropdown">
                        <i class="fa fa-bell-o hidden"></i>
                        <span class="label label-warning"></span>
                    </a>
                    <ul class="dropdown-menu system-message-count-more">
                        <li class="header">...</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu system-message-list">
                            </ul>
                        </li>
                        <li class="footer"><a href="javascript:;">更多</a></li>
                    </ul>
                </li>


                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                             $img  = $user['head_img'];
                             if(!empty($img)){
                                echo Html::img(Yii::$app->request->hostInfo.$user['head_img'],['class'=>'user-image','alt'=>'']);
                             }else{
                                echo Html::img($directoryAsset.'/img/user2-160x160.jpg',['class'=>'user-image','alt'=>'']);
                             }
                         ?>
                        <span class="hidden-xs">
                            <?=$user['username'];?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <!--<img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>-->
                            <?php
                                $img  = $user['head_img'];
                                if(!empty($img)){
                                   echo Html::img(Yii::$app->request->hostInfo.$user['head_img'],['class'=>'img-circle','alt'=>'']);
                                }else{
                                   echo Html::img($directoryAsset.'/img/user2-160x160.jpg',['class'=>'img-circle','alt'=>'']);
                                }
                            ?>
                            <p>
                                <?=$user['username'];?>
                                <small><?=$lastLoginTime?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
<!--                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>-->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <!--<a href="#" class="btn btn-default btn-flat">个人中心</a>-->
                                 <?= Html::a(Yii::t('app', '个人中心'), ['/user/'.$user['id']], ['class' => 'btn btn-default btn-flat']) ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    '退出',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
<!--                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>-->
            </ul>
        </div>
    </nav>
</header>

<script>
    <?php $this->beginBlock('js') ?>
        $(function(){
            //获得系统消息未读条数
            function getSystemMessageCount() {
                var url = '/systemmessage/unreadnumber.html';
                $.ajax({
                    url : url,
                    type : 'POST',
                    data : {'source':1},
                    dataType : 'json',
                    success : function (msg) {
                        if(msg.count > 0){
                            $('.system-message-count').find('i').removeClass('hidden');
                            $(".system-message-count-more").removeClass('hidden');
                            $('.system-message-count').find('i').addClass('show');
                            $('.system-message-count span').html(msg.count);
                            $('.system-message-count-more li.header').html('您有未读'+  msg.count +'预约单消息');
                        }else{
                            $('.system-message-count').find('i').addClass('hidden');
                            $(".system-message-count-more").addClass('hidden');
                        }

                    },
                    error : function (msg) {
                        console.log(msg);
                    }
                })
            }

            /**
             * 获得预约消息列表
             */
            function getSystemMessage() {
                var url = '/systemmessage/unread.html';
                $.ajax({
                    url : url,
                    type : 'POST',
                    data : {'source':1},
                    dataType : 'json',
                    success : function (msg) {
                        console.log(msg);
                        if(msg.data.length > 0){
                            var html = '';
                            $.each(msg.data, function (i,item) {
                                html += '<li>';
                                html += '<a data-url="/ordermanager/appointment-record/view.html?id='+ item.extend._id +'" data-messageid="'+item._id+'" href="javascript:;">';
                                html += '<i class="fa fa-shopping-cart text-green"></i>'+ item.content +'</a></li>';
                            });
                            $('.system-message-list').html(html);
                        }
                    },
                    error : function (msg) {
                        console.log(msg);
                    }
                })
            }
            
            function changeRead(url, messageId, whole) {
                var postUrl = '/systemmessage/changeread.html';
                $.ajax({
                    url : postUrl,
                    type : 'POST',
                    data : {'source':1, messageId:messageId, whole:whole},
                    dataType : 'json',
                    success : function (msg) {
                        window.location.href = url;
                    },
                    error : function (msg) {
                        console.log(msg);
                    }
                })
            }

            //点击单个消息
            $(document).on('click', '.system-message-list li a', function (event) {
                var url = $(this).data('url');
                var messageId = $(this).data('messageid');
                var whole = 0;
                changeRead(url ,messageId, whole);
                event.stopPropagation();    //  阻止事件冒泡
            });

            //点击全部消息
            $('.system-message-count-more li.footer').on('click',function (event) {
                var url = '/ordermanager/appointment-record/index.html';
                var messageId = '';
                var whole = 1;
                changeRead(url ,messageId, whole);
                event.stopPropagation();    //  阻止事件冒泡
            });

            //点击消息数量
            $('.system-message-count').on('click',function () {
                getSystemMessage();
            });
            getSystemMessageCount();
            getSystemMessage();
            var countInterval = window.setInterval(getSystemMessageCount,60000);
        });
    <?php $this->endBlock() ?>
    <?php $this->registerJs($this->blocks['js'], \yii\web\View::POS_END); ?>
</script>
