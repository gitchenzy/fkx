<?php if (!defined('THINK_PATH')) exit();?><div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel"><?php if(empty($_GET['id'])): ?>新增<?php else: ?> 编辑<?php endif; ?>客户</h4>
</div>
<div class="modal-body">
    <form class="form-horizontal" role="form" id="defaultForm" method="post" action="<?php echo ($self); ?>">
        <input type="hidden" name="id" value="<?php echo ($info["CustomerID"]); ?>" />
        <fieldset>



            <div class="form-group">
                <label class="col-sm-2 control-label" for="FullName">全称</label>
                <div class="col-sm-4">
                    <input class="form-control" id="FullName" name="FullName"  value="<?php echo ($info["FullName"]); ?>" type="text" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="ShortName">简称</label>
                <div class="col-sm-4">
                    <input class="form-control" id="ShortName" name="ShortName"  value="<?php echo ($info["ShortName"]); ?>" type="text" />
                </div>

            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="Website">网址</label>
                <div class="col-sm-4">
                    <input class="form-control" id="Website" type="text" name="Website" value="<?php echo ($info["Website"]); ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="Contacter">联系人</label>
                <div class="col-sm-4">
                    <input class="form-control" id="Contacter" name="Contacter"  value="<?php echo ($info["Contacter"]); ?>" type="text" />
                </div>
            </div>
            <div class="form-group">
                <label for="Telephone"  class="col-sm-2 control-label">联系电话</label>
                <div class="col-sm-3">
                    <input class="form-control" id="Telephone" name="Telephone"  value="<?php echo ($info["Telephone"]); ?>" type="text" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="Email">邮箱</label>
                <div class="col-sm-4">
                    <input class="form-control" id="Email" name="Email"  value="<?php echo ($info["Email"]); ?>" type="text" />
                </div>

            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="WeChat">微信号</label>
                <div class="col-sm-4">
                    <input class="form-control" id="WeChat" name="WeChat"  value="<?php echo ($info["WeChat"]); ?>" type="text" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="Address">地址</label>
                <div class="col-sm-6">
                    <input class="form-control" id="Address" name="Address"  value="<?php echo ($info["Address"]); ?>" type="text" />
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
    /*
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
                                remote: {
                                 url: 'remote.php',
                                 message: '账号不可用'
                                 },
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
    */
</script>