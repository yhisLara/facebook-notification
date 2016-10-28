<?php
 include("ayar.php");

$id = $_POST["id"];

$sor = mysql_query("SELECT  * FROM mesajlar WHERE alanid='$id' ORDER BY id DESC");
$w = mysql_fetch_array($sor);
if($w["durum"] != '1'){
  echo $w["mesaj"];
}
else{
echo "hayir";
}
?>
