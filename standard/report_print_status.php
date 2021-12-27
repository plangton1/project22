<?php
$query = "SELECT DISTINCT  standard_status  FROM main_std ORDER BY standard_status ASC";
$statement = sqlsrv_query($conn,$query);
?>
<script
src="https://code.jquery.com/jquery-3.6.0.min.js"integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
    <div class="container">
        <form action="" method="post">
        <select name="search_status" id="search_status" multiple class="form-control selectpicker">
            <?php while ($row = sqlsrv_fetch_array($statement, SQLSRV_FETCH_ASSOC)) : ?>
            <option value="<?php echo $row["standard_status"] ; ?>"><?php  echo $row["standard_status"] ; ?></option>
            <?php endwhile ; ?>
        </select>
        <input type="hidden" name="status" id="status" />
        <div style="clear:both"></div>
        <br />
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>สถานะ</th>
                        <th>ชื่อ</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <br />
        <br />
        <br />
            </form>
    </div>
<script type="text/javascript">
$(document).ready(function() {
    load_data();
    function load_data(query = '') {
        $.ajax({
            url: "./standard/fetch.php",
            method: "POST",
            data: {
                query: query
            },
            success: function(data) {
                $('tbody').html(data);
            }
        })
    }
    $('#search_status').change(function() {
        //$('#status').val($('#search_status').val());
        var query = $('#search_status').val();
        load_data(query);
        // console.log(query);
    });
});
</script>