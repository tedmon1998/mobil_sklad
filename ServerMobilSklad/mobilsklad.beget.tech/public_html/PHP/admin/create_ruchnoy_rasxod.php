<?php
 
$response = array();
 
if (isset($_POST['pid']) && isset($_POST['ves'])) {
 
    $pid = urldecode($_POST['pid']);
    $ves = urldecode($_POST['ves']);
 
 
 

    require_once '../connect.php';
    $link = mysqli_connect($host, $user, $password, $database);
    $query = ("SELECT * FROM `products` WHERE   `name` !='' and pid='".$pid."' ");
    $result=mysqli_query($link,$query);

    while($row = mysqli_fetch_assoc($result)){

  echo  $names = $row[name];
  echo  $kods = $row[kod];
}

 if($names){
    require_once '../connect.php';
    $link = mysqli_connect($host, $user, $password, $database);
    $query="UPDATE `products` SET gorc = 'elq' WHERE `kod`='$kods' and `ves`= '$ves' and `gorc`= 'mutq'  and `name_lev`='' LIMIT 1";
    $result=mysqli_query($link,$query);


    if ($result) {
        $response["success"] = 1;
        $response["message"] = "Product successfully created";
 
        echo json_encode($response);
    } 
}else {
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        echo json_encode($response);
    }
}
?>