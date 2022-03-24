<?php 
 require_once "session.php";
 ?>
<?php
 
$response = array();
 
if (isset($_POST['pid']) && isset($_POST['name']) && isset($_POST['kod'])) 
 {
    $pid = urldecode($_POST['pid']);
    $name = urldecode($_POST['name']);
    $kod = urldecode($_POST['kod']);
 
 
    require_once '../connect.php';
    $link = mysqli_connect($host, $user, $password, $database);
    $query = ("SELECT * FROM `products` WHERE  `name_lev` !='' ");
    $result=mysqli_query($link,$query);

    while($row = mysqli_fetch_assoc($result)){
      $name_lev = $row[name_lev];
    }

    if($name_lev){


        $link = mysqli_connect($host, $user, $password, $database);
        $query = "UPDATE `products` SET name = '$name', kod = '$kod', name_lev = '$name' WHERE pid='".$pid."'" ;
        $result = mysqli_query($link, $query);

        if ($result) {

        $link = mysqli_connect($host, $user, $password, $database);
        $query = "UPDATE `products` SET name = '$name', kod = '$kod' WHERE name = '$name_lev'" ;
        $result = mysqli_query($link, $query);

    if ($result) {
        $response["success"] = 1;
        $response["message"] = "Product successfully updated.";
 
        echo json_encode($response);
    }
        
    } 
      }

else {
 
    }
} 
else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    echo json_encode($response);
}
?>