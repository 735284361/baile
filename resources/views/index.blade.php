
<!-- saved from url=(0040)http://www.fdljxcx.cn/content/?629.html= -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>非道路移动机械移动查询系统</title>

{{--    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.fancybox-1.3.4.css') }}">--}}
{{--    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>--}}
{{--    <script type="text/javascript" src="http://ditu.google.cn/maps/api/js?sensor=false&key=AIzaSyBqQI4CruXIZsx4OQ9R-XqRKl4aidNqacw&language=zh_cn"></script>--}}
{{--    <script type="text/javascript" src="{{ asset('js/gmap3.min.js') }}"></script>--}}
{{--    <script type="text/javascript" src="{{ asset('js/jquery.fancybox-1.3.4.pack.js') }}"></script>--}}
{{--    <script type="text/javascript" src="{{ asset('js/jquery.mousewheel-3.0.4.pack.js') }}"></script>--}}

    <link href="{{ asset('css/weui.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/example.css') }}" rel="stylesheet" type="text/css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

{{--    <script type="text/javascript">--}}
{{--        $(function(){--}}
{{--            $('[rel=mainmaster]').fancybox({--}}
{{--                'transitionIn'		: 'none',--}}
{{--                'transitionOut'		: 'none',--}}
{{--                'titlePosition' 	: 'over',--}}
{{--                'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {--}}
{{--                    return '<span id="fancybox-title-over">机械照片 ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';--}}
{{--                }--}}
{{--            });--}}
{{--        })--}}
{{--    </script>--}}
</head>

<body ontouchstart="">
<div class="container" id="container">
    <div id="mainpage">

        <div class="wrap">


            <style>
                .m_envcode_block {
                    display:block;
                    border: 2px solid #BBB;
                    padding:5px;
                    height:50px;
                    width:200px;
                    background-color:#3555DB;
                    margin:5px auto;
                    text-align: center;
                }
                .m_envcode_block span{
                    text-align: center;
                    color:#ffffff;
                    font-size:30px;
                }

                .m_res_summary_block{
                    padding:5px;
                    margin:10px auto;
                    font-size:0.9em;
                    display:inline-block;
                }

                .m_res_summary_block span.red{
                    height:16px;
                    background-color:#d7342e;
                    color:#f2f2f2;
                    margin:10px;
                    padding:2px 5px;
                }

                .m_res_summary_block span.green{
                    height:16px;
                    background-color:#4BD211;
                    color:#0D1A31;
                    margin:10px;
                    padding:2px 5px;
                }
                .weui_cells_title {
                    margin-top: .77em; /*// 15px - 行高*/
                    margin-bottom: .3em; /*// 8px - 行高*/
                    padding-left: @weuiCellGapH;
                    padding-right: @weuiCellGapH;
                    color: @globalTextColor;
                    font-size: @weuiCellTipsFontSize;

                & + .weui_cells {
                      margin-top: 0;
                  }
            </style>
            <div class="hd">
                <h1 class="page_title">机械登记信息</h1>
                <div class="page_title">
                    <div class="m_envcode_block" name="蓝色框里牌号"><span>{{ $data['num'] }}</span></div>
                </div>
                <div class="weui_flex weui_cells_title">
                    <div class="weui_flex_item" style="text-align:center;">
                        <div class="m_res_summary_block">禁用区内<span class="green">{{ App\Models\Machine::getForbiddenStatus($data['forbidden_area']) }}</span></div>
                        <div class="m_res_summary_block">国标<span class="green">{{ App\Models\Machine::getStandardStatus($data['standard']) }}</span></div>
                    </div>
                </div>
            </div>

            <div class="bd">
                <div class="weui_cells_title">基本信息</div>
                <div class="weui_cells">
                    <div class="weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>{{ $data['name'] }}</p>
                        </div>
                        <div class="weui_cell_ft">{{ $data['product_no'] }}</div>
                    </div>

                    <div class="weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>机械品牌：{{ $data['brand'] }}</p>
                        </div>
                        <div class="weui_cell_ft"></div>
                    </div>

                    <div class="weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>机械型号：{{ $data['model'] }}</p>
                        </div>
                        <div class="weui_cell_ft"></div>
                    </div>

                    <div class="weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>制造商：{{ $data['manufacture'] }}</p>
                        </div>
                        <div class="weui_cell_ft"></div>
                    </div>

                    <div class="weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>信息状态：审核通过</p>
                        </div>
                        <div class="weui_cell_ft"><i class="weui_icon_waiting"></i>首次申报时间:{{ $data['first_apply_at'] }}</div>
                    </div>

                    <div class="weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>{{ $data['test_results'] }}</p>
                        </div>
                        <div class="weui_cell_ft">{{ $data['test_at'] }}</div>
                    </div>
                </div>

                <div class="weui_cells_title">机械照片</div>

                <div class="weui_cells weui_cells_form">
                    <div class="weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">
                            <div class="weui_uploader">
                                <div class="weui_uploader_hd weui_cell">
                                    <div class="weui_cell_bd weui_cell_primary">机械照片</div>
                                    <div class="weui_cell_ft">{{count($data['pics'])}}张</div>
                                </div>
                                <div class="weui_uploader_bd">
                                    <ul class="weui_uploader_files" id="uppicbox">

                                        @foreach($data['pics'] as $v)
                                            <li class="weui_uploader_file">
                                                <a class="picbox" href="{{ $_SERVER["APP_URL"].Storage::url($v) }}" data-fancybox="gallery" rel="mainmaster">
                                                    <img src="{{ $_SERVER["APP_URL"].Storage::url($v) }}">
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="weui_cell" style="display:none;">
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>机械日常停放位置：</p>
                            <p>
                            </p><div id="mymap-box" style="marging:8px;height:320px;"><div id="yw0" class="gmap3" style="width:100%;height:100%"></div></div>                    <p></p>
                        </div>
                    </div>



                    <div class="weui_cell" style="display:none;">
                        <div class="weui_cell_bd weui_cell_primary">


                <span>
                        是否位于禁用区：
                </span>
                            <div id="gridinfobox">
                            </div>

                        </div>
                        <div class="weui_cell_ft"></div>
                    </div>


                    <script type="text/JavaScript">
                        $(document).ready(function() {
                            jQuery.ajax({'url':'/mobview.php?r=moapp/site/ajaxGridInfo&GeoParams=eyJ4IjoiMTE3LjI0IiwieSI6IjM5LjAxMiJ9','cache':false,'success':function(html){jQuery("#gridinfobox").html(html)}});                    }
                        );

                    </script>


                </div><!-- end of images,grid and map cells-->

                <div class="weui_cells_tips"><small>最后更新时间:2020-05-22 14:58:14</small></div>



                <div class="weui_cell">检测记录</div>
                <div class="weui_cells_tips" style="text-align:right;border-top:1px solid #D9D9D9;"><small>仅显示最近5条记录</small></div>
                <div class="weui_cell"><strong>请登陆系统后查看</strong></div>

                <div class="weui_cell">出入场记录</div>
                <div class="weui_cells_tips" style="text-align:right;border-top:1px solid #D9D9D9;"><small>仅显示最近5条记录</small></div>
                <div class="weui_cell"><strong>请登陆系统后查看</strong></div>


                <div class="weui_cells_title">操作选项</div>

                <div class="weui_cells weui_cells_access">

                    <a class="weui_cell" href="{{ url('login') }}">
                        <div class="weui_cell_hd"><img src="{{ Storage::url('img/update.png') }}" alt="" style="width:20px;margin-right:5px;display:block"></div>
                        <div class="weui_cell_bd weui_cell_primary">
                            <p><strong>用户登录</strong></p>
                        </div>
                        <div class="weui_cell_ft">系统已注册用户登录入口</div>
                    </a>


                    <div id="picbox" style="display:none;">

                    </div>




                    <div class="button">
                        <div class="button_sp_area">
                        </div>
                    </div>


                </div><!--end of content main-->


            </div>

        </div><!--end of container-->





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

        </script>

        <!--谷歌地图js-->
        <script type="text/javascript">
            jQuery('#yw0').gmap3({'action':'init','options':{'center':['39.012','117.24'],'mapTypeControlOptions':{'style':google.maps.MapTypeControlStyle.DROPDOWN_MENU,'position':google.maps.ControlPosition.TOP_RIGHT},'mapTypeId':google.maps.MapTypeId.ROADMAP,'panControl':true,'panControlOptions':{'position':google.maps.ControlPosition.LEFT_TOP},'scaleControl':true,'streetViewControl':false,'zoom':14,'zoomControlOptions':{'style':google.maps.ZoomControlStyle.LARGE,'position':google.maps.ControlPosition.RIGHT_CENTER}}},{'action':'addMarker','latLng':['39.012','117.24'],'marker':{'options':{'draggable':false,'icon':'/Templates/mb/images/mapmarker.png','title':'TJ01015095252'}}});
            jQuery(function($) {
                $('.picbox').fancybox({'titleShow':true,'autoScale':true});
            });
        </script>


    </div>



</div>
