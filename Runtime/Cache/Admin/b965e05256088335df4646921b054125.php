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
            <h5>客户信息</h5>
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

                           <!-- <a class="btn btn-success" data-toggle="modal" data-target="#addCustomer" data-remote="/admin/Customer/addCustomer">
                                新增1
                            </a>-->
                            <button id="addform" class="btn btn-success">
                                新增
                            </button>



                            <button id="edit" class="btn btn-primary" disabled>
                                编辑
                            </button>

                            <button id="remove" class="btn btn-danger" disabled>
                                <i class="glyphicon glyphicon-remove"></i> 删除
                            </button>


                            <!--<button id="editPWD" class="btn btn-primary" disabled>-->
                               <!--重置密码-->
                            <!--</button>-->

                        <!--<a id="cusInfo" class="btn btn-primary  J_menuItem" disabled="true" >-->
                            <!--查看信息-->
                        <!--</a>-->

                        <!--<button id="Contacts" class="btn btn-success" disabled>-->
                            <!--联系人-->
                        <!--</button>-->

                            <!--<button id="Allot" class="btn btn-success" disabled>-->
                                <!--分配-->
                            <!--</button>-->

                        <!--<button id="count" class="btn btn-success" disabled>-->
                            <!--统计数据-->
                        <!--</button>-->


                        <!--<select id="Ctm" class="form-control select-huge">-->
                            <!--<option value="0">客户状态</option>-->
                            <!--<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
                                <!--<option value="<?php echo ($vo["CtmStatusID"]); ?>"><?php echo ($vo["CtmStatusName"]); ?></option>-->
                            <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                        <!--</select>-->
                        <select id="CtmRankID" class="form-control select-huge">
                            <option value="0">客户等级</option>
                            <?php if(is_array($rank)): $i = 0; $__LIST__ = $rank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><option value="<?php echo ($r["CtmRankID"]); ?>"><?php echo ($r["CtmRankName"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <!--<select id="ctmS" class="form-control select-huge">-->
                            <!--<option value="0">客户来源</option>-->
                            <!--<option value="1">直营</option>-->
                            <!--<option value="2">代理</option>-->
                        <!--</select>-->

                        <!--<input type="text" id="DeveloperName" placeholder="客户归属查询">-->
                        <input type="text" id="address" placeholder="地址查询">
                        <label class="control-label">创建时间：</label>
                        <input class="form-control input-huge" id="TimeA" name="TimeA" value="" type="text" placeholder="创建时间"> -
                        <input class="form-control input-huge" id="TimeB" name="TimeB" value="" type="text" placeholder="创建时间">
                        <button id="searchButton" class="btn btn-success">
                            时间搜索
                        </button>
                    </div>
                    <table id="table"
                           data-toolbar="#toolbar"
                           data-search="true"
                           data-show-refresh="true"
                           data-show-columns="true"
                           data-show-export="true"
                           data-minimum-count-columns="5"
                           data-pagination="true"
                           data-id-field="CustomerID"
                           data-sort-name="CreateTime"
                           data-detail-formatter="detailFormatter"
                           data-click-select = true
                           data-order="desc"
                           data-page-size = "10"
                           data-page-number = "1"
                           data-page-list="[10,20,50,100,ALL]"
                           data-show-footer="false"
                           data-side-pagination="server"
                           data-url="/admin/Customer/loadCustomer"
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


    <script type="text/javascript">
        var $table = $('#table'), $edit=$('#edit');$remove = $('#remove'), selections = [];
        var $pwd = $('#editPWD');
        var $adc = $('#Contacts');
        var $cusInfo = $('#cusInfo');
        var $add = $('#addform');
        var $Allot = $('#Allot');
        var $count = $('#count');
        function initTable() {
            $table.bootstrapTable({
                formatSearch:function(){return '请输入客户简称或者客户编号'},
                height: getHeight(),
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

                        {field: 'ShortName', title: '简称', align: 'center'},
                        {field: 'FullName', title: '全称', align: 'left', halign:'center'},
                        {field: 'CtmRankName', title: '客户等级', align: 'center'},
                        {field: 'Telephone', title: '电话', align: 'center'},
                        {field: 'Mobile', title: '手机', align: 'center'},
                        {field: 'Email', title: '邮箱', align: 'center'},
                        {field: 'Qq', title: 'QQ', align: 'center'},
                        {field: 'Address', title: '地址', align: 'center'},
                        {field: 'Status', title: '状态', align: 'center'},
                        {field: 'CreateTime', title: '创建时间', align: 'center',sortable: true},
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
                var checkLen = $table.bootstrapTable('getSelections').length;
                if(checkLen == 1){
                    //$edit.attr("data-remote",""+getIdSelections()+'&t=' + Math.random(1000) );
                    $edit.prop('disabled',false);
                    $pwd.prop('disabled',false);
                    $adc.prop('disabled',false);
                    $Allot.prop('disabled',false);
                    $count.prop('disabled',false);
                    $cusInfo.attr("href","/admin/Customer/customerInfo?id="+getIdSelections());
                    $cusInfo.removeAttr("disabled");
                }else{
                    //$edit.attr("data-remote","javascript:void(0);");
                    $edit.prop('disabled',true);
                    $pwd.prop('disabled',true);
                    $adc.prop('disabled',true);
                    $Allot.prop('disabled',true);
                    $count.prop('disabled',true);
                    $cusInfo.attr("href","");
                    $cusInfo.attr("disabled","");
                }
                selections = getIdSelections();
            });
            $remove.click(function () {
                var ids = getIdSelections();
                var param = {ids:ids};
                confirmDelete("/admin/Customer/delCustomer",param,$table,$remove,"CustomerID",ids);
            });
            $add.click(function(){
                $("#addCustomer").modal({
                    remote: "/admin/Customer/addCustomer"
                    ,backdrop: 'static'
                    ,keyboard: false
                });
            });
            $edit.click(function(){
                $("#addCustomer").modal({
                    remote: "/admin/Customer/editCustomer?id=" + getIdSelections()+'&t=' + Math.random(1000)
                    ,backdrop: 'static'
                    ,keyboard: false
                });
            });
            $pwd.click(function(){
                $("#addCustomer").modal({
                    remote: "/admin/Customer/editPWD?id=" + getIdSelections()+'&t=' + Math.random(1000)
                    ,backdrop: 'static'
                    ,keyboard: false
                });
            });
            $adc.click(function(){
                $("#addCustomer").modal({
                    remote: "/admin/Customer/contacts?id=" + getIdSelections()+'&t=' + Math.random(1000)
                    ,backdrop: 'static'
                    ,keyboard: false
                });
            });
            $Allot.click(function(){
                $("#addCustomer").modal({
                    remote: "/admin/Customer/allotMoCustomer?id=" + getIdSelections()+'&t=' + Math.random(1000)
                    ,backdrop: 'static'
                    ,keyboard: false
                });
            });
            $count.click(function(){
                $("#addCustomer").modal({
                    remote: "/admin/Customer/countCustomer?id=" + getIdSelections()+'&t=' + Math.random(1000)
                });
            });
            $(window).resize(function () {
                $table.bootstrapTable('resetView', {
                    height: getHeight()
                });
            });

        }

        function getIdSelections(param) {
            return $.map($table.bootstrapTable('getSelections'), function (row) {
                return row.CustomerID;
            });
        }
        //$("#model").on("hidden.bs.model",function(e){$(this).removeData();});
        $(function () {
            $("#addCustomer").on("hidden.bs.modal", function() {
                $(this).removeData("bs.modal");
                $edit.prop('disabled',true);
                $pwd.prop('disabled',true);
                $adc.prop('disabled',true);
                $Allot.prop('disabled',true);
                $remove.prop('disabled',true);
                $cusInfo.prop("disabled",true);
                $count.prop("disabled",true);
                $table.bootstrapTable('refresh', {silent: true});
            });
            eachSeries(getScript, initTable);
            laydate({elem: '#TimeA', format: 'YYYY-MM-DD hh:mm:ss',event: 'focus'});
            laydate({elem: '#TimeB', format: 'YYYY-MM-DD hh:mm:ss', event: 'focus'});
        });

        $('#Ctm').change(function(){
            search();
        })
        $('#CtmRankID').change(function(){
            search();
        })
        $('#ctmS').change(function(){
            search();
        })
        $('#DeveloperName').keyup(function(){
            search();
        })
        $('#address').keyup(function(){
            search();
        })
        $('#searchButton').click(function(){
            search();
        })

        function search(){
            var ctm = $('#Ctm').val();
            var ctmName = $('#DeveloperName').val();
            var address = $('#address').val();
            var ctmR = $('#CtmRankID').val();
            var timeA = $('#TimeA').val();
            var timeB = $('#TimeB').val();
            var ctmS = $('#ctmS').val();
            var str =  '/admin/Customer/loadCustomer?ctmState='+ctm+'&ctmName='+ctmName+'&address='+address+'&timeB='+timeB+'&timeA='+timeA+'&ctmR='+ctmR+'&ctmS='+ctmS;
            $table.bootstrapTable('refresh', {url: str});
        }
    </script>

</body>
</html>