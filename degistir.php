<?php
include("ayar.php");
$id = $_POST["id"];

$guncelle =  mysql_query("SELECT * FROM mesajlar WHERE alanid='$id' ORDER BY id DESC LIMIT 0,1");
$deger =  mysql_fetch_array($guncelle);
$sonid = $deger["id"];
$guncelle =  mysql_query("UPDATE mesajlar SET durum = '1' WHERE id = '$sonid'");

if($guncelle){
  echo "evet";
}
else{
  echo "hayir";
}
?>
