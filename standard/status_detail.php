<?php
if (isset($_GET['standard_idtb']) && !empty($_GET['standard_idtb'])) {
    $standard_idtb = $_GET['standard_idtb'];
    $sql = "SELECT * FROM main_std WHERE standard_idtb = ? ";
    $params = array("$standard_idtb");
    $query = sqlsrv_query($conn, $sql, $params);
    $result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
}
?>
<section  class="about section-bg">
<form action="" method="post" enctype=multipart/form-data>
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
          <h2 class="font-mirt">เอกสารทั้งหมด</h2>
          <div align="right">
          <button type="submit" class="btn btn-danger">ย้อนกลับ</button>
            </div>
          <h3 class="font-mirt">หน้าเอกสารเลขที่ : <?php echo $result['standard_number'] ; ?></h3>
        </div>
            </div>

    </div>
        <div class="container  tab-content font">
            <div id="home" class="container-fluid tab-pane active m-2">
                
                <div class="mb-3">
                    <label class="form-label">วาระจากในที่ประชุมสมอ</label>
                    <p><?php echo $result['standard_meet'] ; ?></p>
                </div>

                <div class="mb-3">
                    <label class="form-label">เลขที่มอก</label>
                    <p><?php echo $result['standard_number'] ; ?></p>
                </div>

                <div class="mb-3">
                    <label class="form-label">ชื่อมาตรฐาน</label>
                    <p><?php echo $result['standard_detail'] ; ?></p>
                </div>

                <div class="mb-3">
                    <label class="form-label">มาตรฐานบังคับ</label>
                    <p><?php echo $result['standard_mandatory'] ; ?></p>
                </div>

                <div class="mb-3">
                    <label class="form-label">หมายเลข tacking</label>
                    <p><?php echo $result['standard_tacking'] ; ?></p>
                </div>

                <div class="mb-3">
                    <label class="form-label">หมายเหตุ</label>
                    <p><?php echo $result['standard_note'] ; ?></p>
                </div>
               
    </form>
    </div>
    </div>