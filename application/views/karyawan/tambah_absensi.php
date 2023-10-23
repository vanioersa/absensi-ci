<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<style>
    .card {
        background-color: #fff;
        border-radius: 10px;
        border: none;
        position: relative;
        margin-bottom: 30px;
        box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
    }

    .l-bg-cherry {
        background: linear-gradient(to right, #493240, #f09) !important;
        color: #fff;
    }

    .l-bg-blue-dark {
        background: linear-gradient(to right, #373b44, #4286f4) !important;
        color: #fff;
    }

    .l-bg-green-dark {
        background: linear-gradient(to right, #0a504a, #38ef7d) !important;
        color: #fff;
    }

    .l-bg-orange-dark {
        background: linear-gradient(to right, #a86008, #ffba56) !important;
        color: #fff;
    }

    .card .card-statistic-3 .card-icon-large .fas,
    .card .card-statistic-3 .card-icon-large .far,
    .card .card-statistic-3 .card-icon-large .fab,
    .card .card-statistic-3 .card-icon-large .fal {
        font-size: 110px;
    }

    .card .card-statistic-3 .card-icon {
        text-align: center;
        line-height: 50px;
        margin-left: 15px;
        color: #000;
        position: absolute;
        right: -5px;
        top: 20px;
        opacity: 0.1;
    }

    .l-bg-cyan {
        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
        color: #fff;
    }

    .l-bg-green {
        background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
        color: #fff;
    }

    .l-bg-orange {
        background: linear-gradient(to right, #f9900e, #ffba56) !important;
        color: #fff;
    }

    .l-bg-cyan {
        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
        color: #fff;
    }

    .table {
        width: 90%;
        margin-top: 50px;
        margin-left: 4%;
        margin-right: 9%;
        text-align: center;
        border-radius: 5%;
    }
</style>

<body style="overflow: hidden;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url('home'); ?>">
                            <i class="fa-solid fa-house-user"></i> <span class="ms-2">Home</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <p class="nav-link text-white">
                            <?php date_default_timezone_set("Asia/Jakarta"); ?>
                            <script type="text/javascript">
                                function date_time(id) {
                                    date = new Date;
                                    year = date.getFullYear();
                                    month = date.getMonth();
                                    months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                    d = date.getDate();
                                    day = date.getDay();
                                    days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                    h = date.getHours();
                                    if (h < 10) {
                                        h = "0" + h;
                                    }
                                    m = date.getMinutes();
                                    if (m < 10) {
                                        m = "0" + m;
                                    }
                                    s = date.getSeconds();
                                    if (s < 10) {
                                        s = "0" + s;
                                    }
                                    result = '' + days[day] + ' ' + d + ' ' + months[month] + ' ' + year + ' ' + h + ':' + m + ':' + s;
                                    document.getElementById(id).innerHTML = result;
                                    setTimeout(function() {
                                        date_time(id);
                                    }, 1000);
                                    return true;
                                }
                            </script>
                            <span id="date_time"></span>
                            <script type="text/javascript">
                                window.onload = function() {
                                    date_time('date_time');
                                }
                            </script>
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="d-flex">
        <div class="col-12 bg-success" style="width: 15%;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <!-- <img src="https://cdn.pixabay.com/photo/2017/07/25/11/59/logo-2537871_1280.png" style="height: 50px; width: 60px; margin-bottom: 10px; margin-top: 5px;"> -->
                <h4>
                    <span class="fs-5 d-none d-sm-inline">Karyawan</span>
                </h4>
                <ul class="nav flex-column mb-0" id="menu">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo base_url('karyawan') ?>">
                            <i class="fa-solid fa-house-chimney"></i> <span class="ms-2">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo base_url('karyawan/absen') ?>">
                            <i class="fa-solid fa-users"></i> <span class="ms-2">Absen</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo base_url('karyawan/profile') ?>">
                            <i class="fa-solid fa-user"></i> <span class="ms-2">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo base_url('karyawan/history') ?>">
                            <i class="fa-solid fa-history"></i> <span class="ms-2">History</span>
                        </a>
                    </li>
                    <li class="nav-item" style="margin-top: 100%;">
                        <hr style="height: 5px; width: 100%; background-color: white;">
                        <a class="nav-link text-white" href="<?php echo base_url('auth/logout') ?>">
                            <i class="fa-solid fa-sign-out"></i> <span class="ms-2">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div style="background-color: rgb(42, 145, 0);" class='card w-50 m-auto p-5 text-center'>
            <h3 class='text-center'><b>Absensi Karyawan</b></h3>
            <form action="<?php echo base_url('karyawan/aksi_tambah_absen') ?>" method="post" enctype="multipart/from-data">
                <div class="row">
                    <!-- <div class="mb-3 col-6">
                        <label for="nama_siswa" class="form-label"><b>Username</b></label>
                        <select name="username" class="form-select">
                            <option selected>Pilih Username</option>
                            <?php foreach ($absensi as $data) : ?>
                                <option value="<?php echo $data->id_karyawan ?>">
                                <?php echo $data->username ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div> -->
                    <div class="mb-3 col-6">
                        <label for="kegiatan" class="form-label"><b>Kegiatan</b></label>
                        <input type="kegiatan" class="form-control" id="kegiatan" name="kegiatan">
                    </div>

                    <input type="hidden" class="form-control" id="date" name="date" value="<?php echo date("Y-m-d"); ?>">

                    <?php foreach ($absensi as $id) : ?> <input type="hidden" class="form-control" id="username" name="username" value="<?php echo $id->id_karyawan ?>"><?php endforeach; ?>

                    <input type="hidden" class="form-control" id="jam_masuk" name="jam_masuk" value="08:00:00">

                    <input type="hidden" class="form-control" id="jam_pulang" name="jam_pulang" value="-">

                    <input type="hidden" class="form-control" id="keterangan" name="keterangan" value="default">

                    <input type="hidden" class="form-control" id="status" name="status" value="not">
                </div>
                <button type="submit" class="btn btn-primary w-100" name="submit">Tambah</button>
            </form>
        </div>
    </div>
    <script>
        <?php
        date_default_timezone_set('Asia/Jakarta');
        echo date('Y-m-d');
        ?>
    </script>
</body>

</html>