<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

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
              Tanggal: <?php date_default_timezone_set("Asia/Jakarta"); ?>
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
        <img src="https://cdn.pixabay.com/photo/2017/07/25/11/59/logo-2537871_1280.png" style="height: 50px; width: 60px; margin-bottom: 10px; margin-top: 5px;">
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

    <?php foreach ($absensi as $data) : ?>
      <form class="card w-50 p-5 " style="margin-left:23%" method="post" enctype="multipart/form-data" action="<?php echo base_url('karyawan/aksi_ubah_karyawan') ?>">
        <input type="hidden" name="id" value="<?php echo $data->id ?>">
        <div class="card-body">
          <h5 style="margin-left:20%;">Menu Izin</h5>
          <div class="card" style="width: 30rem; margin-right:5%;">
            <input type="text" name="keterangan" value="<?php echo $data->keterangan ?>">
          </div><br>
          <button type="submit" name="submit" class="btn btn-primary">ubah</button>
        </div>
      </form>
    <?php endforeach; ?>
  </div>
</body>

</html>