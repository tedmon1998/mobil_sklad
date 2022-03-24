<?php 
 require_once "session.php";
 ?>
<html>
<head>

    <link rel="stylesheet" href='./style_scroll.css'>
    <link rel="stylesheet"  href="./styls.css" media="screen"/>

  <title></title>

  <style>
.word{text-decoration:none; text-align:center; 
 padding:9px 9px; 
 width:100px;
 border:solid 1px #004F72; 
 -webkit-border-radius:4px;
 -moz-border-radius:4px; 
 border-radius: 4px; 
 font:18px Georgia, "Times New Roman", Times, serif; 
 font-weight:bold; 
 color:#E5FFFF; 
 background-color:#0033ff; 
 background-image: -moz-linear-gradient(top, #0033ff 0%, #002bff 100%); 
 background-image: -webkit-linear-gradient(top, #0033ff 0%, #002bff 100%); 
 background-image: -o-linear-gradient(top, #0033ff 0%, #002bff 100%); 
 background-image: -ms-linear-gradient(top, #0033ff 0% ,#002bff 100%); 
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#002bff', endColorstr='#002bff',GradientType=0 ); 
 background-image: linear-gradient(top, #0033ff 0% ,#002bff 100%);   
 -webkit-box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff; 
 -moz-box-shadow: 0px 0px 2px #bababa,  inset 0px 0px 1px #ffffff;  
 box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff;  
 opacity:0.7; 
 -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=70); 
 filter: alpha(opacity=70); 
  }
  .word:hover{
 padding:9px 9px; 
 width:100px;
 border:solid 1px #004F72; 
 -webkit-border-radius:4px;
 -moz-border-radius:4px; 
 border-radius: 4px; 
 font:18px Georgia, "Times New Roman", Times, serif; 
 font-weight:bold; 
 color:#E5FFFF; 
 background-color:#0033ff; 
 background-image: -moz-linear-gradient(top, #0033ff 0%, #002bff 100%); 
 background-image: -webkit-linear-gradient(top, #0033ff 0%, #002bff 100%); 
 background-image: -o-linear-gradient(top, #0033ff 0%, #002bff 100%); 
 background-image: -ms-linear-gradient(top, #0033ff 0% ,#002bff 100%); 
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#002bff', endColorstr='#002bff',GradientType=0 ); 
 background-image: linear-gradient(top, #0033ff 0% ,#002bff 100%);   
 -webkit-box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff; 
 -moz-box-shadow: 0px 0px 2px #bababa,  inset 0px 0px 1px #ffffff;  
 box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff;  
   opacity:1; 
 -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100); 
 filter: alpha(opacity=100); 
 }

 
 .exel{text-decoration:none; text-align:center; 
 padding:9px 9px; 
  width:100px;
 border:solid 1px #004F72; 
 -webkit-border-radius:4px;
 -moz-border-radius:4px; 
 border-radius: 4px; 
 font:18px Georgia, "Times New Roman", Times, serif; 
 font-weight:bold; 
 color:#E5FFFF; 
 background:#0c851a; 
 -webkit-box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff; 
 -moz-box-shadow: 0px 0px 2px #bababa,  inset 0px 0px 1px #ffffff;  
 box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff;  
 opacity:0.7; 
 -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=70); 
 filter: alpha(opacity=70); 
  }
  .exel:hover{
 padding:9px 9px; 
  width:100px;
 border:solid 1px #004F72; 
 -webkit-border-radius:4px;
 -moz-border-radius:4px; 
 border-radius: 4px; 
 font:18px Georgia, "Times New Roman", Times, serif; 
 font-weight:bold; 
 color:#E5FFFF; 
 background:#0c851a; 
 -webkit-box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff; 
 -moz-box-shadow: 0px 0px 2px #bababa,  inset 0px 0px 1px #ffffff;  
 box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff;  
   opacity:1; 
 -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100); 
 filter: alpha(opacity=100); 
 }
 
  #a{ 

color: black; font-size: 20px;
border: 1px solid black;
z-index: 9999; position: sticky; top: -1%; width: 15.2%;left:0%;background: rgba(244, 244, 244, 0.5);color:#000000;
}

  #b{
color: black; font-size: 20px;
border: 1px solid black;
z-index: 9999; position: sticky; top: -1%; width:10.85%;left:10.15%;background: rgba(244, 244, 244, 0.5);color:#000000;
}
  #c{
border: 1px solid black;
color: black; font-size: 20px;

z-index: 9999; position: sticky; top: -1%; width:10.2%;left:20.95%;background: rgba(244, 244, 244, 0.5);color:#000000;
}
  #d{
color: black; font-size: 20px;
border: 1px solid black;

z-index: 9999; position: sticky; top: -1%; width:29.1%;left:31.09%;background: rgba(244, 244, 244, 0.5);color:#000000;
}
  #e{
border: 1px solid black;
color: black; font-size: 20px; 

z-index: 9999; position: sticky; top: -1%; width:29.2%;left:60.1%;background: rgba(244, 244, 244, 0.5);color:#000000;
}
  #f{
      
color: black; font-size: 20px;

border: 1px solid black;
z-index: 9999; position: sticky; top: -1%; width:12%;left:90.23%;background: rgba(244, 244, 244, 0.5);color:#000000;
}

