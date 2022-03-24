<?php
require_once 'session.php';
$response = array();
 
if (isset($_GET['id_pa'])) {
    $id_pa = $_GET['id_pa'];


    require_once 'connect.php';
    $link = mysqli_connect($host, $user, $password, $database);
    $query = ("DELETE FROM `products` WHERE pid = '".$id_pa."' ");
    $result=mysqli_query($link,$query);
        if ($result) {
        echo  "Продукт удачно удален";
 
        echo json_encode($response);
    } else {
        echo  "Ошибка";
 
        echo json_encode($response);
    }
}

?>
<meta charset='utf-8' />