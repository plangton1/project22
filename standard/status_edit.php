<?php date_default_timezone_set("Asia/Bangkok");
$date_today = (date('d/m/Y H:i:s'));
?>
<?php include('status_edit_sql.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title></title>
</head>
<body>
<h5 align="left" class="text-success">สถานะของเอกสารปัจจุบัน : <?php echo $result['name_status']; ?>
    <section class="about section-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div align="left">
                        <a class="btn btn-sm " style="background-color:#FFD700;" onclick="window.history.go(-1); return false;">ย้อนกลับ</a>
                    </div>
                    <div class="section-title">
                        <h2>แก้ไขเอกสาร</h2>
                        <h3>แก้ไขเอกสาร <span>มอก.</span></h3>
                    </div>
                </div>
                <div class="container">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mt-4 ">
                                    <div class="card-body bg-primary text-white">
                                        <div class="">
                                            <div class="form-group mb-2">
                                                <label for="">สถานะ</label>
                                                <select class="form-control" name="standard_status" value="<?php echo $result['standard_status']?>"
                                                    style="height: unset !important;" require>
                                                    <option selected>กรุณาเลือกสถานะ</option>
                                                    <?php
                                                    $sqll = "SELECT * FROM select_status";
                                                    $queryy = sqlsrv_query($conn, $sqll);
                                                    while ($result2 = sqlsrv_fetch_array($queryy, SQLSRV_FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $result2['id_statuss'];  ?>">
                                                        <?php echo $result2['statuss_name'];  ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="card mt-4">
                                    <div class="card-body bg-success text-white">
                                        <div class="">
                                            <div class="form-group mb-2">
                                                <label for="">วันที่แต่งตั้ง</label>
                                                <input  id="" type="date" name="standard_day" class=" form-control" value="<?php echo $result['standard_day'] ?>" require>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <div class="">
                                            <div class="form-group mb-2">
                                                <label for="">วาระจากที่ประชุม สมอ. </label>
                                                <input type="text" name="standard_meet" class="form-control"
                                                    value="<?php echo $result["standard_meet"] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <div class="">
                                            <div class="form-group mb-2 f-red">
                                                <label for="">เลขที่ มอก.*</label>
                                                <input type="text" name="standard_number" class="form-control" required
                                                    value="<?php echo $result["standard_number"] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <div class="">
                                            <div class="form-group mb-2">
                                                <label for="">ชื่อมาตรฐาน</label>
                                                <input type="text" name="standard_detail" class="form-control"
                                                    value="<?php echo $result["standard_detail"] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="form-group mb-2">
                                    <label for="">ประเภทผลิตภัณฑ์. </label>
                                    <input type="text" name="type_id" class="form-control">
                                </div> -->

                            <div class="col-md-4">
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <div class="">
                                            <div class="form-group mb-2">
                                                <label for="">มาตรฐานบังคับ</label>
                                                <input type="text" name="standard_mandatory" class="form-control"
                                                    value="<?php echo $result["standard_mandatory"] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <div class="">
                                            <div class="form-group mb-2">
                                                <label for="">หมายเลข tracking</label>
                                                <input type="text" name="standard_tacking" class="form-control"
                                                    value="<?php echo $result["standard_tacking"] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <div class="">
                                            <div class="form-group mb-2">
                                                <label for="">หมายเหตุ</label>
                                                <input type="text" name="standard_note" class="form-control"
                                                    value="<?php echo $result["standard_note"] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       

    <!-- หลายฟอร์ม -->
    <div class="col-md-8">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="">
                                        <label for="">ไฟล์แนบ</label>
                                        <a href="javascript:void(0)" onclick="add_element('main5','sub_main5');"
                                            class=" float-end btn btn-success">เพิ่ม</a>
                                        <div class="main-form1 mt-3 " id="main5">
                                            <input type="file" class="form-control" name="fileupload[]" id="fileupload"
                                                style="height: unset !important;">
                                            <div style="display:none;">
                                                <div class="row" id="sub_main5">

                                                    <div class="">
                                                        <div class="form-group mb-2 input-group mt-3">

                                                            <input type="file" class="form-control" name="fileupload[]"
                                                                id="fileupload" style="height: unset !important;">
                                                            <button type="button" onclick="$(this).parent().remove();"
                                                                class="remove-btn btn btn-danger ">ลบ</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>


                        <!-- หลายฟอร์ม -->
                        <div class="main-form mt-3 ">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card mt-8">
                                        <div class="card-body">
                                            <div class="">
                                                <div class="form-group mb-2">
                                                    <label for="">กลุ่มผลิตภัณฑ์</label>
                                                    <a href="javascript:void(0)"
                                                        class="add-more-form float-end btn btn-success">เพิ่ม</a>
                                                    <?php
                                                    $standarsidtb = $_REQUEST['standard_idtb'];
                                                    $sql = "SELECT * FROM dimension_group WHERE standard_idtb  = '$standarsidtb' ";
                                                    $query1 = sqlsrv_query($conn, $sql);
                                                    while ($result = sqlsrv_fetch_array($query1, SQLSRV_FETCH_ASSOC)) { ?>
                                                    <?php $group =  $result['group_id']; ?>
                                                    <select class="form-control" name="group_id[]" id="group_id"
                                                        style="height: unset !important;">
                                                        <option value="">กรุณาเลือกกลุ่มผลิตภัณฑ์</option>
                                                        <?php
                                                            $sql2 = "SELECT * FROM group_tb";
                                                            $query2 = sqlsrv_query($conn, $sql2);
                                                            while ($result2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) {
                                                                $group2 =  $result2['group_id'];
                                                                if ($group == $group2) {
                                                                    $c = "selected";
                                                                } else {
                                                                    $c = "";
                                                                }
                                                            ?>

                                                        <option value="<?php echo $result2['group_id'];  ?>"
                                                            <?php echo $c; ?>><?php echo $result2['group_name']; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                    <?php } ?>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="paste-new-forms"></div>
                                </div>
                            </div>

                        </div>

                        <!--  -->



                        <!-- หลายฟอร์ม -->
                        <div class="main-form1 mt-3 ">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card mt-8">
                                        <div class="card-body">
                                            <div class="">
                                                <div class="form-group mb-2">
                                                    <label for="">หน่วยงานที่สามารถทดสอบได้</label>
                                                    <a href="javascript:void(0)"
                                                        class="add-more-form2 float-end btn btn-success">เพิ่ม</a>
                                                    <?php
                                            $standarsidtb = $_REQUEST['standard_idtb'];
                                            $sql2 = "SELECT * FROM dimension_agency WHERE standard_idtb  = '$standarsidtb' ";
                                            $query2 = sqlsrv_query($conn, $sql2);
                                            while ($result2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
                                                    <?php $agency =  $result2['agency_id']; ?>
                                                    <select class="form-control" name="agency_id[]" id="agency_id"
                                                        style="height: unset !important;">
                                                        <option value="">กรุณาเลือกหน่วยงานที่ทดสอบ</option>
                                                        <?php
                                                    $sql22 = "SELECT * FROM agency_tb";
                                                    $query22 = sqlsrv_query($conn, $sql22);
                                                    while ($result22 = sqlsrv_fetch_array($query22, SQLSRV_FETCH_ASSOC)) {
                                                        $agency2 =  $result22['agency_id'];
                                                        if ($agency == $agency2) {
                                                            $c = "selected";
                                                        } else {
                                                            $c = "";
                                                        }
                                                    ?>

                                                        <option value="<?php echo $result22['agency_id'];  ?>"
                                                            <?php echo $c; ?>><?php echo $result22['agency_name']; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>

                <div class="paste-new-forms1"></div>
                <!--  -->

                <!-- หลายฟอร์ม -->
                <div class="main-form2 mt-3 ">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card mt-8">
                                <div class="card-body">
                                    <div class="">
                                        <div class="form-group mb-2">
                                            <label for="">หน่วยงานที่ขอ</label>
                                            <a href="javascript:void(0)"
                                                class="add-more-form3 float-end btn btn-success">เพิ่ม</a>
                                            <?php
                                        $standarsidtb = $_REQUEST['standard_idtb'];
                                        $sql3 = "SELECT * FROM dimension_department WHERE standard_idtb  = '$standarsidtb' ";
                                        $query3 = sqlsrv_query($conn, $sql3);
                                        while ($result3 = sqlsrv_fetch_array($query3, SQLSRV_FETCH_ASSOC)) { ?>
                                            <?php $department =  $result3['department_id']; ?>
                                            <select class="form-control" name="department_id[]" id="department_id"
                                                style="height: unset !important;">
                                                <option value="">กรุณาเลือกหน่วยงานที่ขอ</option>
                                                <?php
                                                $sql33 = "SELECT * FROM department_tb";
                                                $query33 = sqlsrv_query($conn, $sql33);
                                                while ($result33 = sqlsrv_fetch_array($query33, SQLSRV_FETCH_ASSOC)) {
                                                    $department2 =  $result33['department_id'];
                                                    if ($department == $department2) {
                                                        $c = "selected";
                                                    } else {
                                                        $c = "";
                                                    }
                                                ?>

                                                <option value="<?php echo $result33['department_id'];  ?>"
                                                    <?php echo $c; ?>><?php echo $result33['department_name']; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="paste-new-forms2"></div>


            <!-- หลายฟอร์ม -->
            <div class="main-form3 mt-3 ">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mt-8">
                            <div class="card-body">
                                <div class="">
                                    <div class="form-group mb-2">
                                        <label for="">ประเภทผลิตภัณฑ์</label>
                                        <a href="javascript:void(0)"
                                            class="add-more-form4 float-end btn btn-success">เพิ่ม</a>
                                        <?php
                                        $standarsidtb = $_REQUEST['standard_idtb'];
                                        $sql4 = "SELECT * FROM dimension_type WHERE standard_idtb  = '$standarsidtb' ";
                                        $query4 = sqlsrv_query($conn, $sql4);
                                        while ($result4 = sqlsrv_fetch_array($query4, SQLSRV_FETCH_ASSOC)) { ?>
                                        <?php $type =  $result4['type_id']; ?>
                                        <select class="form-control" name="type_id[]" id="type_id"
                                            style="height: unset !important;">
                                            <option value="">กรุณาเลือกประเภทผลิตภัณฑ์</option>
                                            <?php
                                                $sql44 = "SELECT * FROM type_tb";
                                                $query44 = sqlsrv_query($conn, $sql44);
                                                while ($result44 = sqlsrv_fetch_array($query44, SQLSRV_FETCH_ASSOC)) {
                                                    $type2 =  $result44['type_id'];
                                                    if ($type == $type2) {
                                                        $c = "selected";
                                                    } else {
                                                        $c = "";
                                                    }
                                                ?>

                                            <option value="<?php echo $result44['type_id'];  ?>" <?php echo $c; ?>>
                                                <?php echo $result44['type_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="paste-new-forms2"></div>

        <center>
            <!--  -->
            <button type="submit" name="save_multiple_data" class="btn btn-primary mt-3">บันทึกข้อมูล</button>
        </center>
        </form>

        </div>
        </div>
        </div>
        </div>
        </div>
    </section>

</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
picker_date(document.getElementById("mydate"), {
    year_range: "-12:+10"
});
</script>