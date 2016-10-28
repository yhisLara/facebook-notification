<?php
include("ayar.php");

$id = $_POST["id"];

$sor = mysql_query("UPDATE mesajlar SET visto=1 WHERE alanid='$id'");

if($sor){
  echo "evet";
}
else{
  echo "hayir";
}
?>
