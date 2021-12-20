<!DOCTYPE html>
<html lang="en">
<?php include('./include/head.php');?>
<?php include('./connection/connection.php');?>
<body>
<?php include('./include/header.php'); ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Welcome to <span>BizLand</span></h1>
      <h2>We are team of talented designers making websites with Bootstrap</h2>
      <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

<?php include('./include/menu.php');?>
<section id="services" class="services">
      <div class="container" data-aos="fade-up">
<?php
    if (!isset($_GET['page']) && empty($_GET['page'])) {
        include('standard/status.php');
    } elseif (isset($_GET['page']) && $_GET['page'] == 'insert2') {
        include('standard/insert2.php');
    } elseif (isset($_GET['page']) && $_GET['page'] == 'status') {
        if (isset($_GET['function']) && $_GET['function'] == 'update') {
            include('standard/status_edit.php');
        } else {
            include('standard/status.php');
        }
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
    } elseif (isset($_GET['page']) && $_GET['page'] == 'add_insert_type') {
        include('standard/add_insert_type.php');
    } elseif (isset($_GET['page']) && $_GET['page'] == 'add_insert_group') {
        include('standard/add_insert_group.php');
    } elseif (isset($_GET['page']) && $_GET['page'] == 'add_insert_agency') {
        include('standard/add_insert_agency.php');
    }
    ?>

  </main><!-- End #main -->
 <?php include('./include/footer.php');?>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<?php include('./include/script.php');?>

</body>

</html>
<script src="extend\jquery-3.6.0.min.js"></script>

<script>
        function add_element(mom,baby){
                var cloning = $("#" + baby).clone(true);

                cloning.css("display","");

                $("#" + mom).append(cloning);
        }
</script>