<?php
include("ayar.php");

$kime = $_POST["kime"];
$mesaj = $_POST["mesaj"];


$ekle = mysql_query("INSERT INTO mesajlar (gonderid,alanid,mesaj) VALUES ('".$_SESSION["id"]."','".$kime."','".$mesaj."')");

if($ekle){

  echo "<script>
        alert('Mesajiniziz gonderildi');
        </script>";

  header("Location:index.php");
}
else{
  echo "Mesajiniz eklenmyor";
}
?>
