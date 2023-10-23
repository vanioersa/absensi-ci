<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<style>
  .container {
    margin-top: 20px;
  }

  .card {
    width: 60%;
    padding: 20px;
    border: none;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    background-color: #f5f5f5;
    text-align: center;
  }

  .card img {
    width: 130px;
    height: 130px;
    border-radius: 50%;
  }

  .btn-upload {
    background-color: #007BFF;
    color: #fff;
  }

  .btn-upload:hover {
    background-color: #0056b3;
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
            <a class="nav-link text-white" href="<?php echo base_url('karyawan/tambah_absensi') ?>">
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

    <div class="container">
      <div class="card text-center mx-auto">
        <h1 class="text-center"><b>Akun <?php echo $this->session->userdata('username'); ?></b></h1>
        <?php foreach ($user as $row) : ?>
          <form class="row" action="<?php echo base_url('karyawan/aksi_update_profile'); ?>" method="post" enctype="multipart/form-data">
            <div class="row d-flex">
              <input name="id" type="hidden" value="<?php echo $row->id ?>">
              <span class="border border-0 btn btn-link">
                <?php if (!empty($row->image)) : ?>
                  <img src="<?php echo  base_url('./image/karyawan/' . $row->image) ?>" height="150" width="150" class="rounded-circle">
                <?php else : ?>
                  <img class="rounded-circle " height="150" width="150" src="https://slabsoft.com/wp-content/uploads/2022/05/pp-wa-kosong-default.jpg" />
                <?php endif; ?>
              </span>
              <?php echo $this->session->flashdata('message'); ?>
              <?php echo $this->session->flashdata('sukses'); ?>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $row->email; ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $row->username; ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="nama_depan" class="form-label">Nama Depan</label>
                <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="<?php echo $row->nama_depan; ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="nama_belakang" class="form-label">Nama Belakang</label>
                <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="<?php echo $row->nama_belakang; ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="password_baru" class="form-label">Password Baru</label>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" id="password_baru" name="password_baru">
                  <button class="btn btn-outline-secondary" type="button" id="togglePasswordBaru">Show</button>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="konfirmasi_password" class="form-label">Konfirmasi Password Baru</label>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password">
                  <button class="btn btn-outline-secondary" type="button" id="toggleKonfirmasiPassword">Show</button>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
              </div>
            </div>
            <div class="col-md-12">
              <button type="button" class="btn btn-primary w-25" id="ubahButton">Ubah</button>
            </div>
          </form>
        <?php endforeach; ?>
      </div>
    </div>
  </div>


  <script>
    // Function to toggle password visibility
    function togglePasswordVisibility(inputId, buttonId) {
      const passwordInput = document.getElementById(inputId);
      const toggleButton = document.getElementById(buttonId);

      toggleButton.addEventListener('click', () => {
        if (passwordInput.type === 'password') {
          passwordInput.type = 'text';
          toggleButton.textContent = 'Hide';
        } else {
          passwordInput.type = 'password';
          toggleButton.textContent = 'Show';
        }
      });
    }

    // Toggle password visibility for "Password Baru"
    togglePasswordVisibility('password_baru', 'togglePasswordBaru');

    // Toggle password visibility for "Konfirmasi Password Baru"
    togglePasswordVisibility('konfirmasi_password', 'toggleKonfirmasiPassword');
  </script>
  <script>
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    });

    document.getElementById('ubahButton').addEventListener('click', function() {
      swalWithBootstrapButtons.fire({
        title: 'Ubah Data?',
        text: 'Apakah Anda yakin ingin mengubah data ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, ubah!',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          // Submit the form for data update
          document.querySelector('form').submit();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          swalWithBootstrapButtons.fire(
            'Dibatalkan',
            'Data Anda tidak diubah.',
            'error'
          );
        }
      });
    });
  </script>

  <!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  --======== CSS ========
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  --===== Iconscout CSS =====
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />


  Script
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <title>Profile</title>
</head> -->
  <!-- <style>
  /* ===== Google Font Import - Poppins ===== */
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  :root {
    /* ===== Colors ===== */
    --primary-color: #0E4BF1;
    --panel-color: #FFF;
    --text-color: #000;
    --black-light-color: #707070;
    --border-color: #e6e5e5;
    --toggle-color: #DDD;
    --box1-color: #4DA3FF;
    --box2-color: #FFE6AC;
    --box3-color: #E7D1FC;
    --title-icon-color: #fff;

    /* ====== Transition ====== */
    --tran-05: all 0.5s ease;
    --tran-03: all 0.3s ease;
    --tran-03: all 0.2s ease;
  }

  body {
    min-height: 100vh;
    background-color: var(--primary-color);
  }

  body.dark {
    --primary-color: #3A3B3C;
    --panel-color: #242526;
    --text-color: #CCC;
    --black-light-color: #CCC;
    --border-color: #4D4C4C;
    --toggle-color: #FFF;
    --box1-color: #3A3B3C;
    --box2-color: #3A3B3C;
    --box3-color: #3A3B3C;
    --title-icon-color: #CCC;
  }

  /* === Custom Scroll Bar CSS === */
  ::-webkit-scrollbar {
    width: 8px;
  }

  ::-webkit-scrollbar-track {
    background: #f1f1f1;
  }

  ::-webkit-scrollbar-thumb {
    background: var(--primary-color);
    border-radius: 12px;
    transition: all 0.3s ease;
  }

  ::-webkit-scrollbar-thumb:hover {
    background: #0b3cc1;
  }

  body.dark::-webkit-scrollbar-thumb:hover,
  body.dark .activity-data::-webkit-scrollbar-thumb:hover {
    background: #3A3B3C;
  }

  nav {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 250px;
    padding: 10px 14px;
    background-color: var(--panel-color);
    border-right: 1px solid var(--border-color);
    transition: var(--tran-05);
  }

  nav.close {
    width: 73px;
  }

  nav .logo-name {
    display: flex;
    align-items: center;
  }

  nav .logo-image {
    display: flex;
    justify-content: center;
    min-width: 45px;
  }

  nav .logo-image img {
    width: 40px;
    object-fit: cover;
    border-radius: 50%;
  }

  nav .logo-name .logo_name {
    font-size: 22px;
    font-weight: 600;
    color: var(--text-color);
    margin-left: 14px;
    transition: var(--tran-05);
  }

  nav.close .logo_name {
    opacity: 0;
    pointer-events: none;
  }

  nav .menu-items {
    margin-top: 40px;
    height: calc(100% - 90px);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .menu-items li {
    list-style: none;
  }

  .menu-items li a {
    display: flex;
    align-items: center;
    height: 50px;
    text-decoration: none;
    position: relative;
  }

  .nav-links li a:hover:before {
    content: "";
    position: absolute;
    left: -7px;
    height: 5px;
    width: 5px;
    border-radius: 50%;
    background-color: var(--primary-color);
  }

  body.dark li a:hover:before {
    background-color: var(--text-color);
  }

  .menu-items li a i {
    font-size: 24px;
    min-width: 45px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--black-light-color);
  }

  .menu-items li a .link-name {
    font-size: 18px;
    font-weight: 400;
    color: var(--black-light-color);
    transition: var(--tran-05);
  }

  nav.close li a .link-name {
    opacity: 0;
    pointer-events: none;
  }

  .nav-links li a:hover i,
  .nav-links li a:hover .link-name {
    color: var(--primary-color);
  }

  body.dark .nav-links li a:hover i,
  body.dark .nav-links li a:hover .link-name {
    color: var(--text-color);
  }

  .menu-items .logout-mode {
    padding-top: 10px;
    border-top: 1px solid var(--border-color);
  }

  .menu-items .mode {
    display: flex;
    align-items: center;
    white-space: nowrap;
  }

  .menu-items .mode-toggle {
    position: absolute;
    right: 14px;
    height: 50px;
    min-width: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
  }

  .mode-toggle .switch {
    position: relative;
    display: inline-block;
    height: 22px;
    width: 40px;
    border-radius: 25px;
    background-color: var(--toggle-color);
  }

  .switch:before {
    content: "";
    position: absolute;
    left: 5px;
    top: 50%;
    transform: translateY(-50%);
    height: 15px;
    width: 15px;
    background-color: var(--panel-color);
    border-radius: 50%;
    transition: var(--tran-03);
  }

  body.dark .switch:before {
    left: 40px;
  }

  .dashboard {
    position: relative;
    left: 250px;
    background-color: var(--panel-color);
    min-height: 100vh;
    width: calc(100% - 250px);
    padding: 10px 14px;
    transition: var(--tran-05);
  }

  nav.close~.dashboard {
    left: 73px;
    width: calc(100% - 73px);
  }

  .dashboard .top {
    position: fixed;
    top: 0;
    left: 250px;
    display: flex;
    width: calc(100% - 250px);
    justify-content: space-between;
    align-items: center;
    padding: 10px 14px;
    background-color: var(--panel-color);
    transition: var(--tran-05);
    z-index: 10;
  }

  nav.close~.dashboard .top {
    left: 73px;
    width: calc(100% - 73px);
  }

  .dashboard .top .sidebar-toggle {
    font-size: 26px;
    color: var(--text-color);
    cursor: pointer;
  }

  .dashboard .top .search-box {
    position: relative;
    height: 45px;
    max-width: 600px;
    width: 100%;
    margin: 0 30px;
  }



  .top img {
    width: 40px;
    border-radius: 50%;
  }

  .dashboard .dash-content {
    padding-top: 50px;
  }

  .dash-content .title {
    display: flex;
    align-items: center;
    margin: 60px 0 30px 0;
  }

  .dash-content .title i {
    position: relative;
    height: 35px;
    width: 35px;
    background-color: var(--primary-color);
    border-radius: 6px;
    color: var(--title-icon-color);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
  }

  .dash-content .title .text {
    font-size: 24px;
    font-weight: 500;
    color: dark;
    margin-left: 10px;
  }

  .dash-content .boxes {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
  }

  .dash-content .boxes .box {
    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius: 12px;
    width: calc(100% / 3 - 15px);
    padding: 15px 20px;
    background-color: var(--box1-color);
    transition: var(--tran-05);
  }

  .boxes .box i {
    font-size: 35px;
    color: var(--text-color);
  }

  .boxes .box .text {
    white-space: nowrap;
    font-size: 18px;
    font-weight: 500;
    color: var(--text-color);
  }

  .boxes .box .number {
    font-size: 40px;
    font-weight: 500;
    color: var(--text-color);
  }

  .boxes .box.box2 {
    background-color: var(--box2-color);
  }

  .boxes .box.box3 {
    background-color: var(--box3-color);
  }

  .dash-content .activity .activity-data {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
  }

  .activity .activity-data {
    display: flex;
  }

  .activity-data .data {
    display: flex;
    flex-direction: column;
    margin: 0 15px;
  }

  .activity-data .data-title {
    font-size: 20px;
    font-weight: 500;
    color: var(--text-color);
  }

  .activity-data .data .data-list {
    font-size: 18px;
    font-weight: 400;
    margin-top: 20px;
    white-space: nowrap;
    color: var(--text-color);
  }

  @media (max-width: 1000px) {
    nav {
      width: 73px;
    }

    nav.close {
      width: 250px;
    }

    nav .logo_name {
      opacity: 0;
      pointer-events: none;
    }

    nav.close .logo_name {
      opacity: 1;
      pointer-events: auto;
    }

    nav li a .link-name {
      opacity: 0;
      pointer-events: none;
    }

    nav.close li a .link-name {
      opacity: 1;
      pointer-events: auto;
    }

    nav~.dashboard {
      left: 73px;
      width: calc(100% - 73px);
    }

    nav.close~.dashboard {
      left: 250px;
      width: calc(100% - 250px);
    }

    nav~.dashboard .top {
      left: 73px;
      width: calc(100% - 73px);
    }

    nav.close~.dashboard .top {
      left: 250px;
      width: calc(100% - 250px);
    }

    .activity .activity-data {
      overflow-X: scroll;
    }
  }

  @media (max-width: 780px) {
    .dash-content .boxes .box {
      width: calc(100% / 2 - 15px);
      margin-top: 15px;
    }
  }

  @media (max-width: 560px) {
    .dash-content .boxes .box {
      width: 100%;
    }
  }

  @media (max-width: 400px) {
    nav {
      width: 0px;
    }

    nav.close {
      width: 73px;
    }

    nav .logo_name {
      opacity: 0;
      pointer-events: none;
    }

    nav.close .logo_name {
      opacity: 0;
      pointer-events: none;
    }

    nav li a .link-name {
      opacity: 0;
      pointer-events: none;
    }

    nav.close li a .link-name {
      opacity: 0;
      pointer-events: none;
    }

    nav~.dashboard {
      left: 0;

      width: 100%;
    }

    nav.close~.dashboard {
      left: 73px;
      width: calc(100% - 73px);
    }

    nav~.dashboard .top {
      left: 0;
      width: 100%;
    }

    nav.close~.dashboard .top {
      left: 0;
      width: 100%;
    }
  }
