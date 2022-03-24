<?php 
 require_once "session.php";
 ?>
<html>
<head>
<meta charset="utf-8">
    <style> 
    	button:focus {
    outline: none;
}
button{
       opacity:0.5;
 text-decoration:none; 
 text-align:center; 
 padding:15px 70px; 
 border:solid 2px #004F72; 
 -webkit-border-radius:40px;
 -moz-border-radius:40px; 
 border-radius: 40px; 
 font:18px "Times New Roman", Times, serif; 
 font-weight:bold; 
 color:#ffffff; 
 background-color:#0055ff; 
 background-image: -moz-linear-gradient(top, #0055ff 0%, #000000 100%); 
 background-image: -webkit-linear-gradient(top, #0055ff 0%, #000000 100%); 
 background-image: -o-linear-gradient(top, #0055ff 0%, #000000 100%); 
 background-image: -ms-linear-gradient(top, #0055ff 0% ,#000000 100%); 
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#000000',GradientType=0 ); 
 background-image: linear-gradient(top, #0055ff 0% ,#000000 100%);   
 -webkit-box-shadow:inset 0px 0px 1px #ffffff;  -moz-box-shadow:inset 0px 0px 1px #ffffff;  box-shadow:inset 0px 0px 1px #ffffff;  
  
  }

button:hover {
    
       opacity:1;
 text-decoration:none; 
 text-align:center; 
 padding:15px 70px; 
 border:solid 2px #004F72; 
 -webkit-border-radius:40px;
 -moz-border-radius:40px; 
 border-radius: 40px; 
 font:18px "Times New Roman", Times, serif; 
 font-weight:bold; 
 color:#ffffff; 
 background-color:#0055ff; 
 background-image: -moz-linear-gradient(top, #0055ff 0%, #000000 100%); 
 background-image: -webkit-linear-gradient(top, #0055ff 0%, #000000 100%); 
 background-image: -o-linear-gradient(top, #0055ff 0%, #000000 100%); 
 background-image: -ms-linear-gradient(top, #0055ff 0% ,#000000 100%); 
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#000000',GradientType=0 ); 
 background-image: linear-gradient(top, #0055ff 0% ,#000000 100%);   
 -webkit-box-shadow:inset 0px 0px 1px #ffffff;  -moz-box-shadow:inset 0px 0px 1px #ffffff;  box-shadow:inset 0px 0px 1px #ffffff;  
  
}
  button:active {
       opacity:1;
 text-decoration:none; 
 text-align:center; 
 padding:15px 70px; 
 border:solid 2px #004F72; 
 -webkit-border-radius:40px;
 -moz-border-radius:40px; 
 border-radius: 40px; 
 font:18px "Times New Roman", Times, serif; 
 font-weight:bold; 
 color:#ffffff; 
 background-color:#ff0000; 
 background-image: -moz-linear-gradient(top, #ff0000 0%, #000000 100%); 
 background-image: -webkit-linear-gradient(top, #ff0000 0%, #000000 100%); 
 background-image: -o-linear-gradient(top, #ff0000 0%, #000000 100%); 
 background-image: -ms-linear-gradient(top, #ff0000 0% ,#000000 100%); 
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#000000',GradientType=0 ); 
 background-image: linear-gradient(top, #ff0000 0% ,#000000 100%);   
 -webkit-box-shadow:inset 0px 0px 1px #ffffff;  -moz-box-shadow:inset 0px 0px 1px #ffffff;  box-shadow:inset 0px 0px 1px #ffffff;  
  
}
    
            .ugl{
                font-size:20px;
      border-radius:10px;
      -moz-border-radius:10px;
      -webkit-border-radius:10px;
      height: 40px;
   }
        #dlina{
            
            width: 100%;
        }

        #input{
       opacity:0.5;
 text-decoration:none; 
 text-align:center; 
 padding:15px 70px; 
 border:solid 2px #004F72; 
 -webkit-border-radius:40px;
 -moz-border-radius:40px; 
 border-radius: 40px; 
 font:18px "Times New Roman", Times, serif; 
 font-weight:bold; 
 color:#ffffff; 
 background-color:#0055ff; 
 background-image: -moz-linear-gradient(top, #0055ff 0%, #000000 100%); 
 background-image: -webkit-linear-gradient(top, #0055ff 0%, #000000 100%); 
 background-image: -o-linear-gradient(top, #0055ff 0%, #000000 100%); 
 background-image: -ms-linear-gradient(top, #0055ff 0% ,#000000 100%); 
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#000000',GradientType=0 ); 
 background-image: linear-gradient(top, #0055ff 0% ,#000000 100%);   
 -webkit-box-shadow:inset 0px 0px 1px #ffffff;  -moz-box-shadow:inset 0px 0px 1px #ffffff;  box-shadow:inset 0px 0px 1px #ffffff;  
        }
        
        #input:hover {
       opacity:1;
 text-decoration:none; 
 text-align:center; 
 padding:15px 70px; 
 border:solid 2px #004F72; 
 -webkit-border-radius:40px;
 -moz-border-radius:40px; 
 border-radius: 40px; 
 font:18px "Times New Roman", Times, serif; 
 font-weight:bold; 
 color:#ffffff; 
 background-color:#0055ff; 
 background-image: -moz-linear-gradient(top, #0055ff 0%, #000000 100%); 
 background-image: -webkit-linear-gradient(top, #0055ff 0%, #000000 100%); 
 background-image: -o-linear-gradient(top, #0055ff 0%, #000000 100%); 
 background-image: -ms-linear-gradient(top, #0055ff 0% ,#000000 100%); 
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#000000',GradientType=0 ); 
 background-image: linear-gradient(top, #0055ff 0% ,#000000 100%);   
 -webkit-box-shadow:inset 0px 0px 1px #ffffff;  -moz-box-shadow:inset 0px 0px 1px #ffffff;  box-shadow:inset 0px 0px 1px #ffffff;  
}

                 #glav {
    position: absolute; /* Абсолютное позиционирование */
    top: 80%; /* Положение слоя от верхнего края */
   }

      #center {
    position: absolute; /* Абсолютное позиционирование */
    left: 50%; /* Положение слоя от левого края */
    top: 50%; /* Положение слоя от верхнего края */
    margin-left: -150px; /* Отступ слева */
    margin-top: -200px; /* Отступ сверху */
   }
body { margin: 0; /* Убираем отступы */
        height: 100%; /* Высота страницы */
    background: url('./ruchnoy_fon.jpg')center no-repeat fixed;width: 100%;
    background-size: cover;}
</style>
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

	<meta charset="utf-8">

</head>
<?php
// Страница регистрации нового пользователя

// Соединямся с БД
require_once 'connectpass.php';
$link = mysqli_connect($host, $user, $password, $database);

if(isset($_POST['submit']))
{
    $err = [];

    // проверям логин
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
    {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }

    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
    {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    // проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT user_id FROM users WHERE user_login='".mysqli_real_escape_string($link, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {

        $login = $_POST['login'];

        // Убераем лишние пробелы и делаем двойное хеширование
        $user = md5(md5(trim($_POST['user'])));


        mysqli_query($link,"INSERT INTO users SET user_login='".$login."', user_password='".$user."'");
                    if(true){
            print "<script>alert('Аккаунт успешно зарегистрирован')</script>";
        }
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}
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
    
    
</section>      


    <div id="center">
<form method="POST">
<input name="login" class="ugl" id="dlina"  type="text" required placeholder="Логин"  ><br><br>
<input name="user" class="ugl" id="dlina" type="password" required placeholder="Пароль" ><br><br>
<a http-equiv="refresh" content="5"><input name="submit" type="submit" value="Зарегистрировать" id="input"  style=" width: 100%"></a><br><br>
</form>

<button id="dlina" style="color: #ffffff;"  onclick="window.location='./get_all_pass_user.php'">Сбросить</button><br><br><br>

<button onclick="window.location='./registr.php'" id="dlina" style="color: #ffffff;">Назад</button>
</div>


</body>
</html>