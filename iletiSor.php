<?php
include("ayar.php");
$id = $_POST["id"];
$sor = mysql_query("SELECT * FROM mesajlar WHERE alanid='$id' AND visto = 0");
$sayi = mysql_num_rows($sor);

if($sayi > 0){
  echo $sayi;
}
else{
  echo "yok";
}
?>