#body{
    background:white;
    
}

  #aa{ 
text-align: center;border: 1px solid black; font-size: 17px;
width: 10.1%;
}

  #ab{
text-align: center;border: 1px solid black; font-size: 17px;
width:10.80%;
}
  #ac{
text-align: center;border: 1px solid black; font-size: 17px;
width:10.15%;
}
  #ad{
      text-align: center;border: 1px solid black; font-size: 17px;
width:29.1%;
}
  #ae{
text-align: center;border: 1px solid black; font-size: 17px;
width:29.15%;
}
  #af{
      text-align: center;border: 1px solid black; font-size: 17px;
width:12%;
}



   #kol {
    position: absolute; /* Абсолютное позиционирование */
    left: 25%; /* Положение слоя от левого края */
    top: 1%; /* Положение слоя от верхнего края */

   }
         
         
#export {
    position: absolute;
    top: 7%;
    left: 1%;/* Положение слоя от верхнего края */
   }
   #export2 {
    position: absolute;
    top: 1%;
    left: 1%;/* Положение слоя от верхнего края */
   }
      #centerLayer {
    position: absolute; /* Абсолютное позиционирование */
    top: 20%; /* Положение слоя от верхнего края */

   }

         #glav {
    position: absolute; /* Абсолютное позиционирование */
    top: 1%; /* Положение слоя от верхнего края */
   }

   .button{
    outline: none;
 text-align:center; 
 border-radius: 10px; 
 font:19px Arial, Helvetica, sans-serif; 
}
  
  #noramk{
    background-color: transparent; 
    border: 0;
    padding: 0;
  }

   #table1{
       
    border: 0;
    padding: 0;
    position: absolute; /* Абсолютное позиционирование */
    left: -230px; /* Положение слоя от левого края */
    top: -100%; /* Положение слоя от верхнего края */
 
   transition:all 1s;

  }
  
     #table2{
       
    border: 0;
    padding: 0;
    position: absolute; /* Абсолютное позиционирование */
    left: -230px; /* Положение слоя от левого края */
    top: -250%; /* Положение слоя от верхнего края */
 
   transition:all 1s;

  }

    .img1{
    background:url(./images/sklad.png);
    background-color:#ffffff;
    width:65px;
    height:55px;
    top:1%;
    left:93%;
    background-size: 65px 55px;
    position:relative;   
    opacity: 1;
 }
.img1:hover #table1{
    
   top:5px;
   }
   
       .img2{
    background:url(./images/prodano.png);
    background-color:#ffffff;
    width:65px;
    height:55px;
    top:3%;
    left:93%;
    background-size: 65px 55px;
    position:relative;   
    opacity: 1;
 }
.img2:hover #table2{
    
   top:5px;
   }
   

  </style>
  <script src="./jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="./bootstrap.min.css" />  
  <script src="./bootstrap.min.js"></script>  
  <script src="./jquery.min2.js"></script>  
  <meta charset="utf-8">
</head>
<body>

    <script type="text/javascript">
        function RemoveRule () {
                // removes the ruleToRemove style rule that affects the table
            var style = document.styleSheets[0];
            style.removeRule (0);

                // refreshes the table 
            var table = document.getElementById ("myTable");
            table.refresh ();
        }
    </script>
 
<tbody class="scroll"> 
 



<?php



