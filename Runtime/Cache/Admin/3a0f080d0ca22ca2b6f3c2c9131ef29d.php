<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>果园电商CRM系统</title>
    <meta name="keywords"/>
    <meta name="description"/>
    <link rel="stylesheet" href="/public/Admin/css/style.min.css">
    <link rel="stylesheet" href="/public/Static/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/Static/assets/bootstrap-table/src/bootstrap-table.css">
    <link rel="stylesheet" href="/public/Static/assets/bootstrap-table/src/bootstrap-editable.css">
    <link rel="stylesheet" href="/public/Static/assets/examples.css">
    <link rel="stylesheet" href="/public/Admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="/public/Admin/css/custom.css">
    <link rel="stylesheet" href="/public/Admin/css/animate.min.css">
    <link rel="stylesheet" href="/public/Admin/css/huge.css">
    <link rel="stylesheet" href="/public/Admin/css/toastr.min.css">
    <link rel="stylesheet" href="/public/Admin/css/sweetalert.css">
    <link rel="stylesheet" href="/public/Admin/css/summernote.css">
    <script type="text/javascript" src='/public/Static/jquery-1.11.2.min.js'></script>
    <script type="text/javascript" src="/public/admin/js/jquery.js"></script>
    <script>
        // 现在window.$和window.jQuery是1.11版本:
        console.log($().jquery); // => '1.11.0'
        var $jq = jQuery.noConflict(true);
        // 现在window.$和window.jQuery被恢复成1.5版本:
        console.log($().jquery); // => '1.5.0'
        // 可以通过$jq访问1.11版本的jQuery了
    </script>


    <link rel="stylesheet" href="/public/admin/css/jquery.autocomplete.css">
    <script type="text/javascript" src="/public/admin/js/jquery.bgiframe.min.js"></script>
    <script type="text/javascript" src="/public/admin/js/jquery.ajaxQueue.js"></script>
    <script type="text/javascript" src="/public/admin/js/jquery.autocomplete.js"></script>
    <script src="/public/Static/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/public/Static/assets/bootstrap-table/src/bootstrap-table.js"></script>
    <script src="/public/Static/assets/bootstrap-table/src/extensions/export/bootstrap-table-export.js"></script>
    <script src="/public/Static/assets/tableExport.js"></script>
    <script src="/public/Static/assets/bootstrap-table/src/extensions/editable/bootstrap-table-editable.js"></script>
    <script src="/public/Static/assets/bootstrap-table/src/bootstrap-editable.js"></script>
    <script src="/public/Admin/js/icheck.min.js"></script>
    <script src="/public/Admin/js/content.min.js"></script>
    <script src="/public/Admin/js/bootstrapValidator.js"></script>
    <script src="/public/Admin/js/toastr.min.js"></script>
    <script src="/public/Static/assets/analytics.js"></script>
    <script src="/public/Admin/js/sweetalert.min.js"></script>
    <script src="/public/Admin/js/layer/laydate/laydate.js"></script>
    <script type="text/javascript" src="/public/Static/uploadify/jquery.uploadify.min.js"></script>
    <script type="text/javascript" src="/public/Admin/js/summernote.min.js"></script>
    <script type="text/javascript" src="/public/Admin/js/summernote-zh-CN.js"></script>
    <script src="/public/Admin/js/huge.js"></script>
    
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <!-- 主体 -->
        
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>客户需求问题</h5>
            <div class="ibox-tools" style="display:none;">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#">选项1</a>
                    </li>
                    <li><a href="#">选项2</a>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row row-lg">
                <div class="col-sm-12">
                    <div id="toolbar">
                        <?php if(display_menu('/admin/Customer/addDemand')){ ?>
                           <!-- <a class="btn btn-success" data-toggle="modal" data-target="#addCustomer1" data-remote="/admin/Customer/addDemand" >
                                新增
                            </a>-->
                            <button id="addform" class="btn btn-success">
                                新增
                            </button>
                        <?php } ?>
                        <?php if(display_menu('/admin/Customer/editDemand')){ ?>
                            <button id="edit" class="btn btn-primary" disabled>
                                编辑
                            </button>
                        <?php } ?>
                        <?php if(display_menu('/admin/Customer/seeDemand')){ ?>
                            <button id="See" class="btn btn-primary" disabled>
                                查看详情
                            </button>
                        <?php } ?>
                        <?php if(display_menu('/admin/Customer/delDemand')){ ?>
                            <button id="remove" class="btn btn-danger" disabled>
                                <i class="glyphicon glyphicon-remove"></i> 删除
                            </button>
                        <?php } ?>
                        <?php if(display_menu('/admin/Customer/receiveDemand')){ ?>
                            <button id="receives" class="btn btn-primary" disabled>
                                领取
                            </button>
                        <?php } ?>

                        <?php if(display_menu('/admin/Customer/allottedDemand')){ ?>
                        <button id="allotted" class="btn btn-primary" disabled>
                           分配
                        </button>
                        <?php } ?>

                        <?php if(display_menu('/admin/Customer/confirmDemand')){ ?>
                            <button id="confirm" class="btn btn-primary" disabled>
                                问题处理
                            </button>
                        <?php } ?>

                        <?php if(display_menu('/admin/Customer/allConfirm')){ ?>
                        <button id="allConfirm" class="btn btn-primary" disabled>
                            批量处理
                        </button>
                        <?php } ?>

                        <?php if(display_menu('/admin/Customer/acceptDemand')){ ?>
                        <button id="accept" class="btn btn-primary" disabled>
                           需求受理
                        </button>
                        <?php } ?>

                        <?php if(($type) == "1"): if(($type) == "1"): ?><button id="follows" class="btn btn-primary" style="display:none;">
                                与我相关问题
                            </button><?php endif; ?>
                        <div class="checkbox i-checks select-huge">
                            <label class="">
                                <input type="checkbox" value="" style="position: absolute; opacity: 0;" name="isFollow">
                                <i></i>与我相关</label>
                        </div>
                        问题状态
                        <select name="isState" id="isState">
                            <option selected value="1">等于</option>
                            <option value="2">不等于</option>
                        </select>
                        <select id="state" class="form-control select-huge">
                            <option value="0">筛选问题状态</option>
                            <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["FbStatusID"]); ?>"><?php echo ($vo["FbStatusName"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>

                        <select id="FBtype" name="FBtype" class="form-control select-huge">
                            <option value="0">筛选问题类型</option>
                            <option value="2">系统漏洞</option>
                            <option value="1">系统新功能</option>
                        </select>
                        <select id="priority" class="form-control select-huge">
                            <option value="0">筛选问题优先级</option>
                            <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vop): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vop["FbPriorityID"]); ?>"><?php echo ($vop["FbPriorityName"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>

                        <select id="emp" class="form-control select-huge">
                            <option value="0">选择研发人员</option>
                            <?php if(is_array($infos)): $i = 0; $__LIST__ = $infos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$infoss): $mod = ($i % 2 );++$i;?><option value="<?php echo ($infoss["EmployeeID"]); ?>"><?php echo ($infoss["Name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>


                        <select id="receive"  class="form-control select-huge">
                            <option value="0">是否领取</option>
                            <option value="2">已领取</option>
                            <option value="1">未领取</option>
                        </select>

                        <select id="isAccept" class="form-control select-huge">
                            <option value="0">是否受理</option>
                            <option value="2">已受理</option>
                            <option value="1">不予受理</option>
                            <option value="3">未受理</option>
                        </select>

                        <?php if(display_menu('/admin/Customer/allottedDemand')){ ?>
                        <select id="isAllotted" class="form-control select-huge">
                            <option value="-1">是否分配</option>
                            <option value="1">已分配</option>
                            <option value="2">未分配</option>
                        </select>
                        <?php } ?>

                        <div class="">
                            <input id="bianHao" name="bianhao" type="text" placeholder="请输入编号" class="form-control input-huge">
                            <input type="text" id="customerName" size="25" placeholder="请输入客户名字或提交人名称" class="form-control input-huge" style="width:220px;">
                            <label class="control-label">提交时间：</label>
                            <input class="form-control input-huge" id="TimeA" name="TimeA" value="" type="text" placeholder="提交时间"> -
                            <input class="form-control input-huge" id="TimeB" name="TimeB" value="" type="text" placeholder="提交时间">

                            <label class="control-label">计划解决时间：</label>
                            <input class="form-control input-huge" id="TimeC" name="TimeC" value="" type="text" placeholder="计划解决时间"> -
                            <input class="form-control input-huge" id="TimeD" name="TimeD" value="" type="text" placeholder="计划解决时间">

                            <label class="control-label">实际解决时间：</label>
                            <input class="form-control input-huge" id="TimeE" name="TimeE" value="" type="text" placeholder="实际解决时间"> -
                            <input class="form-control input-huge" id="TimeF" name="TimeF" value="" type="text" placeholder="实际解决时间">
                            <button id="searchButton" class="btn btn-success">
                                搜索
                            </button>
                        </div><?php endif; ?>
                    </div>
                    <table id="table"
                           data-toolbar="#toolbar"
                           data-search="true"
                           data-show-refresh="true"
                           data-show-columns="true"
                           data-show-export="true"
                           data-minimum-count-columns="5"
                           data-pagination="true"
                           data-id-field="FeedbackID"
                           data-sort-name="FeedbackID"
                           data-detail-formatter="detailFormatter"
                           data-click-select = true
                           data-sort-order="desc"
                           data-page-size = "10"
                           data-page-number = "1"
                           data-page-list="[10,20,50,100,ALL]"
                           data-show-footer="false"
                           data-side-pagination="server"
                           data-url="/admin/Customer/loadDemand"
                           data-response-handler="responseHandler">
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!-- /主体 -->
</div>
<!-- 底部 -->

<!-- /底部 -->

    <div class="modal fade" id="addCustomer" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            </div>
        </div>
    </div>
    <div class="modal fade" id="addCustomer1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            </div>
        </div>
    </div>


    <script type="text/javascript" src='/public/Static/Ueditor23578/ueditor.config.js'></script>
    <script type="text/javascript" src='/public/Static/Ueditor23578/ueditor.all.min.js'></script>
    <script type="text/javascript">
        function daysBetween(DateOne,DateTwo)
        {
            var OneMonth = parseInt(DateOne.substring(5,DateOne.lastIndexOf ('-')));
            var OneDay = parseInt(DateOne.substring(DateOne.length,DateOne.lastIndexOf ('-')+1));
            var OneYear = parseInt(DateOne.substring(0,DateOne.indexOf ('-')));

            var TwoMonth = parseInt(DateTwo.substring(5,DateTwo.lastIndexOf ('/')));
            var TwoDay = parseInt(DateTwo.substring(DateTwo.length,DateTwo.lastIndexOf ('/')+1));
            var TwoYear = parseInt(DateTwo.substring(0,DateTwo.indexOf ('/')));

           // return TwoMonth;

           if(OneYear > TwoYear){
                return true;
           }
            //如果年份一样则判断月份
            if(OneYear == TwoYear){
                if(OneMonth > TwoMonth){
                    return true;
                }
                //如果月份一样 则判断天数
                if(OneDay >= TwoDay){
                    return true;
                }
            }
            //如果都小于的话则没有过期返回false
            return false;
        }
        var $table = $('#table'), $edit=$('#edit');$remove = $('#remove'), selections = [];
        var $receives = $('#receives');
        var $see = $('#See');
        var $confirm = $('#confirm');
        var $allotted = $('#allotted');
        var $add = $('#addform');
        var $accept = $('#accept');
        var $allConfirm = $('#allConfirm');//批量处理
        function initTable() {
            $table.bootstrapTable({

                rowStyle:function(row, index) {
                    var paln = row.PlanTime;
                    var state = row.State;
                    var myDate = new Date();
                    var mytime=myDate.toLocaleDateString();

                    if(paln){
                        if(state =='解决中'){
                            var cha = daysBetween(paln,mytime);
                          //  alert(cha)
                               if(cha){
                                   return {
                                       classes: 'text-nowrap another-class',
                                       css: {}
                                   };
                               }else{
                                   return {
                                       classes: 'text-nowrap another-class',
                                       css: {"background-color": "red", "color": "#fff"}
                                   };
                               }

                        }else{
                            return {
                                classes: 'text-nowrap another-class',
                                css: {}
                            };
                        }
                    }else{
                        return {
                            classes: 'text-nowrap another-class',
                            css: {}
                        };

                    }
                                    },

                height: getHeight(),
                formatSearch:function(){return '请输入项目标题'},
                formatNoMatches:function(){return '没有找到数据！'},
                formatRefresh:function(){return '刷新'},
                formatColumns:function(){return '显示的列'},

                clickToSelect:true,
                formatLoadingMessage:function(){
                    return '正在加载，请稍候...';
                },
                formatShowingRows: function (pageFrom, pageTo, totalRows) {
                    return '第 ' + pageFrom + ' - ' + pageTo + ' 记录，共 ' + totalRows + ' 条记录';
                },
                formatRecordsPerPage:function(pageNumber){
                    return '每页 '+pageNumber + ' 记录';
                },
                //queryParams: queryParams, //参数
                columns: [
                    [
                        //{field: 'Number', title: 'Number', formatter: function (value, row, index) {return index + 1;}},
                        {checkbox: true, align: 'center', valign: 'middle'},
                        //{field: 'Sort',title: '排序', align: 'center', valign: 'middle', sortable: true,},
                        {field: 'FeedbackID',title: '编号', align: 'center',sortable: true},
                        {field: 'CustomerName',title: '客户',align: 'left', halign:'center'},
                        {field: 'Title', title: '项目标题', align: 'center'},
                        {field: 'FbPriorityName', title: '优先级', align: 'center',sortable: true},
                        {field: 'Description', title: '描述',align: 'left', halign:'center'},
                        {field: 'type', title: '类型', align: 'center'},
                        {field: 'State', title: '状态', align: 'center'},
                        {field: 'FbPerson', title: '提交人', align: 'center'},
                        {field: 'AllotName', title: '分配/领取', align: 'center'},
                        {field: 'FbTime', title: '提交时间', align: 'center',sortable: true},
                        {field: 'PlanTime', title: '计划解决时间', align: 'center',sortable: true},
                        {field: 'SolveTime', title: '实际解决时间', align: 'center',sortable: true},
                    ]
                ]
            });
            // sometimes footer render error.
            setTimeout(function () {
                $table.bootstrapTable('resetView');
            }, 200);
            $table.on('check.bs.table uncheck.bs.table ' +
                    'check-all.bs.table uncheck-all.bs.table', function () {
                $remove.prop('disabled', !$table.bootstrapTable('getSelections').length);
                $allConfirm.prop('disabled', !$table.bootstrapTable('getSelections').length);
                $allotted.prop('disabled', !$table.bootstrapTable('getSelections').length);
                var checkLen = $table.bootstrapTable('getSelections').length;
                if(checkLen == 1){
                    //$edit.attr("data-remote",""+getIdSelections()+'&t=' + Math.random(1000) );
                    $see.prop('disabled',false);
                    $confirm.prop('disabled',false);
                    $edit.prop('disabled',false);
                    $receives.prop('disabled',false);
                    $accept.prop('disabled',false);
                }else{
                    //$edit.attr("data-remote","javascript:void(0);");
                    $see.prop('disabled',true);
                    $confirm.prop('disabled',true);
                    $edit.prop('disabled',true);
                    $receives.prop('disabled',true);
                    $accept.prop('disabled',true);
                }
                selections = getIdSelections();
            });
            $remove.click(function () {
                var ids = getIdSelections();
                var param = {ids:ids};
                confirmDelete("/admin/Customer/delDemand",param,$table,$remove,"FeedbackID",ids);
            })

            $allConfirm.click(function(){
                $("#addCustomer").modal({
                    remote: "/admin/Customer/allConfirm?id=" + getIdSelections()+'&t=' + Math.random(1000)
                    ,backdrop: 'static'
                    ,keyboard: false
                });
            });
            $add.click(function(){
                $("#addCustomer1").modal({
                    remote: "/admin/Customer/addDemand?id=" + getIdSelections()+'&t=' + Math.random(1000)
                    ,backdrop: 'static'
                    ,keyboard: false
                });
            });
            $edit.click(function(){
                $("#addCustomer1").modal({
                    remote: "/admin/Customer/editDemand?id=" + getIdSelections()+'&t=' + Math.random(1000)
                    ,backdrop: 'static'
                    ,keyboard: false
                });
            });
            $see.click(function(){
                $("#addCustomer").modal({
                    remote: "/admin/Customer/seeDemand?id=" + getIdSelections()+'&t=' + Math.random(1000)

                   
                });
            });
            $confirm.click(function(){
                $("#addCustomer").modal({
                    remote: "/admin/Customer/confirmDemand?id=" + getIdSelections()+'&t=' + Math.random(1000)
                    ,backdrop: 'static'
                    ,keyboard: false
                });
            });
            $receives.click(function(){
                $("#addCustomer").modal({
                    remote: "/admin/Customer/receiveDemand?id=" + getIdSelections()+'&t=' + Math.random(1000)
                });
            });
            $accept.click(function(){
                $("#addCustomer").modal({
                    remote: "/admin/Customer/acceptDemand?id=" + getIdSelections()+'&t=' + Math.random(1000)
                });
            });
            $allotted.click(function(){
                $("#addCustomer").modal({
                    remote: "/admin/Customer/allottedDemand?id=" + getIdSelections()+'&t=' + Math.random(1000)
                    ,backdrop: 'static'
                    ,keyboard: false
                });
            });

            $(window).resize(function () {
                $table.bootstrapTable('resetView', {
                    height: getHeight()
                });
            });

            //$(".form-control").attr('placeholder',"请输入项目名称或描述");
        }

        function getIdSelections(param) {
            return $.map($table.bootstrapTable('getSelections'), function (row) {
                return row.FeedbackID;
            });
        }
        //$("#model").on("hidden.bs.model",function(e){$(this).removeData();});
        $(function () {
            $("#addCustomer").on("hidden.bs.modal", function() {
                $(this).removeData("bs.modal");
                $edit.prop('disabled',true);
                $see.prop('disabled',true);
                $confirm.prop('disabled',true);
                $accept.prop('disabled',true);
                $remove.prop('disabled',true);
                $allConfirm.prop('disabled',true);
                $receives.prop('disabled',true);
                $allotted.prop('disabled',true);
                $table.bootstrapTable('refresh', {silent: true});
            });
            eachSeries(getScript, initTable);
            laydate({elem: '#TimeA', format: 'YYYY-MM-DD hh:mm:ss',event: 'focus'});
            laydate({elem: '#TimeB', format: 'YYYY-MM-DD hh:mm:ss', event: 'focus'});
            laydate({elem: '#TimeC', format: 'YYYY-MM-DD hh:mm:ss', event: 'focus'});
            laydate({elem: '#TimeD', format: 'YYYY-MM-DD hh:mm:ss', event: 'focus'});
            laydate({elem: '#TimeE', format: 'YYYY-MM-DD hh:mm:ss', event: 'focus'});
            laydate({elem: '#TimeF', format: 'YYYY-MM-DD hh:mm:ss', event: 'focus'});
        });
        $(function () {
            $("#addCustomer1").on("hidden.bs.modal", function() {
                $(this).removeData("bs.modal");
                location.reload()
                // ue = undefined;

                // $table.bootstrapTable('refresh', {url: location.href});
                $table.bootstrapTable('refresh', {silent: true});
                //document.write("<script language=javascript src='/public/Static/Ueditor23578/ueditor.config.js'> <\/script>");
                //document.write("<script language=javascript src='/public/Static/Ueditor23578/ueditor.all.min.js'><\/script>");
            });
            eachSeries(getScript, initTable);
        });
        //请求状态
        $('#FBtype').change(function(){
            searchDemand();

        })
        //请求状态
        $('#state').change(function(){
            searchDemand();

        })
        //请求状态
        $('#receive').change(function(){
            searchDemand();

        })
        //关注
        $('#follows').click(function(){
            searchDemand();
        })
        //是否分配
        $('#isAllotted').change(function(){
            searchDemand();
        })
         //是否受理
        $('#isAccept').change(function(){
            searchDemand();
        })
        //问题优先级
        $('#priority').change(function(){
            searchDemand();
        })
        //用客户搜索
        $('#customerName').keyup(function(){
            searchDemand();
        })
        $('#bianHao').keyup(function(){
            searchDemand();
        })
        $('#isState').change(function(){
            searchDemand();
        })
        $('#emp').change(function(){
            searchDemand();
        })
    </script>
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
        $('input').on('ifUnchecked', function(event){
            var FBtyp =$('#FBtype').val();
            var priority =$('#priority').val();
            var stat =$('#state').val();
            var rece =$('#receive').val();
            var allot = $('#isAllotted').val();
            var name = $("#customerName").val();
            var accept =  $('#isAccept').val();
            var timeA = $("#TimeA").val();
            var timeB = $("#TimeB").val();
            var timeC = $("#TimeC").val();
            var timeD = $("#TimeD").val();
            var timeE = $("#TimeE").val();
            var timeF = $("#TimeF").val();
            var bianHao = $("#bianHao").val();
            var isState = $("#isState").val();
            var emp = $("#emp").val();
            var str =  '/admin/Customer/loadDemand?timeA='+timeA+"&timeB="+timeB+"&timeC="+timeC+"&timeD="+timeD+'&receive='+rece+'&fbtype='+FBtyp+'&state='+stat+'&name='+name+"&allot="+allot+'&priority='+priority+'&accept='+accept+"&timeE="+timeE+"&timeF="+timeF+'&bianHao='+bianHao+'&isState='+isState+'&emp='+emp;
            $table.bootstrapTable('refresh', {url: str});
        });
        $('input').on('ifChecked', function(event){
            var FBtyp =$('#FBtype').val();
            var priority =$('#priority').val();
            var stat =$('#state').val();
            var rece =$('#receive').val();
            var allot = $('#isAllotted').val();
            var name = $("#customerName").val();
            var accept =  $('#isAccept').val();
            var timeA = $("#TimeA").val();
            var timeB = $("#TimeB").val();
            var timeC = $("#TimeC").val();
            var timeD = $("#TimeD").val();
            var timeE = $("#TimeE").val();
            var timeF = $("#TimeF").val();
            var bianHao = $("#bianHao").val();
            var isState = $("#isState").val();
            var emp = $("#emp").val();
            var str =  '/admin/Customer/loadDemand?timeA='+timeA+"&timeB="+timeB+"&timeC="+timeC+"&timeD="+timeD+'&receive='+rece+'&fbtype='+FBtyp+'&state='+stat+'&name='+name+'&follow=1'+"&allot="+allot+'&priority='+priority+'&accept='+accept+"&timeE="+timeE+"&timeF="+timeF+'&bianHao='+bianHao+'&isState='+isState+'&emp='+emp;
            $table.bootstrapTable('refresh', {url: str});
        });
        $("#searchButton").on("click",function(){
            searchDemand();
        })
        function searchDemand(){
            var FBtyp =$('#FBtype').val();
            var priority =$('#priority').val();
            var stat =$('#state').val();
            var rece =$('#receive').val();
            var allot = $('#isAllotted').val();
            var name = $("#customerName").val();
            var accept =  $('#isAccept').val();
            var timeA = $("#TimeA").val();
            var timeB = $("#TimeB").val();
            var timeC = $("#TimeC").val();
            var timeD = $("#TimeD").val();
            var timeE = $("#TimeE").val();
            var timeF = $("#TimeF").val();
            var bianHao = $("#bianHao").val();
            var isState = $("#isState").val();
            var emp = $("#emp").val();
            var isCheck = $(".i-checks").find(".icheckbox_square-green");
            if(isCheck.hasClass("checked")){
                var str =  '/admin/Customer/loadDemand?timeA='+timeA+"&timeB="+timeB+"&timeC="+timeC+"&timeD="+timeD+'&receive='+rece+'&fbtype='+FBtyp+'&state='+stat+'&name='+name+'&follow=1'+"&allot="+allot+'&priority='+priority+'&accept='+accept+"&timeE="+timeE+"&timeF="+timeF+'&bianHao='+bianHao+'&isState='+isState+'&emp='+emp;
            }else{
                var str =  '/admin/Customer/loadDemand?timeA='+timeA+"&timeB="+timeB+"&timeC="+timeC+"&timeD="+timeD+'&receive='+rece+'&fbtype='+FBtyp+'&state='+stat+'&name='+name+"&allot="+allot+'&priority='+priority+'&accept='+accept+"&timeE="+timeE+"&timeF="+timeF+'&bianHao='+bianHao+'&isState='+isState+'&emp='+emp;
            }
            $table.bootstrapTable('refresh', {url: str});
        }


    </script>

</body>
</html>