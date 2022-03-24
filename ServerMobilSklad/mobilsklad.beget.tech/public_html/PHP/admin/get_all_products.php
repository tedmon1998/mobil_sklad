<?php
 
$response = array();

require_once '../connect.php';
$link = mysqli_connect($host, $user, $password, $database);
$query = ("SELECT * FROM `products` WHERE   `name_lev` !='' ");
$result=mysqli_query($link,$query);


if (mysqli_num_rows($result) > 0) {
    $response["products"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        $products = array();
        $products["pid"] = $row["pid"];
        $products["name"] = $row["name"];
        $products["ves"] = $row["ves"];
        $products["created_at"] = $row["created_at"];
        $products["updated_at"] = $row["updated_at"];
 
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