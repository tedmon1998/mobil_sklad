<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
      <style>
   #centerLayer {
    position: absolute; /* Абсолютное позиционирование */
    left: 50%; /* Положение слоя от левого края */
    top: 31%; /* Положение слоя от верхнего края */
    margin-left: -150px; /* Отступ слева */
    margin-top: -100px; /* Отступ сверху */
   }
      #button {
    position: absolute; /* Абсолютное позиционирование */
    left: 50%; /* Положение слоя от левого края */
    top: 50%; /* Положение слоя от верхнего края */
    margin-left: -150px; /* Отступ слева */
    margin-top: -100px; /* Отступ сверху */
   }
         #button2 {
    position: absolute; /* Абсолютное позиционирование */
    left: 50%; /* Положение слоя от левого края */
    top: 50%; /* Положение слоя от верхнего края */
    margin-left: -150px; /* Отступ слева */
    margin-top: -40px; /* Отступ сверху */
   }
.button{
 text-decoration:none; 
 text-align:center; 
 padding:8px 40px; 
 border:solid 1px #ff0000; 
 -webkit-border-radius:10px;
 -moz-border-radius:10px; 
 border-radius: 10px; 
 font:19px Arial, Helvetica, sans-serif; 
 font-weight:bold; 
 color:#E5FFFF; 
 background:#000000; 
 -webkit-box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff; 
 -moz-box-shadow: 0px 0px 2px #bababa,  inset 0px 0px 1px #ffffff;  
 box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff;  
  
  }
  .input{
 text-decoration:none; 
 text-align:center; 
 padding:7px 0px; 
 -webkit-border-radius:10px;
 -moz-border-radius:10px; 
 border-radius: 10px; 
  border:solid 2px #ff0000;  
  }
  </style>
</head>
<body>
<?php
   if(isset($_GET[id_pa])) { 
$del = $_GET[id_pa];

require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database);
$query = ("SELECT * FROM `products` WHERE   `name_lev` !='' and pid = $del ");
$result=mysqli_query($link,$query);


while($row = mysqli_fetch_assoc($result)){
        print '<form method="POST" action="./rupdb.php" accept-charset="utf-8" id="centerLayer" >
        <br>
         <input type="text" class="input" placeholder="Имя продукта" name="name" value="'.$row[name].'">
        <br><br>
        <input type="text" class="input" placeholder="Код продукта" name="kod" value="'.$row[kod].'">
        </tr>
        <br>
        <input type="hidden" name = "pid" value="'.$_GET[id_pa].'">
        <br>
        <input type="submit" 
        value="Изменить" class="button">
        </form>    ';
    }
    }

    if(isset($_POST[name]) && isset($_POST[kod])) {

    $pid = $_POST[pid]; 
    $name = $_POST[name];
    $kod = $_POST[kod];

    require_once 'connect.php';
    $link = mysqli_connect($host, $user, $password, $database);
    $query = ("SELECT * FROM `products` WHERE  `name_lev` !='' ");
    $result=mysqli_query($link,$query);

    while($row = mysqli_fetch_assoc($result)){
      $names = $row[name];
      $name_lev = $row[name_lev];
    }

    if($names = $name_lev){


        $link = mysqli_connect($host, $user, $password, $database);
        $query = "UPDATE `products` SET name = '$name', kod = '$kod' WHERE pid=$pid" ;

        $result = mysqli_query($link, $query);

        if($result == 'true') {

        $link = mysqli_connect($host, $user, $password, $database);
        $query = "UPDATE `products` SET name_lev = '$name' WHERE pid='".$pid."'" ;

        $result = mysqli_query($link, $query);
      }
        if($result == 'true') {
            echo "Данные изменены";
        } else {
            echo "К сожелению данные не удалось изменить";      
        }        
        mysqli_close($link); 
        }  
    }
?>


<form action="./get_all_products.php">
            <br>
<button  class='button' id='button2' >&ensp;&ensp;Назад&ensp;&ensp;</button>
</form>

</body>
</html>

