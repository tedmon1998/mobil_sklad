<?php

$response = array();
 
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];


    require_once '../connect.php';
    $link = mysqli_connect($host, $user, $password, $database);
    $query = ("DELETE FROM products WHERE pid = '".$pid."' ");
    $result=mysqli_query($link,$query);
 

    if (mysqli_affected_rows() > 0) {
        $response["success"] = 1;
        $response["message"] = "Product successfully deleted";
 
        echo json_encode($response);
    } else {
        $response["success"] = 0;
        $response["message"] = "No product found";
 
        echo json_encode($response);
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    echo json_encode($response);
}
?>