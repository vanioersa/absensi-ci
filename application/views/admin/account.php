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
          <!-- <li class="nav-item">
            <a class="nav-link" href="">Link</a>
          </li> -->
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
          <span class="fs-5 d-none d-sm-inline">Admin</span>
        </h4>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
          <li>
            <a style="color:white" href="<?php echo base_url('admin') ?>" class="nav-link px-0 align-middle">
              <i class="fa-solid fa-house-chimney"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span></a>
          </li>
          <a style="color:white" href="<?php echo base_url('admin/karyawan') ?>" class="nav-link px-0 align-middle">
            <i class="fa-solid fa-users"></i> <span class="ms-1 d-none d-sm-inline">Karyawan</span></a>
          </li>
          <li>
            <a style="color:white" href="<?php echo base_url('admin/account') ?>" class="nav-link px-0 align-middle">
              <i class="fa-solid fa-user-lock"></i> <span class="ms-1 d-none d-sm-inline">Account</span></a>
          </li>
          <li style="margin-top: 100%;">
            <a style="color:white" href="<?php echo base_url('auth/logout') ?>" class="nav-link px-0 align-middle">
              <span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-right-from-bracket"> Logout</i></span></a>
          </li>
        </ul>
      </div>
    </div>

    <div class='card w-50 m-auto p-3 text-center'>
      <!-- <div class="">
        <button class="border border-0 btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <?php if (!empty($row->foto)) : ?>
            <img class="rounded-circle" height="150" width="150" src="<?php echo base64_decode($row->foto); ?>">
          <?php else : ?>
            <img class="rounded-circle" height="150" width="150" src="https://slabsoft.com/wp-content/uploads/2022/05/pp-wa-kosong-default.jpg" />
          <?php endif; ?>
        </button>
      </div> -->
      <h1 class='text-center'><b>Akun <?php echo $this->session->userdata('username'); ?></b></h1>
      <div>
        <?php $no = 0; foreach ($user as $users) : $no++ ?>
          <form class="row" action="<?php echo base_url('admin/aksi_ubah_account') ?>" method="post" enctype="multipart/from-data">
            <div class="col-6">
              <label for="email" class="form-label">email</label>
              <input type="text" class="form-control" id="email" name="email" value="<?php echo $users->email ?>">
            </div>
            <div class="col-6">
              <label for="username" class="form-label">username</label>
              <input type="text" class="form-control" id="username" name="username" value="<?php echo $users->username ?>">
            </div>
            <div class="col-6">
              <label for="password" class="form-label">password</label>
              <input type="text" class="form-control" id="password_baru" name="password_baru">
            </div>
            <div class="col-6">
              <label for="password" class="form-label">konfirmasi password</label>
              <input type="text" class="form-control" id="konfirmasi_password" name="konfirmasi_password">
            </div>
            <div class="col-8" style="margin-left: 15%">
              <label for="foto" class="form-label">Foto</label>
              <input type="file" class="form-control" id="foto" name="foto">
            </div>
      </div>
      <button style="margin-left: 35%; margin-top: 15px;" type="submit" class="btn btn-primary w-25" name="submit">Ubah</button>
      </form>
    <?php endforeach ?>
    </div>
  </div>
</body>

</html>