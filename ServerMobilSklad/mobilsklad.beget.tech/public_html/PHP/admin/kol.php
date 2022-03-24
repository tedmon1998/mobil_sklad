<?php 

require_once '../connect.php';
$link = mysqli_connect($host, $user, $password, $database);
$query="
SELECT  name , (COUNT(*)-1) kol
FROM `products` 
GROUP BY kod HAVING kol > 0";
$result=mysqli_query($link,$query);

header("Content-Type: text/html; charset=utf-8");
echo "<table>";
while($row = mysqli_fetch_assoc($result)){
echo "<tr align=center>";
echo "<td>".$row[name].'<br>'."</td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($link);
