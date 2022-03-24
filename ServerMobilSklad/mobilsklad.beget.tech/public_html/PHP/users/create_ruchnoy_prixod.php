<?php
 
$response = array();
 
if (isset($_POST['pid']) && isset($_POST['ves']) && isset($_POST['userses'])) {
 
    $pid = urldecode($_POST['pid']);
    $vess = urldecode($_POST['ves']);
    $userses = urldecode($_POST['userses']);
    $ves = wordwrap($vess , 2 , '.' , true );
 
    require_once '../users.php'; 
    require_once '../connect.php';
    $link = mysqli_connect($host, $user, $password, $database);
    $query = ("SELECT * FROM `products` WHERE  `name_lev` !='' and pid='".$pid."'");
    $result=mysqli_query($link,$query);

    while($row = mysqli_fetch_assoc($result)){
              $kod = $row[kod];
      $names = $row[name];
      $name_lev = $row[name_lev];
    }

    if($names){


    $link = mysqli_connect($host, $user, $password, $database);
    $query="INSERT INTO `products`(name, kod, user, ves, gorc) VALUES('$names' , '$kod', '$userses', '$ves', 'mutq')";
    $result=mysqli_query($link,$query);

      }
    if ($result) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "Product successfully updated.";
 
        echo json_encode($response);
    } else {
 
    }
} 
else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    echo json_encode($response);
}
?>