<?php
 $response = array();

if (isset($_POST['login']) && isset($_POST['password'])) 
 {
    $user_login = urldecode($_POST['login']);
    $user_password = md5(md5(trim($_POST['password'])));
 


        require_once '../connectpass.php';
        $link = mysqli_connect($host, $user, $password, $database);
        $query = "UPDATE `admin` SET  user_password = '$user_password' , user_hash = '' , user_ip = '' WHERE user_login = '$user_login' " ;

        $result = mysqli_query($link, $query);
      
    if ($result) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "Product successfully updated.";
        echo json_encode($response);

    }
} 
else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    echo json_encode($response);
}
?>