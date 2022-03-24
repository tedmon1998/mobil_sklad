<?php
// Страница авторизации

// Функция для генерации случайной строки
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

$response = array();
    if (isset($_POST['login']) && isset($_POST['password'])) {
       $login = $_POST['login'];

require_once 'connectpass.php';
$link = mysqli_connect($host, $user, $password, $database);


{
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query37 = mysqli_query($link,"SELECT user_id, user_password  FROM admin WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");

    $data37 = mysqli_fetch_assoc($query37);

    $query1 = mysqli_query($link,"SELECT user_id, user_password  FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");

    $data1 = mysqli_fetch_assoc($query1);




    // Сравниваем пароли
    if($data37['user_password'] === md5(md5($_POST['password'])))
    {

            $response["succes"] = 37;
            $response["message"] = "Admin";
            echo json_encode($response);
    
    }

    elseif($data1['user_password'] === md5(md5($_POST['password'])))
    {
            $response["succes"] = 1;
            $response["message"] = "Rabotnik1";
            echo json_encode($response);
    }

      else
    {
    $response["succes"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    echo json_encode($response);
    }
}
}
?>