<?php 
date_default_timezone_set("Asia/Bangkok");
$date_today = (date('d/m/Y H:i:s'));
?>
<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';
if (isset($_POST) && !empty($_POST)) {
    $standard_idtb = $_POST['standard_idtb'];
    $standard_number = $_POST['standard_number'];
    $standard_meet = $_POST['standard_meet'];
    $standard_detail = $_POST['standard_detail'];
    $standard_mandatory = $_POST['standard_mandatory'];
    $standard_tacking = $_POST['standard_tacking'];
    $standard_note = $_POST['standard_note'];
    $standard_status = $_POST['standard_status'];
    $standard_day = $_POST['standard_day'] ;

}
$sql = ("SELECT * ,a.standard_idtb,a.standard_status,b.statuss_name AS name_status FROM main_std a INNER JOIN select_status b ON a.standard_status = b.id_statuss ");
$query = sqlsrv_query($conn, $sql);

$sql2 = "SELECT * FROM select_status";
$query2 = sqlsrv_query($conn , $sql2);
?>
<section>
    <div class="section-title">
        <h2 class="font-mirt">เอกสารทั้งหมด</h2>
        <h3 class="font-mirt">หน้าเอกสารทั้งหมด</h3>
    </div>
    </div>
    <div class="tab-content font">
        <div id="home" class="container-fluid tab-pane active m-2">
            <div align="right">
                <a href="?page=insert2" class="btn bt mg-t-bt b-add text-white mg-r" style="background:#4CAF50;">
                    <h5 class="font-mirt">เพิ่มเอกสาร</h5>
                </a>
            </div>
            <hr>
            <form method="post" action="">
                <table class="table table-hover table-responsive-xl table-striped text-center pt-5"
                    style="background-color: white;" id="tableall">
                    <thead>
                        <tr>
                            <th class="col-1">ลำดับที่</th>
                            <th class="col-2">วาระจากในที่ประชุมสมอ.</th>
                            <th class="col-1">เลขที่มอก.</th>
                            <th class="col-1">ชื่อมาตรฐาน</th>
                            <th class="col-2">วันที่แต่งตั้ง</th>
                            <!-- <th class="col-1">เลขที่เอกสาร</th> -->
                            <th class="col-2">สถานะ</th>
                            <th class="col-3">เมนูจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php while ($data = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) : ?>
                        <tr class="text-center">
                            <td class="align-middle"><?= $i++ ?></td>
                            <td class="align-middle"><?= $data['standard_meet'] ?></td>
                            <td class="align-middle"><?= $data['standard_number'] ?></td>
                            <td class="align-middle"><?= $data['standard_mandatory'] ?></td>
                            <?php if($data['standard_day'] == '') : ?>
                            <td class="align-middle" >ยังไม่ได้ระบุสถานะ</td>
                            <?php endif ; ?>
                            <?php if($data['standard_day']) : ?>
                            <td class="align-middle" ><?= $data['standard_day'] ?></td>
                            <?php endif ; ?>
                            <?php if($data['id_statuss'] == 1 ) : ?>
                            <td class="align-middle " style="background-color: #daf7a6"><?= $data['name_status'] ?></td>
                            <?php endif ; ?>
                            <?php if($data['id_statuss'] == 2 ) : ?>
                            <td class="align-middle  text-white" style="background-color: #5F9EA0">
                                <?= $data['name_status'] ?></td>
                            <?php endif ; ?>
                            <?php if($data['id_statuss'] == 3 ) : ?>
                            <td class="align-middle bg-secondary text-white"><?= $data['name_status'] ?></td>
                            <?php endif ; ?>
                            <?php if($data['id_statuss'] == 4 ) : ?>
                            <td class="align-middle text-white" style="background-color : #FF7F50 ;">
                                <?= $data['name_status'] ?></td>
                            <?php endif ; ?>
                            <?php if($data['id_statuss'] == ''  ) : ?>
                            <td class="align-middle text-white" style="background-color : #FF7F50 ;">
                                <?= $data['name_status'] ?></td>
                            <?php endif ; ?>
                            <td class="align-middle">
                                <div class="mb-3">
                                    <h5>
                                        <!--กดรายงานสถานะแล้วไปหน้าไหนต่อ แล้วในหน้านั้นเป็นประมาณไหน จะได้สร้างถูก -->
                                        <!-- <a href="?page=<?= $_GET['page'] ?>&function=update&standard_idtb=<?= $data['standard_idtb'] ?>" class="btn btn-sm btn-warning">แก้ไขข้อมูลสถานะ</a> -->
                                        <a href="?page=detail&standard_idtb=<?= $data['standard_idtb'] ?>"
                                            class="btn btn-sm font-mirt" style="background-color:#31f9cb;">ดูรายละเอียด</a>
                                        <!-- <a href="?page=<?= $_GET['page'] ?>&function=reportprint&standard_idtb=<?= $data['standard_idtb'] ?>" onclick="return confirm('คุณต้องการพิมพ์เอกสารนี้ : <?= $data['standard_number'] ?> หรือไม่ ??')" class="btn btn-sm btn-info">พิมพ์รายงาน</a> -->
                                        <!-- <a href="?page=<?= $_GET['page'] ?>&function=delete&standard_idtb=<?= $data['standard_idtb'] ?>" onclick="return confirm('คุณต้องการลบเอกสารนี้ : <?= $data['standard_number'] ?> หรือไม่ ??')" class="btn btn-sm btn-danger">ลบเอกสาร</a> -->


                                    </h5>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>

                    </tbody>
                </table>
            </form>

        </div>
    </div>



</section>

  