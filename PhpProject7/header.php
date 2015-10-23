<?php require_once 'include/const.php';?>
<?php require_once 'include/db.php';?>
<?php require_once 'include/myfun.php';?>
<?php
ob_start();
function err_hand($eno, $emsg){    
}
set_error_handler("err_hand", E_NOTICE);
session_start();
date_default_timezone_set("asia/kolkata");
$today=date("Y-m-d");
?>
<head>
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <title> Online Hotel Management System</title>
    </head>
    
    <body>
        <marquee behavior=alternate bgcolor="#7e0000"><font color=white><b><i>Welcome to HOTEL!!!</i></b></font></marquee>
        <form>
            <table>
                <tr>
                    
                    <td><img src="image/gallery-thumb2.jpg" height="200" width="400"></img></td>
                    <td><img src="image/gallery-thumb01.jpg" height="200" width="500"></img></td>
                    <td><img src="image/gallery-thumb9.jpg" height="200" width="430"></img></td>
                    
                </tr>
                
            </table>
        </form>
</body>
    <div class="top">
        <div class="box">
            
            <p>&nbsp &nbsp &nbsp &nbsp;</p>
            
            <h1>Online Hotel Management System</h1>
           
            </div>
        
        <div class="fl_left">
        <table>
        <tr>
        
            <td align=center><a href=home.php class="active">Home</a> |	
                <a href=aboutus.php class="active">About us</a> | 
                <a href=login.php class="active">Login</a> |
                <a href=category.php class="active">Category</a> |
                  <a href=reservation.php class="active">Reservation</a> |
                <a href=inventory.php class="active">Inventory</a>
                        
			</td>
		</tr>
        </table>
            </div>
    </div>    
