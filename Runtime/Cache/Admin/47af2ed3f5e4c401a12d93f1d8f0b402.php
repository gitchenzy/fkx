<?php if (!defined('THINK_PATH')) exit();?><div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel"><?php if(empty($_GET['id'])): ?>新增<?php else: ?> 编辑<?php endif; ?>部门</h4>
</div>
<div class="modal-body">
    <form class="form-horizontal" role="form" id="defaultForm" method="post" action="<?php echo ($self); ?>">
        <input type="hidden" name="id" value="<?php echo ($info["ID"]); ?>" />
        <fieldset>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="DutyName">用户组名称</label>
                <div class="col-sm-4">
                    <input class="form-control" id="DutyName" name="DutyName" type="text" value="<?php echo ($info["DutyName"]); ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">状态</label>
                <div class="col-sm-4">
                    <input type="radio" name="Status" value="1" checked />正常
                    <input type="radio" name="Status" value="0" <?php if($info['Status'] == 0): ?>checked<?php endif; ?> />禁用
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="Description">描述信息</label>
                <div class="col-sm-4">
                    <textarea rows="9" id="Description" name="Description" class="form-control form-control-xxl"><?php echo ($info["Description"]); ?></textarea>
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
    $("#submit").click(function(){
        $("#defaultForm").submit();
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