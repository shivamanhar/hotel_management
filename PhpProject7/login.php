
<?php require_once 'header.php';?>  
<?php $page="login"?>
<?php
$msg="";
if(isset($_REQUEST["msg"])){
    if($_REQUEST["msg"]==1){
        $msg = "Registration Successful!!";
    }
    else if($_REQUEST["msg"]==2){
        $msg = "Your password has been changed!!";
    }
    else if($_REQUEST["msg"]==3){
        $msg = "Your password has been sent!!";
    }
}
?>
<html>
    <div class="left">
        <div class="box">
            <table width="200" border=0>
<tr>
	<td>
		<marquee direction="down" align="top" width="200" height="450">
		<img src="image/14hotels1.jpg" height=316 width=400>
		<img src="image/pineapple.jpg" height=200 width=400>
		<img src="image/gallery-thumb8.jpg" height=200 width=400>
		<img src="image/room.jpg" height=200 width=400>
		<img src="image/ALL-4.JPG" height=200 width=400>
		</marquee>	</td>
                <td valign=top><font size=7 color="#7c0000"><b><i></td>
                            </tr></table>
            
            </div>
    </div> 
    <div class="right">
        <div class="box">
            <a href=admin.php class="active"><h1>Log-in as Admin</h1></a><br>
            <a href=staff.php class="active"><h1>Log-in as Staff</h1></a>
            
                </div>
    </div>
   
</html>