if(isset($_POST['sklad'])) 
{
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database);
$query="SELECT name, kod, ves, created_at, updated_at, user
FROM `products` WHERE name_lev='' and gorc='mutq' ORDER BY updated_at DESC";
$result=mysqli_query($link,$query);
echo "<table id='centerLayer' class='table table-bordered' >";
echo "<tr align=center>";
echo "<td id='a' >"."Имя продукта"."</td>";
echo "<td id='c'>"."Вес продукта"."</td>";
echo "<td id='d'>"."Дата и время"."</td>";
echo "</tr>";
while($row = mysqli_fetch_assoc($result)){
echo "<tr align=center>";
echo "<td id='aa'>".$row[name]."</td>";
echo "<td id='ac'>".$row[ves]."</td>";
echo "<td id='ae'>".$row[updated_at]."</td>";
echo "</tr>";
}
}
echo "</table>";
?>


<?php
if(isset($_POST['prodano']))
{
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database);
$query="SELECT name, kod, ves, created_at, updated_at, user
FROM `products` WHERE name_lev='' and gorc='elq' ORDER BY updated_at DESC";
$result=mysqli_query($link,$query);
echo "<table id='centerLayer' class='table table-bordered'>";
echo "<tr align=center>";
echo "<td id='a'>"."Имя продукта"."</td>";
echo "<td id='c'>"."Вес продукта"."</td>";
echo "<td id='d'>"."Дата и время"."</td>";
echo "</tr>";
while($row = mysqli_fetch_assoc($result)){
echo "<tr align=center>";
echo "<td id='aa'>".$row[name]."</td>";
echo "<td id='ac'>".$row[ves]."</td>";
echo "<td id='ae'>".$row[updated_at]."</td>";
echo "</tr>";
}
}
echo "</table>";
?>






<?php
if(isset($_POST['chas1']))
{
    echo    "<form method='post' action='chas1.php'>
     <input type='submit' id='export' name='export' class='exel' value='Excel' />
    </form>";
         echo    "<form method='post' action='chas1w.php'>
     <input type='submit' name='export' id='export2' class='word' value='Word' />
    </form>";
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database);
$query="SELECT name, kod, ves, created_at, updated_at, user FROM `products` WHERE gorc='mutq'  and  name_lev='' and updated_at >= date_sub(now(), INTERVAL 1 HOUR) ORDER BY updated_at DESC";
$result=mysqli_query($link,$query);
echo "<table id='centerLayer' class='table table-bordered'>";
echo "<tr align=center>";
echo "<td id='a'>"."Имя продукта"."</td>";
echo "<td id='c'>"."Дата и время"."</td>";
echo "<td id='e'>"."Дата изменения"."</td>";
echo "</tr>";
while($row = mysqli_fetch_assoc($result)){
echo "<tr align=center>";
echo "<td id='aa'>".$row[name]."</td>";
echo "<td id='ac'>".$row[ves]."</td>";
echo "<td id='ae'>".$row[updated_at]."</td>";
echo "</tr>";
}
}
echo "</table>";
?>

<?php
if(isset($_POST['chas2']))
{
    echo    "<form method='post' action='chas2.php'>
     <input type='submit' name='export' id='export' class='exel' value='Excel' />
    </form>";
     echo    "<form method='post' action='chas2w.php'>
     <input type='submit' name='export' id='export2' class='word' value='Word' />
    </form>";
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database);
$query="SELECT name, kod, ves, created_at, updated_at, user FROM `products` WHERE gorc='elq' and name_lev='' and updated_at >= date_sub(now(), INTERVAL 1 HOUR) ORDER BY updated_at DESC";
$result=mysqli_query($link,$query);
echo "<table id='centerLayer' class='table table-bordered'>";
echo "<tr align=center>";
echo "<td id='a'>"."Имя продукта"."</td>";
echo "<td id='c'>"."Вес продукта"."</td>";
echo "<td id='d'>"."Дата и время"."</td>";
echo "</tr>";
while($row = mysqli_fetch_assoc($result)){
echo "<tr align=center>";
echo "<td id='aa'>".$row[name]."</td>";
echo "<td id='ac'>".$row[ves]."</td>";
echo "<td id='ae'>".$row[updated_at]."</td>";
echo "</tr>";
}
}
echo "</table>";
?>

