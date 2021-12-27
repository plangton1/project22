<?php
require('./connection/connection.php');
?><html><body>
<!-- form for selectstatus selection -->
<form action="test20.php" method="POST">
Please select the selectstatus you are about to work on. </br></br>
<select name="select"><option> Choose </option>
<?php

$sql = "SELECT DISTINCT standard_status FROM main_std ";
$result = sqlsrv_query($conn,$sql);
while ($data=sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
    echo '<option value="'.$data['standard_status'].'">';
    echo $data['standard_status']; 
    echo "</option>";
}

?><input type="submit" value="Select selectstatus">
</select></br></br>
</form>
<table cols="3" cellpadding="0" cellspacing="0" border="0">
<?php

if(empty($_POST['select'])){     
    $_SESSION['selectstatus'] = ''; 
} else {  
    $sql = "SELECT * FROM main_std WHERE standard_status = '".$_POST['select']."'";
    $result = sqlsrv_query($conn,$sql) or die("Couldn't execut query");
    while ($row=sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
        $_SESSION['selectstatus'] = $_POST['select']; 
        echo     '<td>'.$row['standard_note'].'</td>';
        echo     '<td>'.$row['standard_status'].'</td>';
    }
}

?></table></body></html>