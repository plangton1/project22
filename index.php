<!DOCTYPE html>
<html lang="en">
<?php include('./include/css.php'); ?>
<?php include('standard/date.php'); ?>
<?php include('./include/head.php'); ?>
<?php include('./connection/connection.php'); ?>

<body>
    <?php include('./include/header.php'); ?>

    <?php include('./include/sec.php'); ?>

    <main id="main">

        <section id="services " class="services font-mirt">
            <div class="container">
                <?php
                if (!isset($_GET['page']) && empty($_GET['page'])) {
                    include('dashboard/index.php');
                } elseif (isset($_GET['page']) && $_GET['page'] == 'insert2') {
                    include('standard/insert2.php');
                    // } elseif (isset($_GET['page']) && $_GET['page'] == 'update') {
                    //     include('standard/status_edit.php');
                } elseif (isset($_GET['page']) && $_GET['page'] == 'detail') {
                    if (isset($_GET['function']) && $_GET['function'] == 'update') {
                        include('standard/status_edit.php');
                    } elseif (isset($_GET['function']) && $_GET['function'] == 'print') {
                        include('standard/report_print.php');
                    } else {
                        include('standard/status_detail.php');
                    }
                } elseif (isset($_GET['page']) && $_GET['page'] == 'status') {
                    // if (isset($_GET['function']) && $_GET['function'] == 'detail') {
                    //     include('standard/status_detail.php');
                    // } else {
                    include('standard/status.php');
                    // }
                    // } elseif (isset($_GET['page']) && $_GET['page'] == 'update') {
                    //     include('standard/status_edit.php');
                } elseif (isset($_GET['page']) && $_GET['page'] == 'delete') {
                    include('standard/status_delete.php');
                } elseif (isset($_GET['page']) && $_GET['page'] == 'report') {
                    include('standard/report.php');
                } elseif (isset($_GET['page']) && $_GET['page'] == 'statusedit') {
                    include('standard/status_edit.php');
                } elseif (isset($_GET['page']) && $_GET['page'] == 'dash') {
                    include('dashboard/index.php');
                } elseif (isset($_GET['page']) && $_GET['page'] == 'add') {
                    include('standard/add.php');
                } elseif (isset($_GET['page']) && $_GET['page'] == 'add_type') {
                    if (isset($_GET['function']) && $_GET['function'] == 'update') {
                        include('standard/add_update_type.php');
                    }
                    if (isset($_GET['function']) && $_GET['function'] == 'delete') {
                        include('standard/add_delete_type.php');
                    } else {
                        include('standard/add_type.php');
                    }
                } elseif (isset($_GET['page']) && $_GET['page'] == 'add_group') {
                    if (isset($_GET['function']) && $_GET['function'] == 'update') {
                        include('standard/add_update_group.php');
                    }
                    if (isset($_GET['function']) && $_GET['function'] == 'delete') {
                        include('standard/add_delete_group.php');
                    } else {
                        include('standard/add_group.php');
                    }
                } elseif (isset($_GET['page']) && $_GET['page'] == 'add_agency') {
                    if (isset($_GET['function']) && $_GET['function'] == 'update') {
                        include('standard/add_update_agency.php');
                    }
                    if (isset($_GET['function']) && $_GET['function'] == 'delete') {
                        include('standard/add_delete_agency.php');
                    } else {
                        include('standard/add_agency.php');
                    }
                } elseif (isset($_GET['page']) && $_GET['page'] == 'add_department') {
                    if (isset($_GET['function']) && $_GET['function'] == 'update') {
                        include('standard/add_update_department.php');
                    }
                    if (isset($_GET['function']) && $_GET['function'] == 'delete') {
                        include('standard/add_delete_department.php');
                    } else {
                        include('standard/add_department.php');
                    }
                } elseif (isset($_GET['page']) && $_GET['page'] == 'add_insert_type') {
                    include('standard/add_insert_type.php');
                } elseif (isset($_GET['page']) && $_GET['page'] == 'add_insert_group') {
                    include('standard/add_insert_group.php');
                } elseif (isset($_GET['page']) && $_GET['page'] == 'add_insert_agency') {
                    include('standard/add_insert_agency.php');
                } elseif (isset($_GET['page']) && $_GET['page'] == 'add_insert_department') {
                    include('standard/add_insert_department.php');
                } elseif (isset($_GET['page']) && $_GET['page'] == 'contact') {
                    include('standard/contact.php');
                }
                ?>

    </main><!-- End #main -->
    <?php include('./include/footer.php'); ?>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <?php include('./include/script.php'); ?>

</body>

</html>
<script src="extend\jquery-3.6.0.min.js"></script>

<script>
    function add_element(mom, baby) {
        var cloning = $("#" + baby).clone(true);

        cloning.css("display", "");

        $("#" + mom).append(cloning);
    }
</script>