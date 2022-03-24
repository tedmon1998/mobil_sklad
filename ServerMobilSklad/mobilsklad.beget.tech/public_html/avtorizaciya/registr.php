<?php 
 require_once '../SaytMobil/session.php';
 ?>
<html>
<head>

	<style> 
	
	button:focus {
    outline: none;
}
   .button{
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
 
	body { margin: 0; /* Убираем отступы */
    	height: 100%; /* Высота страницы */
	background: url('../SaytMobil/images/fona.jpg')center no-repeat fixed;width: 100%;
	background-size: cover;}
	        #dlina{
            width: 100%;
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
    margin-top: -100px; /* Отступ сверху */
   }
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
<body>
    
    
    
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

  
  


<form method="POST">
</form>

	<div id="center">
	<button onclick="window.location='./register_admin.php'" class="button" id = "dlina">Администратор</button><br><br>
	<button onclick="window.location='./register_user1.php'" class="button" id = "dlina">Персонал</button><br><br>
	<button onclick="window.location='./buxgalter.php'" class="button" id = "dlina">Бухгалтер</button>
	</div>
	<p><a href="../SaytMobil/vibor.php" id='glav' style="left:-10%; top:2150%;"><img src="glav.png" alt="Пример" width="35%" 
  height="12%"></a></p>
  
  
  


         <!-- Background_cyber-->

             </div> 
        </div>


      </div> 

</body>
</html>