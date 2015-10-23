<?php
function run_sql($query){
    global $dbname;
    $con = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or exit(mysql_error());
    mysql_select_db($dbname);
    $r = mysql_query($query, $con) or exit(mysql_error());
    return $r;
}
?>