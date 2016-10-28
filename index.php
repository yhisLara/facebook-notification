<?php include("ayar.php");?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Notify</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.js"></script>
  <script type="text/javascript">
  </script>
</head>
<body>
  <?php if(isset($_SESSION["oturum"])){?>
<div id="header">
  <div class="header">
    <ul class="ust_sec">
      <li class="kisiler"></li>
      <li class="mesajlar">1</li>
      <li class="bildirimler"></li>
    </ul>
  </div>
</div>
<div class="alt">
  <div class="sol">Panel</div>
  <div class="sag">
    Hola, <?php echo $_SESSION["oturum"];?>
    <hr/>
    <form action="gonder.php" method="post" name="form2">
        <br/>
        <table border="0">
          <tr>
          <td>Kime Gönderilerek</td>
            <td>
                <select name="kime">
                  <?php
                    $sor = mysql_query("SELECT * FROM uyeler");
                    while($w = mysql_fetch_array($sor)){
                      echo "<option value='".$w['id']."'>".$w['kadi']."</option>";
                    }
                  ?>

                </select>
            </td>
          </tr>
          <tr>
          <td>Mesajiniz</td>
            <td><textarea style="width:300px; heigth:100px;" name="mesaj"></textarea>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="gonder" value="Mesaji Gönder"/></td>
          </tr>
        </table>
    </form>
    <a href="cikis_yap.php">cikis yap</a>
  </div>
</div>
<div class="ileti">
</div>
<?php }else{ ?>
<div class="oturum_ac">
  <form action="giris.php" method="post" name="form1">
      <br/>
      <table border="0">
        <tr>
          <td>Kullanici Adi</td>
          <td><input type="text" name="kadi"/></td>
        </tr>
        <tr>
          <td>Sifre</td>
          <td><input type="password" name="pw"/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="gonder" value="Giris"/></td>
        </tr>
      </table>
  </form>
</div>

<?php } ?>
<script type="text/javascript">
  function iletiSor(){
    var id = "<?php echo $_SESSION["id"];?>";
    var deger = "id="+id;
    $.ajax({
      type:"POST",
      url:"iletiSor.php",
      data:deger,
      success: function(donen){
        if(donen == "yok"){

        }
        else{
          $(".mesajlar").empty();
          $(".mesajlar").append(donen);

          $.ajax({
            type:"POST",
            data:deger,
            url:"verisor.php",
            success: function(donen2){
              if(donen2 != "hayir"){
              $(".ileti").fadeIn("fast",function(){
                $(".ileti").empty();
                $(this).append("<span style='display:block; font-weight:bold;'>Yeni Mesajiniz var</span>"+donen2).delay(2000).fadeOut();

                $.ajax({
                  type:"POST",
                  data:deger,
                  url:"degistir.php",
                  success:function(donen3){
                    //alert(donen3);
                  }
                });
              });
            }
            }
          });
        }
      }
    });
  }
  setInterval("iletiSor();",200);
</script>
</body>
</html>
