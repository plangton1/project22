<?php
require '../connection/connection.php';

$mode = $_REQUEST["mode"];
// echo '<pre>';
// print_r($_REQUEST);
// exit();

if ($mode == "insert_data") {
    $standard_meet = $_REQUEST["standard_meet"];
    $standard_number = $_REQUEST["standard_number"];
    $standard_detail = $_REQUEST["standard_detail"];
    $standard_mandatory = $_REQUEST["standard_mandatory"];
    $standard_tacking = $_REQUEST["standard_tacking"];
    $standard_note = $_REQUEST["standard_note"];
    //$file = $_REQUEST["file"];
    $group_id = $_REQUEST["group_id"];
    $agency_id = $_REQUEST["agency_id"];
    $type_id = $_REQUEST["type_id"];
    $department_id = $_REQUEST["department_id"];
    $standard_status = "4";
    if (!empty($standard_number)) {
        $sql_check = "SELECT * FROM main_std WHERE standard_number = '$standard_number'";
        $query_check = sqlsrv_query($conn, $sql_check);
        $row_check = sqlsrv_num_rows($query_check);
        if ($row_check > 0) {
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("standard_number ซ้ำ กรุณากรอกใหม่อีกครั้ง!!");';
            $alert .= 'window.location.href = "?page=status&function=insert2";';
            $alert .= '</script>';
            echo $alert;
            exit();
        }
        $sql = "INSERT INTO main_std ( standard_mandatory , standard_meet , standard_tacking , standard_number , standard_detail , standard_note , standard_status  ) 
      VALUES ('$standard_mandatory','$standard_meet','$standard_tacking','$standard_number','$standard_detail','$standard_note' , '$standard_status')";

        //$conn->query($sql);
        //sqlsrv_close($conn);

        $stmt = sqlsrv_query($conn, $sql);

        $sqlmaxid = "SELECT @@IDENTITY AS 'Maxid'";
        $querymax = sqlsrv_query($conn, $sqlmaxid);
        $resultMaxid = sqlsrv_fetch_array($querymax, SQLSRV_FETCH_ASSOC);

        $standard_idtb =  $resultMaxid['Maxid'];

        // if ($stmt == false) {
        //     die(print_r(sqlsrv_errors()));
        // } else {
        //     echo "บันทึกข้อมูลสำเร็จ";
        //     echo "<br>";

        // }

        //1

        $countgroup = count($group_id);

        //echo $test;


        for ($i = 0; $i < $countgroup; $i++) {
            $groupid =  $group_id[$i];

            //echo "<br>";
            if (trim($groupid) <> "") {

                $sql2 = "INSERT INTO dimension_group ( group_id , standard_idtb  ) 
            VALUES ('$groupid', '$standard_idtb')";

                $stmt2 = sqlsrv_query($conn, $sql2);
            }

            // if ($stmt2 == false) {
            //     die(print_r(sqlsrv_errors()));
            // } else {
            //     echo "บันทึกข้อมูลสำเร็จ1";
            // }


            //echo "<br>";
        }

        //2

        $countagency = count($agency_id);

        //echo $test;


        for ($i = 0; $i < $countagency; $i++) {
            $agencyid =  $agency_id[$i];

            //echo "<br>";

            if (trim($agencyid) <> "") {
                $sql3 = "INSERT INTO dimension_agency ( agency_id , standard_idtb  ) 
            VALUES ('$agencyid', '$standard_idtb')";

                $stmt3 = sqlsrv_query($conn, $sql3);
            }
            // if ($stmt3 == false) {
            //     die(print_r(sqlsrv_errors()));
            // } else {
            //     echo "บันทึกข้อมูลสำเร็จ2";
            // }


            //echo "<br>";
        }

        //3

        $counttype = count($type_id);

        //echo $test; สร้างตัวแปรต่อ ทำอีฟ


        for ($i = 0; $i < $counttype; $i++) {
            $typeid =  $type_id[$i];

            //echo "<br>";
            if (trim($typeid) <> "") {

                $sql3 = "INSERT INTO dimension_type ( type_id , standard_idtb  ) 
      VALUES ('$typeid', '$standard_idtb')";

                $stmt3 = sqlsrv_query($conn, $sql3);
            }
            // if ($stmt3 == false) {
            //     die(print_r(sqlsrv_errors()));
            // } else {
            //     echo "บันทึกข้อมูลสำเร็จ3";
            // }


            //echo "<br>";
        }

        $countboxdepartment = count($department_id);

        //echo $test;


        for ($i = 0; $i < $countboxdepartment; $i++) {
            $departmentid =  $department_id[$i];

            //echo "<br>";
            if (trim($departmentid) <> "") {

                $sql4 = "INSERT INTO dimension_department ( department_id , standard_idtb  ) 
      VALUES ('$departmentid', '$standard_idtb')";
                $stmt4 = sqlsrv_query($conn, $sql4);
            }
        }

        
	    // $file_id = $_REQUEST["file_id"];
        // $date = date("d-m-Y"); //กำหนดวันที่และเวลา
        // //เพิ่มไฟล์
        // $upload = $_FILES['fileupload'];
        // if ($upload <> '') {   //not select file
        //     //โฟลเดอร์ที่จะ upload file เข้าไป 
        //     $path = "./fileupload/";
            

        //     //เอาชื่อไฟล์ที่มีอักขระแปลกๆออก
        //     $remove_these = array(' ', '`', '"', '\'', '\\', '/', '_');
        //     $newname = str_replace($remove_these, '', $_FILES['fileupload']['name']);

        //     //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
        //     $newname = time() . '-' . $newname;
        //     $path_copy = $path . $newname;
        //     $path_link = "./fileupload/" . $newname;

        //     //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
        //     copy($_FILES['fileupload']['tmp_name'], $path_copy);
        // }
        // $sql5 = "INSERT INTO dimension_file (file_upload , standard_idtb) VALUES ('" . $newname . "' , '".$standard_idtb."')";

    if (sqlsrv_query($conn, $sql5)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("เพิ่มข้อมูลสถานะสำเร็จ !!");';
        $alert .= 'window.location.href = "../index.php?page=status";';
        $alert .= '</script>';
        echo $alert;
        exit();;
    } else {
        echo "Error: " . $sql5 . "<br>" . sqlsrv_errors($conn);
    }
    sqlsrv_close($conn);

}
    }