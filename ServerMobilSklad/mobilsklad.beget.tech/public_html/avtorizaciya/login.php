<?php 
 require_once "session.php";
 ?>
<?
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

// Соединямся с БД
require_once 'connectpass.php';
$link = mysqli_connect($host, $user, $password, $database);

if(isset($_POST['submit']))
{
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query7 = mysqli_query($link,"SELECT user_id, user_password  FROM admin WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");

    $data7 = mysqli_fetch_assoc($query7);

        $query2 = mysqli_query($link,"SELECT user_id, user_password  FROM users1 WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");

    $data2 = mysqli_fetch_assoc($query2);

        $query3 = mysqli_query($link,"SELECT user_id, user_password  FROM users2 WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");

    $data3 = mysqli_fetch_assoc($query3);

    // Сравниваем пароли
    if($data7['user_password'] === md5(md5($_POST['password'])))
    {

            $response["success"] = 7;
            $response["message"] = "Admin";
            echo json_encode($response);
    
    }

    elseif($data2['user_password'] === md5(md5($_POST['password'])))
    {
            $response["success"] = 1;
            $response["message"] = "Rabotnik1";
            echo json_encode($response);
    }

    elseif($data3['user_password'] === md5(md5($_POST['password'])))
    {
            $response["success"] = 2;
            $response["message"] = "Rabotnik2";
            echo json_encode($response);
    }
        else
    {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    echo json_encode($response);
    }
}
?>
<meta charset="utf-8">
<form method="POST">
Логин <input name="login" type="text" required><br>
Пароль <input name="password" type="password" required><br>
Не прикреплять к IP(не безопасно) <input type="checkbox" name="not_attach_ip"><br>
<input name="submit" type="submit" value="Войти">
</form>