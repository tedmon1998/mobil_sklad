<?php 
 require_once "session.php";
 ?>
<html>
<head>
  <script src="../SaytMobil/bootstrap.min.js"></script>  
  <script src="../SaytMobil/jquery.min.js"></script>  
 	      <link rel="shortcut icon" href="../SaytMobil/587a324d7b94d1599d547ec2.png">

	<meta charset="utf-8">
<style> 
	#glav {
	    	padding:7px;
	background-color:white;
	border:1px solid #CCC;
	position:fixed;
	background:transparent url(../SaytMobil/images/glav.png) no-repeat top left;
	background-position:50% 50%;
	width:30px;
	height:30px;
	bottom:30px;
	opacity:0.7;
	left:95%;
	white-space:nowrap;
	cursor: pointer;
	-moz-border-radius: 3px 3px 3px 3px;
    -webkit-border-top-left-radius:3px;
	-webkit-border-top-right-radius:3px;
    -khtml-border-top-left-radius:3px;
	-khtml-border-top-right-radius:3px;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=70);

   }

#ramka{
    font-size: 25px;
    padding: 5px; /* Поля вокруг содержимого ячеек */
    border: 1px solid black; /* Граница вокруг ячеек */
}
</style>

</head>	 
<body>
    

            
<?php
 
$response = array();

require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database);
$query = ("SELECT * FROM `admin` ");
$result=mysqli_query($link,$query);

echo "<table align=center class='table table-bordered' style='width:40%;' id='ramka'>";
echo "<tr align=center>";
echo "<td bgcolor='#ffffff'; >"."Имя сотрудника"."</td>";
echo "</tr>";
while($row = mysqli_fetch_assoc($result)){
echo "<tr align=center style='color=#ffffff;  padding: 3px; border: 3px solid black;'>";
echo "<td bgcolor='#ffffff'; id='ramka'><a href='./get_all_pass.php?id_pa=$row[user_id]'>".$row[user_login]." </a></td>";
echo "</tr>";

}
echo "</table>";
mysqli_close($link);
?>


<?php
   if(isset($_GET[id_pa])) { 
$pid = $_GET[id_pa];

    require_once 'connectpass.php';
    $link = mysqli_connect($host, $user, $password, $database);
    $query = ("UPDATE `admin` SET   user_password = 'c3284d0f94606de1fd2af172aba15bf3' WHERE user_id = $pid");
    $result=mysqli_query($link,$query);
    if ($result) {
        // successfully updated

        echo  "<script>alert('Ваш Пароль: admin');</script>";

    }

}

?>


<p><a href="./register_admin.php" id='glav'></a></p>



</body>
</html>



