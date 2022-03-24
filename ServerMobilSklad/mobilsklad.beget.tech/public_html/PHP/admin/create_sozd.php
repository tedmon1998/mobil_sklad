<?php
$response = array();

    if (isset($_POST['name']) && isset($_POST['kod'])) {

    $name = urldecode($_POST['name']);
    $kod = urldecode($_POST['kod']);
    $a_kod = mb_substr($kod, 2, -6);

    require_once '../connect.php';
    $link = mysqli_connect($host, $user, $password, $database);
    $query="INSERT INTO `products`(name, kod, name_lev) VALUES('$name','$a_kod', '$name')";
    $result=mysqli_query($link,$query);

    if ($result) {
        $response["success"] = 1;
        $response["message"] = "Product successfully created";
 
        echo json_encode($response);
    } else {
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        echo json_encode($response);
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    echo json_encode($response);
}

?>