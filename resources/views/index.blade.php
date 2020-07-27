
<!-- saved from url=(0040)http://www.fdljxcx.cn/content/?629.html= -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>非道路移动机械移动查询系统</title>
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.fancybox-1.3.4.css') }}">--}}
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
{{--    <script type="text/javascript" src="{{ asset('js/gmap3.min.js') }}"></script>--}}
{{--    <script type="text/javascript" src="{{ asset('js/jquery.fancybox-1.3.4.pack.js') }}"></script>--}}
{{--    <script type="text/javascript" src="{{ asset('js/jquery.mousewheel-3.0.4.pack.js') }}"></script>--}}

    <link href="{{ asset('css/weui.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/example.css') }}" rel="stylesheet" type="text/css">

    <script src="http://res.wx.qq.com/open/js/jweixin-1.6.0.js"></script>

    <script type="text/javascript">
        function funcReadImgInfo(obj) {
            var imgs = [];
            var host = '{{$_SERVER["HTTP_HOST"]}}';
            var imgObj = $("#imgs img");//这里改成相应的对象
            for (var i = 0; i < imgObj.length; i++) {
                imgs.push(host+imgObj.eq(i).attr('src'));
                console.log(imgs)
            }
            var nowImgurl = host+$(obj).attr('src');
            wx.previewImage({
                current: nowImgurl, // 当前显示图片的http链接
                urls: imgs // 需要预览的图片http链接列表
            });
        }
    </script>
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

                .weui_cells {
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
                                            <li class="weui_uploader_file" id="imgs">
                                                <img src="{{ Storage::url($v) }}" onclick="funcReadImgInfo(this)">
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end of images,grid and map cells-->

                <div class="weui_cells_tips"><small>最后更新时间:2020-05-22 14:58:14</small></div>
        </div><!--end of container-->
    </div>

</div><div id="fancybox-tmp" style="padding: 50px;"></div>
<div id="fancybox-loading" style="display: none;">
    <div></div></div>
<div id="fancybox-overlay" style="background-color: rgb(119, 119, 119); opacity: 0.7; cursor: pointer; height: 812px; display: none;"></div>
<div id="fancybox-wrap" style="width: 295px; height: auto; top: 126px; left: 20px; display: none;">
    <div id="fancybox-outer">
        <div class="fancybox-bg" id="fancybox-bg-n"></div>
        <div class="fancybox-bg" id="fancybox-bg-ne"></div>
        <div class="fancybox-bg" id="fancybox-bg-e"></div>
        <div class="fancybox-bg" id="fancybox-bg-se"></div>
        <div class="fancybox-bg" id="fancybox-bg-s"></div>
        <div class="fancybox-bg" id="fancybox-bg-sw"></div>
        <div class="fancybox-bg" id="fancybox-bg-w"></div>
        <div class="fancybox-bg" id="fancybox-bg-nw"></div>
        <div id="fancybox-content" style="border-width: 10px; width: 275px; height: 499px;"></div>
        <a id="fancybox-close" style="display: none;"></a>
        <a href="javascript:;" id="fancybox-left" style="display: none;">
            <span class="fancy-ico" id="fancybox-left-ico"></span>
        </a>
        <a href="javascript:;" id="fancybox-right" style="display: none;">
            <span class="fancy-ico" id="fancybox-right-ico"></span>
        </a>
        <div id="fancybox-title" class="fancybox-title-over" style="display: none; margin-left: 10px; width: 275px; bottom: 10px;"></div>
    </div>
</div>
</body>
</html>
