<?php 
require_once '../connect.php';
$link = mysqli_connect($host, $user, $password, $database);
$query="
SELECT pid, name, COUNT(*) kol, SUM(ves) ves
FROM `products`WHERE gorc='elq' and name_lev =''
GROUP BY name HAVING kol > 0
";

$result=mysqli_query($link,$query);


if (mysqli_num_rows($result) > 0) {
    $response["products"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        $products = array();
        $products["pid"] = $row["pid"];
        $products["name"] = $row["name"];
        $products["kol"] = $row["kol"];
        $products["ves"] = $row["ves"];
 
        array_push($response["products"], $products);
    }
    $response["success"] = 1;
 
    echo json_encode($response);
} else {
    $response["success"] = 0;
    $response["message"] = "No products found";
 
    echo json_encode($response);
}
?>
