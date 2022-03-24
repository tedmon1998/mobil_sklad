<?php  
//export.php  
$output = '';
if(isset($_POST["export"]))
{
      header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database);
$query="SELECT name, kod, ves, created_at, updated_at FROM `products` WHERE gorc='elq' and name_lev='' and updated_at >= date_sub(now(), INTERVAL 1 HOUR) ORDER BY updated_at DESC";
$result=mysqli_query($link,$query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1" style="border-collapse: collapse;">  
                    <tr>  
                         <th style="color: black; font-size: 20px; border: 1px solid black;background: #C0C0C0;">Имя продукта</th>  
                         <th style="color: black; font-size: 20px; border: 1px solid black;background: #C0C0C0;">Вес продукта</th>  
                         <th style="color: black; font-size: 20px; border: 1px solid black;background: #C0C0C0;">Дата и время</th>  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
                                       echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
   $output .= '
    <tr>  
                         <td style="text-align: center;border: 1px solid black; font-size: 17px;">'.$row["name"].'</td>  
                         <td style="text-align: center;border: 1px solid black; font-size: 17px;">'.$row["ves"].'</td>  
                         <td style="text-align: center;border: 1px solid black; font-size: 17px;">'.$row["updated_at"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table>';

  echo $output;
 }
}
?><meta charset="utf-8">