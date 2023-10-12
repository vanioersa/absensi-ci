<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
  .gradient-custom {
    /* fallback for old browsers */
    background: #6565a3;

    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right bottom, rgba(31, 164, 194), rgba(102, 61, 217))
  }
</style>
<body style="overflow: hidden; background-image: url('https://media.istockphoto.com/id/1337977426/photo/dark-gray-and-black-grunge-cement-wall-studio-room-space-product-background-template.webp?b=1&s=170667a&w=0&k=20&c=4dVCV5KtJKEhuQtp5dbnFmwMBAzNknz35VUIa0C3KoE='); background-size: cover;">
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
                    <li class="nav-item">
                        <a class="nav-link" href="">Link</a>
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
            <a><i class="fa-regular fa-calendar"></i> Tanggal : <?php date_default_timezone_set("Asia/Jakarta"); ?>
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
            </a>
          </li>
          <li>
            <a style="color:white" href="<?php echo base_url('karyawan') ?>" class="nav-link px-0 align-middle">
              <i class="fa-solid fa-house-chimney"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span></a>
          </li>
          <li>
            <a style="color:white" href="<?php echo base_url('karyawan/menu_absen') ?>" class="nav-link px-0 align-middle">
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
          <li style="margin-top: 100%;">
            <a style="color:white" href="<?php echo base_url('auth/logout') ?>" class="nav-link px-0 align-middle">
              <i class="fa-solid fa-right-from-bracket"></i> <span class="ms-1 d-none d-sm-inline">Logout</span></a>
          </li>
        </ul>
      </div>
    </div>
        
      <div class="container">
        <div class="row d-flex justify-content-center" style="margin-top: 10%;">
          <div class="col col-lg-6 mb-4 mb-lg-0">
            <div class="card mb-3" style="border-radius: .5rem;">
              <div class="row g-0">
                <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/2048px-User-avatar.svg.png" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                  <h5><?php echo $this->session->userdata('username') ?></h5>
                  <p>Web Designer <br>Employees</p>
                  <!-- <i class="far fa-edit mb-5"></i> -->
                </div>
                <div class="col-md-8">
                  <div class="card-body p-4">
                    <h6>Information</h6>
                    <hr class="mt-0 mb-4">
                    <div class="row pt-1">
                      <div class="col-6 mb-3">
                        <h6>First Name</h6>
                        <p class="text-muted"><?php echo $this->session->userdata('username') ?></p>
                      </div>
                      <div class="col-6 mb-3">
                        <h6>Last Name</h6>
                        <p class="text-muted"><?php echo $this->session->userdata('email') ?></p>
                      </div>
                      <div class="col-6 mb-3">
                        <h6>Username</h6>
                        <p class="text-muted"><?php echo $this->session->userdata('username') ?></p>
                      </div>
                      <div class="col-6 mb-3">
                        <h6>Email</h6>
                        <p class="text-muted"><?php echo $this->session->userdata('email') ?></p>
                      </div>
                      <div class="col-6 mb-3">
                        <h6>Password</h6>
                        <p class="text-muted"><?php echo $this->session->userdata('email') ?></p>
                      </div>
                      <a href="<?php echo base_url('karyawan/ubah_profile/')?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                    </div>
                    <!-- <h6>Projects</h6>
                    <hr class="mt-0 mb-4">
                    <div class="row pt-1">
                      <div class="col-6 mb-3">
                        <h6>Recent</h6>
                        <p class="text-muted">Lorem ipsum</p>
                      </div>
                      <div class="col-6 mb-3">
                        <h6>Most Viewed</h6>
                        <p class="text-muted">Dolor sit amet</p>
                      </div>
                    </div> -->
                    <div class="d-flex justify-content-start" style="margin-top: 10px;">
                      <a href="https://www.facebook.com/"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                      <a href="https://www.twitter.com/"><i class="fab fa-twitter fa-lg me-3"></i></a>
                      <a href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>

</html>