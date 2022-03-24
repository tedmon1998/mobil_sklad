<?php
$i = 1;
while($i<=10) 
{ 
    require_once '../connect.php';
	$link = mysqli_connect($host, $user, $password, $database);
    $query="INSERT INTO `products`(kod) VALUES('12345')";
    $result=mysqli_query($link,$query);
    $i++;
}
?>
