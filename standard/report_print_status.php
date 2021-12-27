<?php
$sql = ("SELECT * ,a.standard_idtb,a.standard_status,b.statuss_name AS name_status FROM main_std a 
INNER JOIN select_status b ON a.standard_status = b.id_statuss ORDER BY standard_number ASC ");
$result = sqlsrv_query($conn, $sql);

$sql2 = "SELECT * FROM select_status";
$query2 = sqlsrv_query($conn , $sql2);
?>

<select name="select_status" id="select_status" multiple class="form-control selectpicker"   style="height: unset !important;">
        <option selected disabled>กรุณาเลือกสถานะ</option>
        <?php
        while ($result = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
        <option value="<?php echo $result['id_statuss'];  ?>">
            <?php echo $result['statuss_name'];  ?></option>
        <?php } ?>
    </select>
    <div style="clear:both"></div>
    <br />
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>สถานะของเอกสาร</th>
                    <th>วันที่เพิ่มสถานะ</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <br />
    <br />
    <br />
    </div>
    <script>
$(document).ready(function(){

 load_data();
 
 function load_data(query='')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('tbody').html(data);
   }
  })
 }

 $('#select_status').change(function(){
  $('#status').val($('#select_status').val());
  var query = $('#status').val();
  load_data(query);
 });
 
});
</script>
