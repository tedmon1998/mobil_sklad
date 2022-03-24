<?php session_start(); ?>
<html><head>
    <meta charset="utf-8">

<style>
.ani{text-decoration:none; text-align:center; 
opacity:0.5; 
 padding:7px 0px; 
 border:solid 1px #004F72; 
 -webkit-border-radius:0px 80px 0px 80px; 	 				 border-radius: 0px 80px 0px 80px; 					-moz-border-radius-topleft:0px; 					-moz-border-radius-topright:80px; 					-moz-border-radius-bottomleft:80px; 					-moz-border-radius-bottomright:0px;  
 font:30px Arial, Helvetica, sans-serif; 
 font-weight:bold; 
 color:#E5FFFF; 
 background-color:#ffffff; 
 background-image: -moz-linear-gradient(top, #ffffff 0%, #0040ff 100%); 
 background-image: -webkit-linear-gradient(top, #ffffff 0%, #0040ff 100%); 
 background-image: -o-linear-gradient(top, #ffffff 0%, #0040ff 100%); 
 background-image: -ms-linear-gradient(top, #ffffff 0% ,#0040ff 100%); 
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0040ff', endColorstr='#0040ff',GradientType=0 ); 
 background-image: linear-gradient(top, #ffffff 0% ,#0040ff 100%);   
 -webkit-box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff; 
 -moz-box-shadow: 0px 0px 2px #bababa,  inset 0px 0px 1px #ffffff;  
 box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff;  
 opacity:0.5; 
 -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=50); 
 filter: alpha(opacity=50); 
   -webkit-transition: all 0.31s linear;
 -moz-transition:  all 0.31s linear;
 -o-transition:  all 0.31s linear;
 transition:  all 0.31s linear;}
 .ani:hover{
     opacity:1; 
 padding:7px 0px; 
 border:solid 1px #004F72; 
 -webkit-border-radius:80px 0px 80px 0px; 	 				 border-radius: 80px 0px 80px 0px; 					-moz-border-radius-topleft:80px; 					-moz-border-radius-topright:0px; 					-moz-border-radius-bottomleft:0px; 					-moz-border-radius-bottomright:80px;  
 font:30px Arial, Helvetica, sans-serif; 
 font-weight:bold; 
 color:#E5FFFF; 
 background-color:#ffffff; 
 background-image: -moz-linear-gradient(top, #ffffff 0%, #0040ff 100%); 
 background-image: -webkit-linear-gradient(top, #ffffff 0%, #0040ff 100%); 
 background-image: -o-linear-gradient(top, #ffffff 0%, #0040ff 100%); 
 background-image: -ms-linear-gradient(top, #ffffff 0% ,#0040ff 100%); 
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0040ff', endColorstr='#0040ff',GradientType=0 ); 
 background-image: linear-gradient(top, #ffffff 0% ,#0040ff 100%);   
 -webkit-box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff; 
 -moz-box-shadow: 0px 0px 2px #bababa,  inset 0px 0px 1px #ffffff;  
 box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff;  
  
 }.ani:active{
     opacity:1; 
 padding:7px 0px; 
 border:solid 1px #004F72; 
 -webkit-border-radius:80px 0px 80px 0px; 	 				 border-radius: 80px 0px 80px 0px; 					-moz-border-radius-topleft:80px; 					-moz-border-radius-topright:0px; 					-moz-border-radius-bottomleft:0px; 					-moz-border-radius-bottomright:80px;  
 font:30px Arial, Helvetica, sans-serif; 
 font-weight:bold; 
 color:#E5FFFF; 
 background-color:#ffffff; 
 background-image: -moz-linear-gradient(top, #ffffff 0%, #ff0303 100%); 
 background-image: -webkit-linear-gradient(top, #ffffff 0%, #ff0303 100%); 
 background-image: -o-linear-gradient(top, #ffffff 0%, #ff0303 100%); 
 background-image: -ms-linear-gradient(top, #ffffff 0% ,#ff0303 100%); 
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff0303', endColorstr='#ff0303',GradientType=0 ); 
 background-image: linear-gradient(top, #ffffff 0% ,#ff0303 100%);   
 -webkit-box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff; 
 -moz-box-shadow: 0px 0px 2px #bababa,  inset 0px 0px 1px #ffffff;  
 box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff;  
  
 }
</style>
 
    <!-- Ìåòà òåãè îïèñàíèÿ äëÿ èíäåêñàöèè â êàòàëîãàõ-->
    <link rel="shortcut icon" href="./SaytMobil/587a324d7b94d1599d547ec2.png">
    <meta name="Robots" content="all">
    <meta name="resourse-type" content="document">
    <meta name="document-state" content="dynamic">
    <meta name="revisit-after" content="1 days">
    <meta name="document-state" content="dynamic">
    <meta name="distribution" content="global">
   
    <!-- Ìåòà òåãè îïèñàíèÿ äëÿ èíäåêñàöèè â êàòàëîãàõ-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./SaytMobil/bootstrap-grid-3.3.1.min.css" rel="stylesheet" type="text/css">
    <link href="./SaytMobil/default.date.css" rel="stylesheet" type="text/css">
    <link href="./SaytMobil/bootstrap-grid-3.3.2.min.css" rel="stylesheet" type="text/css">
    <link href="./SaytMobil/stylenf.css" rel="stylesheet" type="text/css">
    <link href="./SaytMobil/styles4.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="./SaytMobil/images/2l.png" type="image/png" sizes="128x128">
  </head>
  <body>
      

      
      
<script type="text/javascript"> 
if (screen.width <= 480) {
window.location = "http://m.mobilsklad.beget.tech/";
}
</script>

<div class="preloader" id = "page-preloader">
    <h1 class="textd">Tunyan Group</h1>
    <div class="loade2"></h4></div>
    <div class="loader"></div>
</div>

    <!-- NavigationBar-->
   <?php
   
// Страница авторизации

// Функция для генерации случайной строки
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

// Соединямся с БД
require_once 'connectpass.php';
$link = mysqli_connect($host, $user, $password, $database);

if(isset($_POST['submit']))
{
    

    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query7 = mysqli_query($link,"SELECT user_id, user_password  FROM admin WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");

    $data7 = mysqli_fetch_assoc($query7);

        $query2 = mysqli_query($link,"SELECT user_id, user_password  FROM buxgalter WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");

    $data2 = mysqli_fetch_assoc($query2);


    // Сравниваем пароли
    if($data7['user_password'] === md5(md5($_POST['password'])))
    {

		$_SESSION ['asd'] = $_POST['login'];
		 
		 exit( "<script type='text/javascript'>  window.location='./SaytMobil/vibor.php'; </script>");
      

    }

    else if($data2['user_password'] === md5(md5($_POST['password'])))
    {


            $_SESSION ['asd'] = $_POST['login'];
            exit("<script type='text/javascript'>  window.location='./SaytMobil/buxgalter.php'; </script>");
        
    }

        else
    {
      echo "<script>alert('Неверно введен логин или пароль, или учетная запись отключена!');</script>";
    }
}
?>


    <!-- //NavigationBar-->
    <!-- Background_cyber-->
    <section id="top" class="section section__sec1" style="height: 918px;">
      <canvas id="canvas-animation" width="722" height="918"></canvas>
      <div class="container abs-container">
        <div class="row">
         <div id="centerLayer">
<form method="POST">
  
<input name="login" type="text" required placeholder="Логин" class = "ugl"><br><br>
<input name="password" type="password" required placeholder="Пароль" class = "ugl"><br><br>
<input name="submit" type="submit" class = "ani" value="&ensp;&ensp;&emsp;&emsp;&emsp;Войти&ensp;&emsp;&emsp;&ensp;&nbsp;&ensp;" >
</form>
</div> 
        </div>
        <div class="row">
          <div class="col-xs-12 slogan">

          </div>
        </div>

      </div>

    </section>
    <!-- //Background_cyber-->
    <!-- About-->


        
    
 
  
  <script src="./SaytMobil/jquery.min.js"></script>
  <script src="./SaytMobil/jquery.scrollupformenu.js"></script>
  <script src="./SaytMobil/EasePack.min.js"></script>
  <script src="./SaytMobil/raf.min.js"></script>
  <script src="./SaytMobil/TweenLite.min.js"></script>
  <script src="./SaytMobil/picker.js"></script>
  <script src="./SaytMobil/picker.date.js"></script>
  <script src="./SaytMobil/js/legacy.js"></script>
  <script src="./SaytMobil/jquery.maskedinput.min.js"></script>
  <script src="./SaytMobil/common.js"></script>
      <script type="text/javascript"> 
 document.body.onload = function(){
    
    setTimeout(function() {
        var preloader = document.getElementById('page-preloader');
        if(!preloader.classList.contains('done') ){
            preloader.classList.add('done');
        }
    }, 500);
}
</script>
</body></html>