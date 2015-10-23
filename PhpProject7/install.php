<?php
require_once 'include/const.php';

$con = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or exit(mysql_error());
echo "db connected<br>";

$query = "drop schema if exists $dbname";
$r = mysql_query($query, $con) or exit(mysql_error());
echo "db dropped<br>";

$query = "create schema $dbname";
$r = mysql_query($query, $con) or exit(mysql_error());
echo "db created<br>";

mysql_select_db($dbname);
$query="CREATE  TABLE`resev_user` (
  `idresev_user` INT NOT NULL AUTO_INCREMENT ,
  `chki_dt` DATETIME NOT NULL ,
  `chko_dt` DATETIME NOT NULL ,
  `no_room` INT NOT NULL ,
  `room_typ` VARCHAR(45) NOT NULL ,
  `name_user` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(300) NOT NULL ,
  `mob_no` VARCHAR(45) NOT NULL ,
  `addr_user` VARCHAR(300) NOT NULL ,
  `sep_req` VARCHAR(300) NULL ,
  PRIMARY KEY (`idresev_user`) );";
$r = mysql_query($query, $con) or exit(mysql_error());
echo"table created";

$query="INSERT INTO `resev_user`
    (`idresev_user`, `chki_dt`, `chko_dt`, `no_room`, `room_typ`,
    `name_user`, `email`, `mob_no`, `addr_user`, `sep_req`)
    VALUES (`id`, 'chkidt', 'chkodt', noroom, 'rtyp', 'name', 'email', 
    'mobno', 'add', 'req');";
echo "Row inserted <br>";

$query = "CREATE  TABLE `user_entry`(
  `iduser_entry` INT NOT NULL ,
  `user_name` VARCHAR(45) NOT NULL ,
  `mob_no` VARCHAR(45) NOT NULL ,
  `user_add` VARCHAR(45) NOT NULL ,
  `room_no` VARCHAR(45) NOT NULL ,
  `floor_no` VARCHAR(45) NULL ,
  PRIMARY KEY (`iduser_entry`, `user_name`) );";
$r = mysql_query($query, $con) or exit(mysql_error());
echo"table created";


$query =  "INSERT INTO user_entry (
    user_name,mob_no,user_add,room_no,floor_no ) VALUES('name','mob','addr','rno','fno');";
    $r = mysql_query($query, $con) or exit(mysql_error());
echo "Row inserted <br>";

?>