<?php
require_once 'db.php';
function redirect($loc){
    header("location:$loc");
}
function check_login(){
    if(!is_login()){
        redirect("login.php");
    }
}
function check_admin(){
    if(!is_admin()){
        redirect("login.php");
    }
}
?>
