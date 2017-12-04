<?php if (!defined('THINK_PATH')) exit();?><div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel"> 确认客户需求问题</h4>
</div>
<div class="modal-body">
    <form class="form-horizontal" role="form" id="defaultForm" method="post" action="<?php echo ($self); ?>">
        <input type="hidden" name="id" value="<?php echo ($info["FeedbackID"]); ?>">
        <fieldset>
            <div class="form-group">
                <label class="col-sm-2 control-label">项目标题</label>
                <div class="col-sm-4">
                    <input class="form-control" disabled  value="<?php echo ($info["Title"]); ?>" type="text" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">解决人</label>
                <div class="col-sm-4">
                    <input class="form-control" disabled  value="<?php echo ($info["EmpName"]); ?>" type="text" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">解决状态</label>
                <div class="col-sm-4">
                    <?php echo parse_dropdownlist($info[FbStatusID],$tInfo,"FbStatusID","FbStatusID","form-control","请选择解决状态");?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="SolveTime">解决时间</label>
                <div class="col-sm-4">
                    <input class="form-control" id="SolveTime" name="SolveTime"  value="<?php echo ($info["SolveTime"]); ?>" type="text" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" >备注</label>
                <div class="col-sm-10">
                    <textarea name="Note" style="width:80%;height:50px;" ><?php echo ($info["Note"]); ?></textarea>
                </div>
            </div>

        </fieldset>
    </form>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal" id="close">关闭</button>
    <button type="button" class="btn btn-primary" id="submit">保存</button>
</div>
<script type="text/javascript">
    laydate({
        elem: '#SolveTime',
        format: 'YYYY-MM-DD', //日期格式
        event: 'focus'


    });
    $("#submit").click(function(){
        var valu = $('#SolveTime').val();
        if(!valu){
            alert('请确认解决时间！')
        }else{
            $("#defaultForm").submit();
        }

    })
    $(document).ready(function() {
        $('#defaultForm')
                .bootstrapValidator({
                    message: 'This value is not valid',
                    feedbackIcons: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        LoginName: {
                            message: '账号不可用',
                            validators: {
                                notEmpty: {
                                    message: '账号不能为空'
                                },
                                stringLength: {
                                    min: 6,
                                    max: 30,
                                    message: '账号长度6-30'
                                },
                                /*remote: {
                                 url: 'remote.php',
                                 message: '账号不可用'
                                 },*/
                                regexp: {
                                    regexp: /^[a-zA-Z0-9_\.]+$/,
                                    message: '账号格式不正确'
                                }
                            }
                        }
                    }
                })
                .on('success.form.bv', function(e) {
                    // Prevent form submission
                    e.preventDefault();
                    // Get the form instance
                    var $form = $(e.target);
                    // Get the BootstrapValidator instance
                    var bv = $form.data('bootstrapValidator');
                    // Use Ajax to submit form data
                    $.post($form.attr('action'), $form.serialize(), function(result) {
                        if(result.status==1){
                            swal({
                                title:"操作成功！",
                                text:result.info,
                                type:"success"
                            },function(){
                                $('#defaultForm').bootstrapValidator('resetForm', true);$('input').val('');$('#addCustomer').modal('hide');
                            });
                        }else{
                            toastr.warning(result.info);return false;
                        }
                    }, 'json');
                });
    });
</script>