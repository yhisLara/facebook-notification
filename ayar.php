<?php
session_start();
$host = "localhost";
$user ="encubbcl";
$pass = "a5vgrqhr63iw";

$baglan = mysql_connect($host,$user,$pass);
if(!$baglan) die("murió");
mysql_select_db("encubbcl_notify",$baglan) or die ("connect BD die");
?>
