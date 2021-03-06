<?php if (!defined('THINK_PATH')) exit();?><div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">客户联系人</h4>
</div>
<div class="modal-body">
    <form class="form-horizontal" role="form" id="defaultForm" method="post" action="<?php echo ($self); ?>">
        <input type="hidden" id="CustomerID" value="<?php echo ($_GET['id']); ?>" />
        <fieldset>
            <table class="table table-bordered" id="table">
                <tr>
                    <th>联系人名字</th>
                    <th>电话</th>
                    <th class="col-sm-1">性别</th>
                    <th>联系人角色</th>
                    <th>操作</th>
                </tr>
                <?php if(is_array($infos)): $i = 0; $__LIST__ = $infos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><tr type="<?php echo ($info["ContactsID"]); ?>" class="edit">
                        <td>
                            <input  class="form-control" name="Name"  type="text" value="<?php echo ($info["Name"]); ?>" />
                        </td>
                        <td>
                            <input  class="form-control" name="Phone" type="text" value="<?php echo ($info["Phone"]); ?>" />
                        </td>
                        <td>
                            <input  class="form-control" name="Sex" type="text" value="<?php echo ($info["Sex"]); ?>" />
                        </td>
                        <td>
                            <?php echo parse_dropdownlist($info[CtmRoleID],$cr,"CtmRoleID","CtmRoleID","form-control edits","请选择联系人角色");?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary defau">设为默认</button>

                            <button type="button" class="btn btn-danger del">删除</button>

                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td>
                        <input  class="form-control" id="Name" name="Name" type="text" value="" />
                    </td>
                    <td>
                        <input  class="form-control" id="Phone" name="Phone" type="text" value="" />
                    </td>
                    <td>
                        <input  class="form-control" id="Sex" name="Sex" type="text" value="" />
                    </td>
                    <td>
                        <?php echo parse_dropdownlist('',$cr,"CtmRoleID","CtmRoleID","form-control","请选择联系人角色");?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" id="add">添加</button>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>

<script type="text/javascript">

    $("#submit").click(function(){
        $("#defaultForm").submit();
    })
    var $table = $('#table');
    $('#add').click(function(){
        var name =  $('#Name').val();
        var phone =  $('#Phone').val();
        var sex =  $('#Sex').val();
        var ct =  $('#CtmRoleID').val();
        var id =  $('#CustomerID').val();
        var data = {'Name':name,"Phone":phone,'Sex':sex,'CustomerID':id,'CtmRoleID':ct,type:1};
        $.post('/admin/Customer/contacts',data,function(d){
            if(d.status == 1){
                alert(d.info)
               location.reload();
            }

        })
    })

    $('.edit').find('input').blur(function(){
        var v = $(this).val();
        var cid = $(this).parents('.edit').attr('type')
        var names = $(this).attr('name')
        var data = {'value':v,'cid':cid,'name':names,type:2}
       // alert(name);
        editCon(data);
    })
    $('.edits').change(function(){
        var v = $(this).val();
        var names = 'CtmRoleID';
        var cid = $(this).parents('.edit').attr('type')
        var data = {'value':v,'cid':cid,'name':names,type:2}
        editCon(data);
    })
    function editCon(data){
        $.post('/admin/Customer/contacts',data,function(d){

        })
    }
    //设为默认
    $('.defau').click(function(){

        var cid = $(this).parents('.edit').attr('type')
        $.post('/admin/Customer/contacts',{'cid':cid,type:3},function(d){
            if(d.status == 1){
                alert(d.info);
            }
        })
    })
    //删除
    $('.del').click(function(){
        //alert(111)
        var cid = $(this).parents('.edit').attr('type')

        $.post('/admin/Customer/contacts',{'cid':cid,type:4},function(d){
            if(d.status == 1){
                alert(d.info);
                location.reload();
            }
        })

       // confirmDelete("/admin/Customer/delContacts",{'cid':cid},$table,$(this),"CustomerID",cid);

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