<?php
error_reporting(E_ALL);
$DB_SERVER='localhost';
$DB_NAME="admin_aroma";
$DB_USER='aromauser';
$DB_PASS='aromapassword';
/////////////////////////////////////////////////////////////////
$db=mysql_connect($DB_SERVER,$DB_USER,$DB_PASS) or die('<b>ERROR: CAN NOT CONNECT TO DATABASE</b>');
//echo "���� ������� ".$db.$DB_USER.$DB_PASS."<br>";
$db=mysql_select_db ($DB_NAME,$db) or die('<b>ERROR: �� ������� �� </b>'.$DB_NAME." ". mysql_error ());
$row=mysql_fetch_row($db, 'select * from ps_config') or die();
print mysql_error($db);

print_r($row);

print "HELLO";
?>

