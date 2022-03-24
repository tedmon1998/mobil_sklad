<?php
 
$response = array();
 
if (isset($_POST['pid']) && isset($_POST['ves']) && isset($_POST['userses'])) {
 
    $pid = urldecode($_POST['pid']);
    $ves = urldecode($_POST['ves']);
    $userses = $_POST['userses'];
 
    require_once '../connect.php';
    $link = mysqli_connect($host, $user, $password, $database);
    $query = ("SELECT * FROM `products` WHERE  `name_lev` !='' and pid='$pid'");
    $result=mysqli_query($link,$query);

    while($row = mysqli_fetch_assoc($result)){
      $names = $row[name];
      $kod = $row[kod];
      $name_lev = $row[name_lev];
    }

    if($names){


    $link = mysqli_connect($host, $user, $password, $database);
    $query="INSERT INTO `products` (`pid`, `name`, `kod`, `created_at`, `updated_at`, `user`, `ves`, `gorc`, `name_lev`) VALUES (NULL, '$names', '$kod', current_timestamp(), current_timestamp(), '$userses', '$ves', 'mutq', '')";
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