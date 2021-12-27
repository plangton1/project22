<?php

//fetch.php
if($_POST["query"] != '')
{
 $search_array = explode(",", $_POST["query"]);
 $search_text = "'" . implode("', '", $search_array) . "'";
 $query = "
 SELECT * FROM main_ std
 WHERE standard_status IN (".$search_text.") 
 ORDER BY standard_idtb DESC
 ";
}
else
{
 $query = "SELECT * FROM main_std ORDER BY standard_idtb DESC";
}

$statement = sqlsrv_query($conn, $sql);
$result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);

$total_row = $result->sqlsrv_num_rows();

$output = '';

if($total_row > 0)
{
 foreach($result as $row)
 {
  $output .= '
  <tr>
   <td>'.$row["standard_idtb"].'</td>
   <td>'.$row["standard_number"].'</td>
   <td>'.$row["standard_note"].'</td>
   <td>'.$row["standard_status"].'</td>
  </tr>
  ';
 }
}
else
{
 $output .= '
 <tr>
  <td colspan="5" align="center">No Data Found</td>
 </tr>
 ';
}

echo $output;


?>
