<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body style="overflow: hidden;background-image: url('https://media.istockphoto.com/id/1337977426/photo/dark-gray-and-black-grunge-cement-wall-studio-room-space-product-background-template.webp?b=1&s=170667a&w=0&k=20&c=4dVCV5KtJKEhuQtp5dbnFmwMBAzNknz35VUIa0C3KoE='); background-size: cover;">
  <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <!-- <a class="navbar-brand" href="#">Navbar</a> -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="padding: 2px;">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo base_url('home'); ?>">
              <font color="white"><i class="fa-solid fa-house-user"></i> Home</font>
            </a>
          </li>
          <li class="nav-item" style="margin-left: 500px; padding-top: 5px;">
            <a>
            <font color="white">Tanggal: <?php date_default_timezone_set("Asia/Jakarta"); ?>
                <script type="text/javascript">
                  function date_time(id) {
                    date = new Date;
                    year = date.getFullYear();
                    month = date.getMonth();
                    months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
                    d = date.getDate();
                    day = date.getDay();
                    days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
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
                    setTimeout('date_time("' + id + '");', '1000');
                    return true;
                  }
                </script>
                <span id="date_time"></span>
                <script type="text/javascript">
                  window.onload = date_time('date_time');
                </script>
            </a></font>
          </li>
        </ul>
        </ul>
        <!-- <form style="margin-right: 20px;" class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
      </div>
    </div>
  </nav>

  <div class="d-flex">
    <div class="col-12 bg-dark" style="width: 15%;">
      <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <img src="https://cdn.pixabay.com/photo/2017/07/25/11/59/logo-2537871_1280.png" style="height: 50px; width: 60px; margin-bottom: 10px; margin-top: 5px;">
        <h4>
          <span class="fs-5 d-none d-sm-inline">Karyawan</span>
        </h4>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
          <li>
            <a style="color:white" href="<?php echo base_url('karyawan') ?>" class="nav-link px-0 align-middle">
              <i class="fa-solid fa-house-chimney"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span></a>
          </li>
          <li>
            <a style="color:white" href="<?php echo base_url('karyawan/absen') ?>" class="nav-link px-0 align-middle">
              <i class="fa-solid fa-users"></i> <span class="ms-1 d-none d-sm-inline">Absen</span></a>
          </li>
          <li>
            <a style="color:white" href="<?php echo base_url('karyawan/menu_izin') ?>" class="nav-link px-0 align-middle">
              <i class="fa-solid fa-users"></i> <span class="ms-1 d-none d-sm-inline">Izin </span></a>
          </li>
          <li>
            <a style="color:white" href="<?php echo base_url('karyawan/profile') ?>" class="nav-link px-0 align-middle">
              <i class="fa-solid fa-user"></i> <span class="ms-1 d-none d-sm-inline">Profile </span></a>
          </li>
          <li>
            <a style="color:white" href="<?php echo base_url('karyawan/history') ?>" class="nav-link px-0 align-middle">
              <i class="fa-solid fa-user"></i> <span class="ms-1 d-none d-sm-inline">History </span></a>
          </li>
          <li style="margin-top: 100%;">
            <a style="color:white" href="<?php echo base_url('auth/logout') ?>" class="nav-link px-0 align-middle">
              <i class="fa-solid fa-right-from-bracket"> Logout</i> <span class="ms-1 d-none d-sm-inline"></span></a>
          </li>
        </ul>
      </div>
    </div>

    <!-- <?php foreach ($absensi as $data) : ?>
    <div style="width: 50%; margin-left: 5%; margin-top: 3%;">
      <div class="card text-bg-secondary">
              <form action="<?php echo base_url('karyawan/aksi_ubah_siswa') ?>" method="post" enctype="multipart/from-data">
                <div class="card-body">
                    <h5 style="margin-top: 20px; margin-bottom: 30px ;" class="card-title text-center">Kegiatan</h5>
                    <p class="card-text"><input style="width: 80%;margin-left: 20px;" type="text" name="kegiatan" value="<?php echo $data->kegiatan ?>"></p>
                    <button type="submit" name="submit" class="btn btn-info" style="margin-left: 25px;"> Ubah</button>
                </div>
                </form>
              </div>
            </div>
          <?php endforeach; ?> -->

    <?php for ($i = 0; $i < count($absensi); $i++) : ?>
      <?php $data = $absensi[$i]; ?>
      <form action="<?php echo base_url('karyawan/aksi_ubah_siswa') ?>" method="post" enctype="multipart/from-data">
        <div class="card-body">
          <input type="text" name="kegiatan" value="<?php echo $data->kegiatan ?>">
          <input type="text" name="kegiatan" value="<?php echo $data->kegiatan ?>">
        </div>
      </form>
    <?php endfor; ?>
</body>

</html>