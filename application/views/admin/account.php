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
        <h4 class="fs-5 d-none d-sm-inline">Admin</h4>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
          <li>
            <a style="color: #fff;" href="<?php echo base_url('admin'); ?>" class="nav-link px-0 align-middle">
              <i class="fa-solid fa-house-chimney"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
            </a>
          </li>
          <li>
            <a style="color: #fff;" href="<?php echo base_url('admin/karyawan'); ?>" class="nav-link px-0 align-middle">
              <i class="fa-solid fa-users"></i> <span class="ms-1 d-none d-sm-inline">Karyawan</span>
            </a>
          </li>
          <li>
            <a style="color: #fff;" href="<?php echo base_url('admin/account'); ?>" class="nav-link px-0 align-middle">
              <i class="fa-solid fa-user-lock"></i> <span class="ms-1 d-none d-sm-inline">Account</span>
            </a>
          </li>
          <li style="margin-top: 100%;">
            <a style="color: #fff;" href="<?php echo base_url('auth/logout'); ?>" class="nav-link px-0 align-middle">
              <span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-right-from-bracket"> Logout</i></span>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="container">
      <div class="card  text-center" style="margin-left: 25%;margin-top: 25px; width: 50%; padding: 15px;">
      <div class="">
          <button class="border border-0 btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <?php if (!empty($row->foto)) : ?>
              <img class="rounded-circle" height="150" width="150" src="<?php echo base64_decode($row->foto); ?>">
            <?php else : ?>
              <img class="rounded-circle" height="150" width="150" src="https://slabsoft.com/wp-content/uploads/2022/05/pp-wa-kosong-default.jpg" />
            <?php endif; ?>
          </button>
        </div>
        <h1 class="text-center"><b>Akun <?php echo $this->session->userdata('username'); ?></b></h1>
        <?php echo $this->session->flashdata('message'); ?>
        <?php foreach ($user as $users) : ?>
          <form class="row" action="<?php echo base_url('admin/aksi_update_account'); ?>" method="post" enctype="multipart/form-data">
            <div class="col-6">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $users->email; ?>">
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $users->username; ?>">
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="nama_depan" class="form-label">Nama Depan</label>
                <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="<?php echo $users->nama_depan; ?>">
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="nama_belakang" class="form-label">Nama Belakang</label>
                <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="<?php echo $users->nama_belakang; ?>">
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="password_baru" class="form-label">Password Baru</label>
                <input type="password_baru" class="form-control" id="password_baru" name="password_baru">
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="konfirmasi_password" class="form-label">Konfirmasi Password Baru</label>
                <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password">
              </div>
            </div>
            <div class="col-8" style="margin-left: 15%">
              <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary w-25">Ubah</button>
            </div>
          </form>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</body>

</html>