<?php
session_start();
//koneksi database
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEM PAKAR</title>

    <!-- bootstrao css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- datatables css -->
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <!-- font awesome css -->
    <link rel="stylesheet" href="assets/css/all.css">
    <!-- chosen css -->
    <link rel="stylesheet" href="assets/css/bootstrap-chosen.css">
</head>
<body>
 
<!-- navbar -->

<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">HOME</a>
    </li>

    <!-- setting hak akses -->
    <?php   
    if($_SESSION['role']=="Dokter"){

 ?>
    <li class="nav-item active">
      <a class="nav-link" href="?page=users">USER</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="?page=aturan">BASIS ATURAN</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="?page=konsultasiadm">KONSULTASI</a>
    </li>

    <?php
        }elseif($_SESSION['role']=="Admin"){
    ?>

    <li class="nav-item active">
      <a class="nav-link" href="?page=gejala">GEJALA</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="?page=penyakit">PENYAKIT</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="?page=aturan">BASIS ATURAN</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="?page=konsultasiadm">KONSULTASI</a>
    </li>

    <?php
        }else{
    ?>

    <li class="nav-item active">
      <a class="nav-link" href="?page=konsultasi">KONSULTASI</a>
    </li>
    
    <?php
        }
    ?>
    <li class="nav-item active">
      <a class="nav-link" href="?page=logout">LOGOUT</a>
    </li>
  </ul>
</nav>

<!-- Cek status login -->
<?php   
    if($_SESSION['status']!="y"){
        header("location:login.php");
    }
 ?>
<!-- container -->
<div class="container mt-3">
    <!-- setting menu -->
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : "";
    $action = isset($_GET['action']) ? $_GET['action'] : "";

    if ($page==""){
        include "welcome.php";
    }elseif ($page=="gejala"){
        if ($action==""){
            include "tampil_gejala.php";
        }elseif ($action=="tambah"){
            include "tambah_gejala.php";
        }elseif ($action=="update"){
            include "update_gejala.php";
        }else{
            include "hapus_gejala.php";
        }
    }elseif ($page=="penyakit"){
        if ($action==""){
            include "tampil_penyakit.php";
        }elseif ($action=="tambah"){
            include "tambah_penyakit.php";
        }elseif ($action=="update"){
            include "update_penyakit.php";
        }else{
            include "hapus_penyakit.php";
        }
    }elseif ($page=="aturan"){
        if ($action==""){
            include "tampil_aturan.php";
        }elseif ($action=="tambah"){
            include "tambah_aturan.php";
        }elseif ($action=="detail"){
            include "detail_aturan.php";
        }elseif ($action=="update"){
            include "update_aturan.php";
        }else{
            include "hapus_penyakit.php";
        }
    }elseif ($page=="konsultasi"){
        if ($action==""){
            include "tampil_konsultasi.php";
        }else{
            include "hasil_konsultasi.php";
        }
    }elseif ($page=="konsultasiadm"){
        if ($action==""){
            include "tampil_konsultasiadm.php";
        }else{
            include "detail_konsultasiadm.php";
        }
    }elseif ($page=="users"){
        if ($action==""){
            include "tampil_users.php";
        }elseif ($action=="tambah"){
            include "tambah_users.php";
        }else{
            include "hapus_users.php";
        }
    }else{
        include "logout.php";
    }
    ?>
</div>

<!-- jquery -->
<script src="assets/js/jquery-3.7.0.min.js"></script>
<!-- bootstrap js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- datatables js -->
<script src="assets/js/datatables.min.js"></script>
<script>
        $(document).ready(function() {
                $('#myTable').DataTable();
        } );
    </script>

<!-- font Awesome js -->
<script src="assets/js/all.js"></script>
<!-- chosen js -->
<script src="assets/js/chosen.jquery.min.js"></script>
<script>
        $(function(){
            $('.chosen').chosen();
        });
</script>
</body>
</html>