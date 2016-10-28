<?php

include("ayar.php");

$kadi = $_POST["kadi"];
$pw = $_POST["pw"];

$sor = mysql_query("SELECT * FROM uyeler WHERE kadi = '$kadi' and pw = '$pw'");

if(mysql_num_rows($sor)>0){

  $yaz = mysql_fetch_array($sor);
  $_SESSION["oturum"] = $kadi;
  $_SESSION["id"] = $yaz["id"];
  header("Location:index.php");
}else{
  echo "böyle bir kayit yok.";
}
?>
