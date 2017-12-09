<?php
//项目状态
function rostatus($type) {
    $list = array(
        '1' => '跟进中' ,
        '2' => '成交' ,
        '3' => '失效' ,
    );
    return $list[$type];
}
function get_string() {
    Vendor("Wifisoft.Strings");
    return new Strings;
}
function get_pwd($pwd,$rad){
    return md5(md5($pwd).$rad);
}

function get_user () {
    $user = session("user");
    if (empty($user)){
        return false;
    }
    return $user;
}