<?php
require('../connection/connection.php');
if(count($_POST['query']) > 0)
{
 $search_text = implode(",",$_POST['query']);
 $query = "SELECT * FROM main_std WHERE standard_status IN ($search_text) ORDER BY standard_idtb DESC";
}
else
{
 $query = "SELECT * FROM main_std ORDER BY standard_idtb DESC";
}

$statement = sqlsrv_query($conn,$query);
$total_row = sqlsrv_num_rows($statement);
$output = '';
// if($total_row > 0)
// {
   while($row = sqlsrv_fetch_array($statement, SQLSRV_FETCH_ASSOC)){
  $output .= '
  <tr>
   <td>'.$row["standard_idtb"].'</td>
   <td>'.$row["standard_number"].'</td>
   <td>'.$row["standard_status"].'</td>
  </tr>
  ';
   }
// }
echo $output;
exit();
?>