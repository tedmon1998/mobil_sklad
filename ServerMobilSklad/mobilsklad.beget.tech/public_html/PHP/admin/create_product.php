<?php
$response = array();
if (isset($_POST['kod'])>0) {
    if (isset($_POST['userses']) && isset($_POST['kod'])) {
 
    $userses = $_POST['userses'];
    $kod = urldecode($_POST['kod']);
    $a_kod = mb_substr($kod, 8, -1);
    $ves = wordwrap($a_kod , 2 , '.' , true );
    $name = mb_substr($kod, 2, -6);



    require_once '../connect.php';
    $link = mysqli_connect($host, $user, $password, $database);
    $query = ("SELECT * FROM `products` WHERE   `name_lev` !='' ");
    $result=mysqli_query($link,$query);

    while($row = mysqli_fetch_assoc($result)){

$names = $row[name];
$kods = $row[kod];
}


 
 if($name == $kods){


    require_once '../connect.php';
    $link = mysqli_connect($host, $user, $password, $database);
    $query="INSERT INTO `products`(name, kod, user, ves, gorc) VALUES('$names' , '$name', '$userses' , '$ves', 'mutq')";
    $result=mysqli_query($link,$query);
    if ($result) {
        $response["success"] = 2;
        $response["message"] = "Product successfully created";
 
        echo json_encode($response);
    } else {
        $response["success"] = 1;
        $response["message"] = "Oops! An error occurred.";
 
        echo json_encode($response);

    }
} 
}
}else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    echo json_encode($response);
}

?>

