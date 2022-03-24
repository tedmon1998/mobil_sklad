<?php 
 require_once "session.php";
 ?>
<html>
<head>
    <link rel="stylesheet" href='./Taxi.css'>
    <link rel="shortcut icon" href="../SaytMobil/587a324d7b94d1599d547ec2.png">
    <meta name="Robots" content="all">
    <meta name="resourse-type" content="document">
    <meta name="document-state" content="dynamic">
    <meta name="revisit-after" content="1 days">
    <meta name="document-state" content="dynamic">
    <meta name="distribution" content="global">
  
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../SaytMobil/bootstrap-grid-3.3.1.min.css" rel="stylesheet" type="text/css">
    <link href="../SaytMobil/default.css" rel="stylesheet" type="text/css">
    <link href="../SaytMobil/stylenf.css" rel="stylesheet" type="text/css">
    <link href="../SaytMobil/default.date.css" rel="stylesheet" type="text/css">
    <link href="../SaytMobil/bootstrap-grid-3.3.2.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href='../SaytMobil/stya.css'>
	<meta charset="utf-8">
<style>         
	#glav {
    position: absolute; /* Абсолютное позиционирование */
    top: 80%; /* Положение слоя от верхнего края */
   }
</style>

</head>	 
<body>
<?php
 
$response = array();

require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database);
$query = ("SELECT * FROM `products` WHERE   `name_lev` !='' ");
$result=mysqli_query($link,$query);

echo "<table align=center>";
echo "<tr align=center>";
echo "<td>"."Имя продукта"."</td>";
echo "<td>"."Код продукта"."</td>";
echo "<td>"."Дата добавления"."</td>";
echo "<td>"."Дата изменения"."</td>";
echo "</tr>";
while($row = mysqli_fetch_assoc($result)){
echo "<tr align=center>";
echo "<td>".$row[name]."</td>";
echo "<td>".$row[kod]."</td>";
echo "<td>".$row[created_at]."</td>";
echo "<td>".$row[updated_at]."</td>";
echo"<td><a href='../SaytMobil/rupdb.php?id_pa=$row[pid]'>Изменить||Удалить</a>";
echo "</tr>";

}
echo "</table>";
mysqli_close($link);
?>
    <!-- //NavigationBar-->
    <!-- Background_cyber-->
    <section id="top" class="section section__sec1" style="width=100%">
      <canvas id="canvas-animation" width="100%" 
  height="100%"></canvas>
      <div class="container abs-container">
        <div class="row">
         <div id="centerLayer">

</div> 
        </div>
        <div class="row">
          <div class="col-xs-12 slogan">

          </div>
        </div>

      </div>

    </section>

      <div class="container abs-container">
          
        <div class="row">
            
         <div id="centerLayer">
  <div id="centerLayer">
<form method="POST">


</form>
  <script src="../SaytMobil/jquery.min.js"></script>
  <script src="../SaytMobil/jquery.scrollupformenu.js"></script>
  <script src="../SaytMobil/EasePack.min.js"></script>
  <script src="../SaytMobil/raf.min.js"></script>
  <script src="../SaytMobil/TweenLite.min.js"></script>
  <script src="../SaytMobil/picker.js"></script>
  <script src="../SaytMobil/picker.date.js"></script>
  <script src="../SaytMobil/js/legacy.js"></script>
  <script src="../SaytMobil/jquery.maskedinput.min.js"></script>
  <script src="../SaytMobil/common.js"></script>
    
    
<meta http-equiv="Refresh" content="7">

<p><a href="../SaytMobil/vibor.html" id='glav'><img src="glav.png" alt="Пример" width="50%" 
  height="18%"></a></p>
  
  
  
</body>
</html>