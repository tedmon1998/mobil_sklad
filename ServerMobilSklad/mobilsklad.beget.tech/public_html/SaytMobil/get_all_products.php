<html>
<head>
    <link rel="stylesheet" href='./Taxi.css'>
<meta charset='utf-8' />
<style>  

	#glav {
	    	padding:7px;
	background-color:white;
	border:1px solid #CCC;
	position:fixed;
	background:transparent url(./images/glav.png) no-repeat top left;
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
</style>
</head>
<body>
<?php
 require_once 'session.php';
$response = array();

require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database);
$query = ("SELECT * FROM `products` WHERE   `name_lev` !='' ");
$result=mysqli_query($link,$query);

echo "<table align=center>";
echo "<tr align=center>";
echo "<td>"."Имя продукта"."</td>";
echo "<td>"."Код продукта"."</td>";
echo "<td >"."Дата добавления"."</td>";
echo "<td>"."Дата изменения"."</td>";
echo "</tr>";
while($row = mysqli_fetch_assoc($result)){
echo "<tr align=center>";
echo "<td> <a href='./rupdb.php?id_pa=$row[pid]'>".$row[name]."</a></td>";
echo "<td> <a href='./rupdb.php?id_pa=$row[pid]'>".$row[kod]."</a></td>";
echo "<td>".$row[created_at]."</td>";
echo "<td>".$row[updated_at]."</td>";
echo "</tr>";

}
echo "</table>";
mysqli_close($link);
?>

<meta http-equiv="Refresh" content="7">
<p><a href="./vibor.php" id='glav'></a></p>
</body>
</html>