<?php
if(isset($_POST['20191']))
{
    echo    "<form method='post' action='20191.php'>
     <input type='submit' name='export' id='export' class='exel' value='Excel' />
    </form>";
                    echo    "<form method='post' action='20191w.php'>
     <input type='submit' name='export' id='export2' class='word' value='Word' />
    </form>";
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database);
$query="SELECT name, kod, ves, created_at, updated_at, user FROM `products` WHERE gorc='mutq' and name_lev='' and YEAR(updated_at) >= YEAR(NOW()) ORDER BY updated_at DESC";
$result=mysqli_query($link,$query);
echo "<table id='centerLayer' class='table table-bordered'>";
echo "<tr align=center>";
echo "<td id='a'>"."Имя продукта"."</td>";
echo "<td id='c'>"."Вес продукта"."</td>";
echo "<td id='e'>"."Дата и время"."</td>";
echo "</tr>";
while($row = mysqli_fetch_assoc($result)){
echo "<tr align=center>";
echo "<td id='aa'>".$row[name]."</td>";
echo "<td id='ac'>".$row[ves]."</td>";
echo "<td id='ae'>".$row[updated_at]."</td>";
echo "</tr>";
}
}
echo "</table>";
?>

<?php
if(isset($_POST['20192']))
{
    echo    "<form method='post' action='20192.php'>
     <input type='submit' name='export' id='export' class='exel' value='Excel' />
    </form>";
                echo    "<form method='post' action='20192w.php'>
     <input type='submit' name='export' id='export2' class='word' value='Word' />
    </form>";
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database);
$query="SELECT name, kod, ves, created_at, updated_at, user FROM `products` WHERE gorc='elq' and name_lev='' and YEAR(updated_at) = YEAR(NOW()) ORDER BY updated_at DESC";
$result=mysqli_query($link,$query);
echo "<table id='centerLayer' class='table table-bordered'>";
echo "<tr align=center>";
echo "<td id='a'>"."Имя продукта"."</td>";
echo "<td id='c'>"."Вес продукта"."</td>";
echo "<td id='d'>"."Дата и время"."</td>";
echo "</tr>";
while($row = mysqli_fetch_assoc($result)){
echo "<tr align=center>";
echo "<td id='aa'>".$row[name]."</td>";
echo "<td id='ac'>".$row[ves]."</td>";
echo "<td id='ae'>".$row[updated_at]."</td>";
echo "</tr>";
}
}
echo "</table>";
?>


<?php
if(isset($_POST['mes1']))
{
    echo    "<form method='post' action='mes1.php'>
     <input type='submit' name='export' id='export' class='exel' value='Excel' />
    </form>";
        echo    "<form method='post' action='mes1w.php'>
     <input type='submit' name='export' id='export2' class='word' value='Word' />
    </form>";
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database);
$query="SELECT name, kod, ves, created_at, updated_at, user FROM `products` WHERE gorc='mutq'  and  name_lev='' and MONTH(`updated_at`) = MONTH(NOW()) AND YEAR(`updated_at`) = YEAR(NOW()) ORDER BY updated_at DESC";
$result=mysqli_query($link,$query);
echo "<table id='centerLayer' class='table table-bordered'>";
echo "<tr align=center>";
echo "<td id='a'>"."Имя продукта"."</td>";
echo "<td id='c'>"."Вес продукта"."</td>";
echo "<td id='d'>"."Дата и время"."</td>";
echo "</tr>";
while($row = mysqli_fetch_assoc($result)){
echo "<tr align=center>";
echo "<td id='aa'>".$row[name]."</td>";
echo "<td id='ac'>".$row[ves]."</td>";
echo "<td id='ae'>".$row[updated_at]."</td>";
echo "</tr>";
}
}
echo "</table>";
?>



