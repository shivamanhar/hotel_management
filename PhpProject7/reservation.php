<?php require_once 'header.php';?>  
<?php $page="reservation"?>
<?php
$err="";
if(isset($_POST["chkidt"])){
    if(empty ($_POST["chkidt"])){
        $err = "chk in date is req!!";
    }
    if(empty ($_POST["chkodt"])){
        $err = "chk out date is req!!";
    }
    if(empty ($_POST["noroom"])){
        $err = "no of room is req!!";
    }
    if(empty ($_POST["rtyp"])){
        $err = "room typ is req!!";
    }
    if(empty ($_POST["name"])){
        $err = "name is req!!";
    }
    
    else if(empty ($_POST["email"])){
        $err = "E-Mail is req!!";
    }
    else if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)==false){
        $err = "E-Mail is incorrect!!";
    }
    
    else if(preg_match("/^0?[6-9]{1}\d{9}$/", $_POST["mobno"])==false){
        $err = "mobno is incorrect";
    }
    else if(empty ($_POST["add"])){
        $err = "add is req!!";
    }
    else if(empty ($_POST["req"])){
    }
    else{ 
        $query="INSERT INTO `resev_user`
    (`idresev_user`, `chki_dt`, `chko_dt`, `no_room`, `room_typ`,
    `name_user`, `email`, `mob_no`, `addr_user`, `sep_req`)
    VALUES ($_POST[id], $_POST[chkidt], $_POST[chkodt],$_POST[rno]
        , $_POST[rtyp], $_POST[name], $_POST[email], 
    '$_POST[mobno], $_POST[addr], $_POST [ssreq]);";
    $r =run_sql($query);
     redirect("login.php?msg==1");
    }
}
?>
<form method="post">
    
 <table>
        <tr>
            <td>Check In Date</td>
            <td><input type="text" value="<?php echo $_POST["chkidt"]?>" name="chkidt"/></td>
        </tr>
        <tr>
            <td>Check Out Date</td>
            <td><input type="text" value="<?php echo $_POST["chkodt"]?>" name="chkodt"/></td>
        </tr>
        <tr>
            <td>No. Of Rooms</td>
            <td><input type="text" value="<?php echo $_POST["noroom"]?>" name="noroom"/></td>
        </tr>
        <tr>
            <td>Room Type</td>
            <td><input type="text" value="<?php echo $_POST["rtyp"]?>" name="rtyp"/></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" value="<?php echo $_POST["name"]?>" name="name"/></td>
        </tr>
        <tr>
            <td>E Mail</td>
            <td><input type="text" value="<?php echo $_POST["email"]?>" name="email"/></td>
        </tr>
       
            
        <tr>
            <td>Mobile No</td>
            <td><input type="text" value="<?php echo $_POST["mobno"]?>" name="mobno"/></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" value="<?php echo $_POST["add"]?>" name="add"/></td>
        </tr>
        <tr>
            <td>Requirement If Any</td>
            <td><input type="text" value="<?php echo $_POST["sec_a"]?>" name="sec_a"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="Register"></td>
            <td><input type="reset"/></td>
        </tr>
        <tr >
            <td style="color: red; font-weight: bold;" colspan="2"><?php echo $err;?></td>
        </tr>
    </table>
    </body>
</form>
<?php require_once 'footer.php';?>
