<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<!-- tes -->

<body>
  <div class="d-flex">
    <div class="col-12 bg-success" style="width: 15%;">
      <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <img src="https://cdn.pixabay.com/photo/2017/07/25/11/59/logo-2537871_1280.png" style="height: 50px; width: 60px; margin-bottom: 10px; margin-top: 5px;">
        <h4>
          <span class="fs-5 d-none d-sm-inline">Info Selengkapnya</span>
        </h4>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
          <li>
            <a style="color:white" href="<?php echo base_url('karyawan') ?>" class="nav-link px-0 align-middle">
              <i class="fa-solid fa-house-chimney"></i> <span class="ms-1 d-none d-sm-inline">Home</span></a>
          </li>
          <li>
            <a style="color:white" href="<?php echo base_url('karyawan/absen') ?>" class="nav-link px-0 align-middle">
              <i class="fa-solid fa-users"></i> <span class="ms-1 d-none d-sm-inline">Absen</span></a>
          </li>
          <li style="margin-top: 480px;">
            <a style="color:white" href="<?php echo base_url('auth/logout') ?>" class="nav-link px-0 align-middle">
              <i class="fa-solid fa-right-from-bracket"></i> <span class="ms-1 d-none d-sm-inline">Logout</span></a>
          </li>
        </ul>
      </div>
    </div>

    <div class="">
      <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark" style="height: 50px; width: 1160px">
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
      <div class="py-3 h-auto" style="margin-left: 1px;">
        <h1 style="margin-bottom: 20px; text-align: center;"><b>pack</b></h1>
        <a href="<?php echo base_url('karyawan/tambah_absensi') ?>"><button type="submit" class="btn btn-primary w-25" name="submit">Tambah <i class="fa-solid fa-folder-plus"></i></button></a>
        <a href="<?php echo base_url('karyawan/export') ?>" class="btn btn-outline-secondary">Export <i class="fa-solid fa-file-arrow-down"></i></a>
        <br><br>
        <table class="table table-bordered">
          <thead class="table-primary text-center">
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Kegiatan</th>
            <th scope="col">Jam Masuk</th>
            <th scope="col">Jam Pulang</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
          </thead>
          <tbody classs="table-grup-divider">
            <?php $no = 0; foreach ($absensi as $row): $no++ ?>
              <tr class="text-center">
                <td><?php echo $row->$no ?></td>
                <td><?php echo $row->$id_karyawan ?></td>
                <td><?php echo $row->$kegiatan ?></td>
                <td><?php echo $row->$jam_masuk ?></td>
                <td><?php echo $row->$jam_pulang ?></td>
                <td><?php echo $row->$keterangan ?></td>
                <td><?php echo $row->$status ?></td>
                <td>
                  <a href="<?php echo base_url('karyawan/ubah_absensi/') . $row->id ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                  <button onclick="hapus(<?php echo $row->id ?>)" class="btn btn-danger"><i class="fa-solid fa-delete-left"></i></button>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
        <!-- <form method="post" enctype="multipart/form-data" action="<?= base_url('keuangan/import') ?>">
          <div class="modal-body">
            <input type="file" name="file">
            <input type="submit" name="import" class="btn btn-outline-success" value="import">
          </div>
        </form>  -->

        <script>
          function hapus(id) {
            var yes = confirm('Yakin Di Hapus?');
            if (yes == true) {
              window.location.href = "<?php echo base_url('karyawan/delete_absensi/') ?>" + id;
            }
          }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      </div>
    </div>
  </div>
</body>

</html>