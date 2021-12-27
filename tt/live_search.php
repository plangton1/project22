<?php
include_once("../connection/connection.php");
if($_POST["query"] != '') {
	$searchData = explode(",", $_POST["query"]);
	$searchValues = "'" . implode("', '", $searchData) . "'";
	$queryQuery = "SELECT * FROM main_std WHERE standard_status IN (".$searchValues.")";
} else {
	$queryQuery = "SELECT * FROM main_std";
}
$resultset = sqlsrv_query($conn, $queryQuery);
$totalRecord = sqlsrv_num_rows($resultset);
$htmlRows = '';
if($totalRecord) {
  while( $developer = sqlsrv_fetch_array($resultset, SQLSRV_FETCH_ASSOC) ) {
  $htmlRows .= '
	  <tr>
		   <td>'.$developer["standard_number"].'</td>
		   <td>'.$developer["standard_status"].'</td>
		   <td>'.$developer["standard_meet"].'</td>
		   <td>'.$developer["standard_note"].'</td>
		   <td>'.$developer["standard_tacking"].'</td>
	  </tr>';
  }
} else {
	$htmlRows .= '
		<tr>
			<td colspan="5" align="center">No record found.</td>
		</tr>';
}
$data = array(
	"html" => $htmlRows		
);
echo json_encode($data);	
?>