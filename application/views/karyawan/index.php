<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
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

    <div style="width:100%;">
      <div class="text-center m-4">
        <h1><b>
            <font color="white">Selamat Datang <?php echo $this->session->userdata('username') ?></font>
          </b></h1>
      </div>
      <hr>

      <div class="container">
        <div class="row ">
          <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-cherry">
              <div class="card-statistic-3 p-4">
                <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                <div class="mb-4">
                  <h5 class="card-title mb-0">Total Masuk</h5>
                </div>
                <div class="row align-items-center mb-2 d-flex">
                  <div class="col-8">
                    <h2 class="d-flex align-items-center mb-0">
                      <i class="fa-solid fa-user"></i><span style="margin-left: 10px;"> 25</span>
                    </h2>
                  </div>
                  <!-- <div class="col-4 text-right">
                    <span>90% <i class="fa fa-arrow-up"></i></span>
                  </div> -->
                </div>
                <!-- <div class="progress mt-1 " data-height="8" style="height: 8px;">
                  <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                </div> -->
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-blue-dark">
              <div class="card-statistic-3 p-4">
                <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                <div class="mb-4">
                  <h5 class="card-title mb-0">Total Cuti</h5>
                </div>
                <div class="row align-items-center mb-2 d-flex">
                  <div class="col-8">
                    <h2 class="d-flex align-items-center mb-0">
                      <i class="fa-solid fa-user"></i><span style="margin-left: 10px;"> 5</span>
                    </h2>
                  </div>
                  <!-- <div class="col-4 text-right">
                    <span>50% <i class="fa-solid fa-arrow-down"></i></span>
                  </div> -->
                </div>
                <!-- <div class="progress mt-1 " data-height="8" style="height: 8px;">
                  <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>



      <table class="table table-info table-bordered border-primary">
        <thead>
          <tr>
            <th style="width: 10px;">No</th>
            <th>Nama</th>
            <th>kegiatan</th>
            <th>Tanggal</th>
            <th>Jam Masuk</th>
            <th>Jam Pulang</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0;
          foreach ($absensi as $row) : $no++ ?>
            <tr>
              <th><?php echo $no ?></th>
              <td><?php echo tampil_full_karyawan_byid($row->id_karyawan) ?></td>
              <td><?php echo $row->kegiatan ?></td>
              <td><?php echo $row->date ?></td>
              <td><?php echo $row->jam_masuk ?></td>
              <td><?php echo $row->jam_pulang ?></td>
              <td><?php echo $row->keterangan ?></td>
              <td><?php echo $row->status ?></td>
              <td>
                <?php if ($row->status === "done") : ?>
                  <button disabled class="btn btn-danger" type="submit">Pulang</button>
                <?php else : ?>
                  <a type="submit" href="<?php echo base_url('karyawan/pulang/' . $row->id) ?>" class="btn btn-primary">Pulang</a>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
  <script>
    function pulang(id) {
      var yes = confrim('Pulang');
      if (yes == true) {
        window.location.href = "<?php echo base_url('karyawan/pulang/') ?>" + id;
      }
    }
  </script>
</body>

</html>