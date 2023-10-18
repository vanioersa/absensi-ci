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
    <<div class="col-12 bg-success" style="width: 15%;">
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
    <div class="text-center mt-4">
      <h1><b>Karyawan</b></h1>
    </div>
    <hr style="border: 2px solid blue;">
    <div class="text-right mb-3">
      <button class="btn btn-success" id="exportData">Export Data</button>
    </div>
    <table class="table table-striped table-bordered text-center" id="dataKaryawan">
      <thead class="table-danger">
        <tr>
          <th>No</th>
          <th>Nama Pegawai</th>
          <th>Kegiatan</th>
          <th>Tanggal</th>
          <th>Waktu Datang</th>
          <th>Waktu Pulang</th>
          <th>Keterangan</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 0;
        foreach ($absensi as $row) : $no++ ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo tampil_full_karyawan_byid($row->id_karyawan) ?></td>
            <td><?php echo $row->kegiatan ?></td>
            <td><?php echo $row->date ?></td>
            <td><?php echo $row->jam_masuk ?></td>
            <td><?php echo $row->jam_pulang ?></td>
            <td><?php echo $row->keterangan ?></td>
            <td><?php echo $row->status ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <!-- Tambahkan script untuk SweetAlert2 dan Export Data -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    // SweetAlert2 saat tombol export diklik
    document.getElementById("exportData").addEventListener("click", function() {
      Swal.fire({
        title: "Apakah Anda yakin ingin mengekspor data?",
        text: "Data karyawan akan diekspor dalam format tertentu.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ekspor",
        cancelButtonText: "Batal"
      }).then((result) => {
        if (result.isConfirmed) {
          // Tambahkan kode ekspor data di sini
          window.location.href = "<?php echo base_url('admin/export_karyawan') ?>";
          Swal.fire("Data berhasil diekspor!", "", "success");
        }
      });
    });
  </script>


    </div>
</body>

</html>