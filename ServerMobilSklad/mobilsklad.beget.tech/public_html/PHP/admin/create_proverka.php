<?php

$response = array();
if (isset($_POST['kod'])>0) {
 
    $kod = urldecode($_POST['kod']);
    $a_kod = mb_substr($kod, 8, -1);
    $ves = wordwrap($a_kod , 2 , '.' , true );
    $name = mb_substr($kod, 2, -6);



    require_once '../connect.php';
    $link = mysqli_connect($host, $user, $password, $database);
    $query = ("SELECT * FROM `products` WHERE   `kod`='$name'  and `gorc`= 'mutq'  and `ves`= '$ves' ");
    $result=mysqli_query($link,$query);

     while($row = mysqli_fetch_assoc($result)){

 
    $vess = $row[ves];
    
    
}
 
 
 if($vess){


        $response["success"] = 1;
        $response["message"] = "Oops! An error occurred.";
 
        echo json_encode($response);
}
elseif($ves !== $vess) {
    $response["success"] = 2;
    $response["message"] = "Required field(s) is missing";
 
    echo json_encode($response);
}
}
else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    echo json_encode($response);
}

?>

