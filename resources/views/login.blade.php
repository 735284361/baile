
<!-- saved from url=(0069)http://www.taep.org.cn:8281/mobview.php?r=mobapp/appsite/applogin&id= -->
<html lang="zh-cn"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">

    <!--these 3 lines to disable cache for debug -->
    <!--<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />-->

    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <title>非道路移动机械移动查询系统</title>
    <link href="{{ asset('css/weui.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/example.css') }}" rel="stylesheet" type="text/css">
</head>
<body ontouchstart="">
<div class="container" id="container">

    <div id="mainpage">

        <div class="wrap">




            <div class="weui_cells_title">已注册用户登录</div>
{{--            <form id="users-form" action="http://www.taep.org.cn:8281/mobview.php?r=mobapp/appsite/applogin&amp;id=" method="post">--}}
                <div class="weui_cells weui_cells_form">

                    <div class="weui_cell">
                        <div class="weui_cell_hd"><label class="weui_label required" for="AppLoginForm_username">用户名 <span class="required">*</span></label>        </div>
                        <div class="weui_cell_bd weui_cell_primary">
                            <input class="weui_input" placeholder="此处输入用户名" name="AppLoginForm[username]" id="AppLoginForm_username" type="text">        </div>
                    </div>


                    <div class="weui_cell">
                        <div class="weui_cell_hd"><label class="weui_label required" for="AppLoginForm_password">密码 <span class="required">*</span></label>        </div>
                        <div class="weui_cell_bd weui_cell_primary">
                            <input class="weui_input" placeholder="此处输入密码" value="" name="AppLoginForm[password]" id="AppLoginForm_password" type="password">        </div>
                    </div>



                    <div class="weui_cell">
                        <div class="weui_cell_hd"><label class="weui_label" for="AppLoginForm_verifyCode">图形验证码</label></div>
                        <div class="weui_cell_bd weui_cell_primary">
                            <img id="yw0" src="{{captcha_src('login')}}" onclick="this.src='{{captcha_src('login')}}&'+Math.random()"/><a id="kanbuq" href="javascript:">取得一组新代码</a>
                            <input class="weui_input" placeholder="此处输入验证码" name="AppLoginForm[verifyCode]" id="AppLoginForm_verifyCode" type="text">
                        </div>
                    </div>

                    <div class="weui_cells_tips"><i class="weui_icon_info"></i>非道路移动机械信息管理系统用户信息必须填写。</div>
                    <!--<div class="weui_btn_area">
                        <a class="weui_btn weui_btn_primary" href="javascript:" id="showTooltips">确定</a>
                    </div>-->

                    <div class="weui_btn_area" style="text-align:center;">
                        <input class="weui_btn weui_btn_primary" type="submit" name="yt0" value="登录">    </div>
                    <div class="clearfloat"></div>



                    <div class="button">
                        <div class="button_sp_area">
                        </div>
                    </div>


                </div>
{{--            </form><!--end of content main-->--}}


        </div>

    </div><!--end of container-->

    <!--BEGIN toast-->
    <div id="toast" style="display: none;">
        <div class="weui_mask_transparent"></div>
        <div class="weui_toast">
            <i class="weui_icon_toast"></i>
            <p class="weui_toast_content" id="toast-msg"></p>
        </div>
    </div>
    <!--end toast-->

    <!-- loading toast -->
    <div id="loadingToast" class="weui_loading_toast" style="display:none;">
        <div class="weui_mask_transparent"></div>
        <div class="weui_toast">
            <div class="weui_loading">
                <div class="weui_loading_leaf weui_loading_leaf_0"></div>
                <div class="weui_loading_leaf weui_loading_leaf_1"></div>
                <div class="weui_loading_leaf weui_loading_leaf_2"></div>
                <div class="weui_loading_leaf weui_loading_leaf_3"></div>
                <div class="weui_loading_leaf weui_loading_leaf_4"></div>
                <div class="weui_loading_leaf weui_loading_leaf_5"></div>
                <div class="weui_loading_leaf weui_loading_leaf_6"></div>
                <div class="weui_loading_leaf weui_loading_leaf_7"></div>
                <div class="weui_loading_leaf weui_loading_leaf_8"></div>
                <div class="weui_loading_leaf weui_loading_leaf_9"></div>
                <div class="weui_loading_leaf weui_loading_leaf_10"></div>
                <div class="weui_loading_leaf weui_loading_leaf_11"></div>
            </div>
            <p class="weui_toast_content">数据加载中</p>
        </div>
    </div>

    <!--BEGIN dialog1-->
    <div class="weui_dialog_confirm" id="dialog1" style="display: none;">
        <div class="weui_mask"></div>
        <div class="weui_dialog">
            <div class="weui_dialog_hd" id="dlg1_title"><strong class="weui_dialog_title">弹窗标题</strong></div>
            <div class="weui_dialog_bd" id="dlg1_content">自定义弹窗内容，居左对齐显示，告知需要确认的信息等</div>
            <div class="weui_dialog_ft">
                <a href="javascript:;" class="weui_btn_dialog default">取消</a>
                <a href="javascript:;" class="weui_btn_dialog primary">确定</a>
            </div>
        </div>
    </div>
    <!--END dialog1-->
    <!--BEGIN dialog2-->
    <div class="weui_dialog_alert" id="dialog2" style="display: none;">
        <div class="weui_mask"></div>
        <div class="weui_dialog">
            <div class="weui_dialog_hd"><strong class="weui_dialog_title">弹窗标题</strong></div>
            <div class="weui_dialog_bd">弹窗内容，告知当前页面信息等</div>
            <div class="weui_dialog_ft">
                <a href="javascript:;" class="weui_btn_dialog primary">确定</a>
            </div>
        </div>
    </div>
    <!--END dialog2-->

    <script type="text/html" id="msgpage">
        消息    </script>

    <script>
        function ShowToast(msg)
        {
            document.getElementById("toast-msg").innerHTML=msg;

            $('#toast').show();
            setTimeout(function () {
                $('#toast').hide();
            }, 2000);
        }

        function ShowDlg1()
        {
            $('#dialog1').show().on('click', '.weui_btn_dialog', function () {
                $('#dialog1').off('click').hide();
            });
        }
        function ShowDlg2()
        {
            $('#dialog2').show().on('click', '.weui_btn_dialog', function () {
                $('#dialog2').off('click').hide();
            });
        }


        //ShowDlg1();

    </script>
    <script type="text/javascript">
        //定义Jquery载入事件
        //获取验证码的地址
        $(function () {
            $("#kanbuq").click(function () {
                var src = "{{captcha_src('login')}}&"+Math.random();
                $('#yw0').attr('src',src);
            });
        });
    </script>

    <script type="text/javascript">

        var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
        document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F3540ada08e6c107e94f0c251d083992d' type='text/javascript'%3E%3C/script%3E"));


    </script>
    <script type="text/javascript" src="{{ asset('js/h.js') }}"></script>

</div></body></html>
