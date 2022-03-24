<?php
 
$response = array();
 
 
if (isset($_GET["pid"])) {
    $pid = $_GET["pid"];
 
    require_once '../connect.php';
    $link = mysqli_connect($host, $user, $password, $database);
    $query = ("SELECT * FROM `products` WHERE pid = '$pid' ");
    $result=mysqli_query($link,$query);

    if (!empty($result)) {
        if (mysqli_num_rows($result) > 0) {
 
            $result = mysqli_fetch_array($result);
 
            $products = array();
            $products["pid"] = $result["pid"];
            $response["success"] = 1;
 
            $response["products"] = array();
 
            array_push($response["products"], $products);
 
            echo json_encode($response);
        } else {
            $response["success"] = 0;
            $response["message"] = "No product found";
 
            echo json_encode($response);
        }
    } 
} else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    echo json_encode($response);
}
?>