<?php  require_once 'session.php';
//export.php  
$output = '';
if(isset($_POST["export"]))
{
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database);
$query="SELECT name, kod, ves, created_at, updated_at
FROM `products` WHERE name_lev='' and gorc='elq' ORDER BY updated_at DESC";
$result=mysqli_query($link,$query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Имя продукта</th>  
                         <th>Вес продукта</th>  
                         <th>Дата</th>  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["name"].'</td>  
                         <td>'.$row["ves"].'</td>  
                         <td>'.$row["updated_at"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
<meta charset="utf-8">