<?php
if(isset($_POST['mes2']))
{
    echo    "<form method='post' action='mes2.php'>
     <input type='submit' name='export' id='export' class='exel' value='Excel' />
    </form>";
            echo    "<form method='post' action='mes2w.php'>
     <input type='submit' name='export' id='export2' class='word' value='Word' />
    </form>";
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database);
$query="SELECT name, kod, ves, created_at, updated_at, user FROM `products` WHERE gorc='elq' and name_lev='' and MONTH(`updated_at`) = MONTH(NOW()) AND YEAR(`updated_at`) = YEAR(NOW()) ORDER BY updated_at DESC";
$result=mysqli_query($link,$query);
echo "<table id='centerLayer' class='table table-bordered'>";
echo "<tr align=center>";
echo "<td id='a'>"."Имя продукта"."</td>";
echo "<td id='c'>"."Вес продукта"."</td>";
echo "<td id='d'>"."Дата и время"."</td>";
echo "</tr>";
while($row = mysqli_fetch_assoc($result)){
echo "<tr align=center>";
echo "<td id='aa'>".$row[name]."</td>";
echo "<td id='ac'>".$row[ves]."</td>";
echo "<td id='ae'>".$row[updated_at]."</td>";
echo "</tr>";
}
}
echo "</table>";
?>

</tbody>


<div class="img1">
<form method="POST" id="table1">
<table class='table' style="background-color: transparent; border-spacing: 15px 0px;" id='noramk'> 

<tr class='table' style="background-color: transparent; "  >


  <td style="background-color: transparent; " id='noramk' class='noramk'>
    <button method="POST"   name="20191"  style="background-color:  transparent;" class="header-menu-sub" ><img src="./icon/2019.png" style="width: 25px ; height: 25px;" ></button><p ><br>



  <td style="background-color: transparent; "  id='noramk' class='noramk'>
    <button method="POST"   name="mes1"  style="background-color:  transparent;"  ><img src="./icon/calendar.png" style="width: 25px ; height: 25px;" ></button><p ><br>



  <td style="background-color: transparent; " id='noramk' class='noramk'>
    <button method="POST"   name="chas1"  style="background-color:  transparent;"  ><img src="./icon/chas.png" style="width: 25px ; height: 25px;" ></button><p ><br>



  <td style="background-color: transparent; " id='noramk'  >
    <button method="POST" class='button'   name="sklad"  style="background-color:  transparent; color:#ff9911; width: 100px; height: 30px"  >&nbsp;&nbsp;Склад&nbsp;&nbsp;</button><p ><br>



</tr>
</table>
</form>
</div>


<div class="img2">
<form method="POST" id="table2">
<table class='table' style="background-color: transparent; border-spacing: 15px 0px;" id='noramk'> 

<tr class='table' style="background-color: transparent; "  >


  <td style="background-color: transparent; " id='noramk' class='noramk'>


  <button method="POST"   name="20192"  style="background-color:  transparent;"  ><img src="./icon/2019.png" style="width: 25px ; height: 25px" ></button></td>

  <td style="background-color: transparent; "  id='noramk' class='noramk'>


  <button method="POST"   name="mes2"  style="background-color:  transparent;"  ><img src="./icon/calendar.png" style="width: 25px ; height: 25px" ></button></td>

  <td style="background-color: transparent; " id='noramk' class='noramk'>


  <button method="POST"   name="chas2"  style="background-color:  transparent;"  ><img src="./icon/chas.png" style="width: 25px ; height: 25px" ></button></td>

  <td style="background-color: transparent; " id='noramk'  >


  <button method="POST"   name="prodano"   style="background-color:  transparent; color:#ff9911; width: 100px; height: 30px"  class='button'>Продано</button></td>


</tr>
</table>
</form>
</div>


<div style="display:none; top: 93%" class="vixod" id="vixod"></div>
<div style="display:none; top: 88%" class="nav_up" id="nav_up"></div>

<script src="./jquery-1.3.2.js" type="text/javascript"></script>
<script src="./scroll-startstop.events.jquery.js" type="text/javascript"></script>
<script>
$(function() {
var $elem = $('#content');
 
$('#nav_up').fadeIn('slow');
$('#nav_down').fadeIn('slow');
$('#vixod').fadeIn('slow');

$(window).bind('scrollstart', function(){
$('#vixod,#nav_up,#nav_down').stop().animate({'opacity':'0.2'});
});
$(window).bind('scrollstop', function(){
$('#vixod,#nav_up,#nav_down').stop().animate({'opacity':'1'});
});
 
$('#nav_down').click(
function (e) {
$('html, body').animate({scrollTop: $elem.height()}, 800);
}
);
$('#nav_up').click(
function (e) {
$('html, body').animate({scrollTop: '0px'}, 800);
}
);
});
</script>

<script>
 
$('#vixod').click(
function (e) {
location.href="./logout.php?do=logout"
}
);
</script>
</body>
</html>


