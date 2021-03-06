<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>果园电商CRM系统</title>
    <meta name="keywords"/>
    <meta name="description"/>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="/public/Static/bootstrap/css/bootstrap.min.css">
    <!-- 可选的Bootstrap主题文件（一般不用引入）
    <link rel="stylesheet" href="/public/Static/bootstrap/css/bootstrap-theme.min.css">-->
    <link rel="stylesheet" href="/public/Admin/css/style.min.css?v=4.1.0">
    <link href="/public/Admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/public/Admin/css/animate.min.css" rel="stylesheet">
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script type="text/javascript" src='/public/Static/jquery-1.11.2.min.js'></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="/public/Static/bootstrap/js/bootstrap.min.js"></script>
    <script src="/public/Admin/js/jquery.metisMenu.js"></script>
    <script src="/public/Admin/js/jquery.slimscroll.min.js"></script>
    <script src="/public/Admin/js/pace.min.js"></script>
    <script src="/public/Admin/js/layer/layer.min.js"></script>
    <script src="/public/Admin/js/welcome.min.js"></script>
    <script src="/public/Admin/js/huge.min.js"></script>
    <script src="/public/Admin/js/contabs.min.js"></script>
    
</head>
<body class="fixed-sidebar full-height-layout gray-bg">
<div class="pace  pace-inactive">
    <div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div>
</div>
<!-- 头部 -->
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="nav-close"><i class="fa fa-times-circle"></i>
    </div>
    <div class="slimScrollDiv" style="position: relative; width: auto; height: 100%;"><div class="sidebar-collapse" style="width: auto; height: 100%;">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span><a href="/admin/timeline/index" class="J_menuItem"><img alt="image" class="img-circle" width="65" height="65" src="<?php echo get_user_pic();?>"></a></span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold"><?php echo get_user_trueName();?></strong></span>
                                <span class="text-muted text-xs block"><?php echo get_user_typeName();?><b class="caret"></b></span>
                                </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li>
                            <a class="" data-toggle="modal" data-target="#addCustomer" data-remote="/admin/Common/editPass">
                                修改密码
                            </a>
                        </li>

                        <li>
                            <a class="" data-toggle="modal" data-target="#addCustomer" data-remote="/admin/Common/editInfo<?php echo get_user_type();?>">
                                 个人资料
                            </a>
                        </li>
                        <li><a class="J_menuItem" href="contacts.html" data-index="2">联系我们</a>
                        </li>
                        <li><a class="J_menuItem" href="mailbox.html" data-index="3">信箱</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="/Admin/Account/logout">安全退出</a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">果
                </div>
            </li>


            <li>
                <a href="">
                    <i class="fa fa-user"></i>
                    <span class="nav-label">客户管理</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a class="J_menuItem" href="/admin/Customer/customer" data-index="0">客户信息</a>
                    </li>
                    <li>
                        <a class="J_menuItem" href="/admin/Customer/customerRank" data-index="6">客户等级</a>
                    </li>

                </ul>
            </li>



            <!--
            <li>
                <a href="#"><i class="fa fa-table"></i> <span class="nav-label">表格</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a class="J_menuItem" href="table_basic.html" data-index="78">基本表格</a>
                    </li>
                    <li><a class="J_menuItem" href="table_data_tables.html" data-index="79">DataTables</a>
                    </li>
                    <li><a class="J_menuItem" href="table_jqgrid.html" data-index="80">jqGrid</a>
                    </li>
                    <li><a class="J_menuItem" href="table_foo_table.html" data-index="81">Foo Tables</a>
                    </li>
                    <li><a class="J_menuItem" href="table_bootstrap.html" data-index="82">Bootstrap Table
                        <span class="label label-danger pull-right">推荐</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">相册</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a class="J_menuItem" href="basic_gallery.html" data-index="83">基本图库</a>
                    </li>
                    <li><a class="J_menuItem" href="carousel.html" data-index="84">图片切换</a>
                    </li>
                    <li><a class="J_menuItem" href="blueimp.html" data-index="85">Blueimp相册</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="J_menuItem" href="/admin/huge/" data-index="86"><i class="fa fa-magic"></i> <span class="nav-label">CSS动画</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-cutlery"></i> <span class="nav-label">工具 </span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a class="J_menuItem" href="form_builder.html" data-index="87">表单构建器</a>
                    </li>
                </ul>
            </li>
-->
        </ul>
    </div><div class="slimScrollBar" style="width: 4px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 213.293943870015px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.9; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
</nav>
<div class="modal fade" id="addCustomer" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div>
    </div>
</div>
<div id="page-wrapper" class="gray-bg dashbard-1">
    <!----
    <!--div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                <!--<form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                    <div class="form-group">
                        <input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">
                    </div>
                </form>-->
    <!---
            </div>
            <!--<ul class="nav navbar-top-links navbar-right" style="display:none;">
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                    </a>

                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts" style="display:none;">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> 您有16条未读消息
                                    <span class="pull-right text-muted small">4分钟前</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-qq fa-fw"></i> 3条新回复
                                    <span class="pull-right text-muted small">12分钟</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a class="J_menuItem" href="notifications.html" data-index="89">
                                    <strong>查看所有 </strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="hidden-xs">
                    <a href="" class="J_menuItem" data-index="0"><i class="fa fa-cart-arrow-down"></i> 预留</a>
                </li>
                <li class="dropdown hidden-xs">
                    <a class="right-sidebar-toggle" aria-expanded="false">
                        <i class="fa fa-tasks"></i> 主题
                    </a>
                </li>

            </ul>-->
    <!---
        </nav>
    </div-->
    <div class="row content-tabs">
        <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
        </button>
        <nav class="page-tabs J_menuTabs">
            <div class="page-tabs-content" style="margin-left: 0px;">
                <a href="javascript:;" class="J_menuTab active" data-id="index_v1.html">首页</a>
            </div>
        </nav>
        <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
        </button>
        <div class="btn-group roll-nav roll-right">
            <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>

            </button>
            <ul role="menu" class="dropdown-menu dropdown-menu-right">
                <li class="J_tabShowActive"><a>定位当前选项卡</a>
                </li>
                <li class="divider"></li>
                <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                </li>
                <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                </li>
            </ul>
        </div>
        <a href="/Admin/Account/logout" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
    </div>
    <div class="row J_mainContent" id="content-main">
        <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="" frameborder="0" data-id="" seamless="" style="display: inline;"></iframe>
    </div>
    <div class="footer">
        <div class="pull-right">© 2015-2016 <a href="http://www.goooy.cn/" target="_blank">果园科技</a>
        </div>
    </div>
</div>


<script>
    $(function () {
        $("#addCustomer").on("hidden.bs.modal", function() {
           location.reload()
        });

    });
</script>
<!-- /头部 -->

<div id="main" class="clearfix">
    <!-- 菜单 -->
    
    <!-- /菜单-->

    <!-- 主体 -->
    <div id="content" class="bootstrap">
        


    </div>
    <!-- /主体 -->

</div>
<!-- 底部 -->

<!-- /底部 -->



</body>
</html>