</style> -->

  <!-- <body>
  <nav>
    <div class="logo-name">
      <div class="logo-image">
        <img src="https://tse1.mm.bing.net/th?id=OIP.xKEbKVRjeWNbWnFmFDiGxgHaHa&pid=Api&P=0&h=180" alt="">
      </div>

      <a>Karyawan</a>
    </div>

    <div class="menu-items">
      <ul class="nav-links" style="padding-left:16px;">
        <li><a href="<?php echo base_url('karyawan/dashboard') ?>">
            <i class="fa-solid fa-house"></i>
            <span class="link-name">Dashboard</span>
          </a></li>

        <li><a href="<?php echo base_url('karyawan/history') ?>">
            <i class="fa-solid fa-clock-rotate-left"></i>

            <span class="link-name">History Absensi</span>
          </a></li>
        <li><a href="<?php echo base_url('karyawan/absensi') ?>">
            <i class="fa-regular fa-calendar-days"></i>
            <span class="link-name">Absensi</span>
          </a></li>
        <li><a href="<?php echo base_url('karyawan/izin') ?>">
            <i class="fa-solid fa-i"></i>
            <span class="link-name">Izin</span>
          </a></li>

        <li><a href="<?php echo base_url('karyawan/akun') ?>">
            <i class="fa-solid fa-circle-user"></i>
            <span class="link-name">Edit Profil</span>
          </a></li>


        <br>
        <li class="mode">
          <div class="mode-toggle">
            <span class="switch"></span>
          </div>
        </li>

        <li class="logout-mode  ">
        <li><a class="btn btn-lg   " onclick=" logout(id)">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span class="link-name">Keluar</span>
          </a>

        </li>
        <li>

          <span id="clock" name="date" class="text-white link-name"> </span>

        </li>
        <li>
          <span id="clock2" name="date2" class="text-dark link-name"> </span>
        </li>




    </div>


  </nav>

  <section class="dashboard">
    <div class="top">
      <i class="uil uil-bars sidebar-toggle"></i>


    </div>

    <div class="dash-content mx-auto">
      <div class="overview shadow-lg p-1 mb-3 bg-body rounded">
        <div class="title ">

          <span class="text ">Profile Account</span>

        </div>

        <div class="container">
          <div class="row">
            <div class="col">
              <div class="overflow-auto" style="white-space: nowrap;">
                <?php $no = 0;
                foreach ($user as $row) : $no++; ?>
                  <div class="w-100 m-auto p-3">
                    <br>
                    <div><?php echo $this->session->flashdata('message'); ?></div>
                    <div><?php echo $this->session->flashdata('sukses'); ?></div>
                    <div class="row d-flex">
                      <input name="id" type="hidden" value="<?php echo $row->id ?>">


                      <span class="border border-0 btn btn-link">
                        <?php if (!empty($row->image)) : ?>
                          <img src="<?php echo  base_url('./image/' . $row->image) ?>" height="150" width="150" class="rounded-circle">

                        <?php else : ?>
                          <img class="rounded-circle " height="150" width="150" src="https://slabsoft.com/wp-content/uploads/2022/05/pp-wa-kosong-default.jpg" />
                        <?php endif; ?>
                      </span>
                      <br>
                      <br>
                      <form method="post" action="<?php echo base_url('karyawan/aksi_update_profile'); ?>" enctype="multipart/form-data">
                        <input name="id" type="hidden" value="<?php echo $row->id; ?>">
                        <div class="d-flex flex-row ">
                          <div class="p-2 col-6">
                            <label for="" class="form-label fs-5">Nama
                              <br>
                              Depan </label>
                            <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama Depan" value="<?php echo $row->nama_depan; ?>">
                            <label for="" class="form-label fs-5">Username </label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $row->username; ?>">
                          </div>
                          <br>
                          <div class="p-2 col-6">
                            <label for="" class="form-label fs-5">Nama
                              <br>
                              Belakang </label>
                            <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama Belakang" value="<?php echo $row->nama_belakang; ?>">



                          </div>
                        </div>
                        <input type="file" name="foto" class="p-3">
                    </div>
                  </div>
                <?php endforeach; ?>



                <div class="d-flex p-2 row justify-content-evenly ">
                  <button type="submit" class="btn btn-sm btn-dark col-5" name=" submit">Ubah
                    Profile</button>

                  <a class="btn btn-danger col-5" href="<?php echo base_url('karyawan/hapus_image'); ?>">
                    Hapus
                    Foto</a>
                </div>

                <br>

                </form>






              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="overview shadow-lg p-1 mb-3 bg-body rounded">


        <div class="title ">
          <span class="text ">Password</span>

        </div>
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="overflow-auto" style="white-space: nowrap;">
                <form action="<?php echo base_url('karyawan/aksi_ubah_password'); ?>" enctype="multipart/form-data" method="post">
                  <div class="overview shadow-lg p-1 mb-3 bg-body rounded">
                    <div class="d-flex form-outline flex-fill mb-0  ">
                      <input type="password" name="password_baru" id="password1" class="form-control relaltive" placeholder="Password Baru">

                      <i id="showPassword1" onclick="togglePasswordVisibility('password1')" class="far fa-eye absolute p-2"></i>





                      <input type="password" name="konfirmasi_password" id="password2" class="form-control relative" placeholder="Konfirmasi Password">
                      <i id="showPassword2" onclick="togglePasswordVisibility('password2')" class="far fa-eye absolute p-2"></i>



                    </div>
                  </div>

                  <p>*Password harus memiliki 8 angka</p>

                  <div class="d-flex p-2 row justify-content-evenly ">
                    <button type="submit" class="btn btn-sm btn-dark col-5" name=" submit">Ubah
                      Password</button>


                  </div>

                  <br>

                </form>



              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <script>
    // show password

    function togglePasswordVisibility(inputId) {
      const passwordInput = document.getElementById(inputId);
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
      } else {
        passwordInput.type = "password";
      }
    }
    // jam
    function updateClock() {
      var now = new Date();
      var clock = document.getElementById('clock');
      clock.innerHTML = now.toLocaleTimeString();
    }

    // Memperbarui jam setiap detik
    setInterval(updateClock, 1000);

    function updateClock2() {
      var now = new Date();
      var clock = document.getElementById('clock2');
      clock.innerHTML = now.toLocaleTimeString();
    }

    // Memperbarui jam setiap detik
    setInterval(updateClock2, 1000);
  </script>
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  <script src="script.js"></script>
  <script>
    const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle");
    sidebar = body.querySelector("nav");
    sidebarToggle = body.querySelector(".sidebar-toggle");

    let getMode = localStorage.getItem("mode");
    if (getMode && getMode === "dark") {
      body.classList.toggle("dark");
    }

    let getStatus = localStorage.getItem("status");
    if (getStatus && getStatus === "close") {
      sidebar.classList.toggle("close");
    }

    modeToggle.addEventListener("click", () => {
      body.classList.toggle("dark");
      if (body.classList.contains("dark")) {
        localStorage.setItem("mode", "dark");
      } else {
        localStorage.setItem("mode", "light");
      }
    });
    sidebarToggle.addEventListener("click", () => {
      sidebar.classList.toggle("close");
      if (sidebar.classList.contains("close")) {
        localStorage.setItem("status", "close");
      } else {
        localStorage.setItem("status", "open");
      }
    })
  </script>
</body>
<script>
  function logout(id) {
    swal.fire({
      title: ' Yakin Ingin Log Out',
      text: "",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Batal',
      confirmButtonText: 'Log Out'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          icon: 'success',
          title: 'Log Out',
          showConfirmButton: false,
          timer: 1500,

        }).then(function() {
          window.location.href = "<?php echo base_url('auth/logout/') ?>" + id;
        });
      }
    });
  }
</script>

</html> -->
</body>

</html>