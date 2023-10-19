<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url('admin'); ?>">
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
            <div class="text-center mt-5">
                <h1 style="font-size: 24px; background-color: #3498db; color: white; padding: 10px; border-radius: 5px;"><b>Rekap Harian</b></h1>
            </div>
            <hr style="background-color: red; height: 10px;">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="font-size: 14px;">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama</th>
                            <th scope="col">KEGIATAN</th>
                            <th scope="col">TANGGAL</th>
                            <th scope="col">JAM MASUK</th>
                            <th scope="col">JAM PULANG</th>
                            <th scope="col">KETERANGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($absensi as $absen) : $no++ ?>
                            <tr>
                                <th scope="row"><?php echo $no ?></th>
                                <td><?php echo $absen->username; ?></td>
                                <td><?php echo $absen->kegiatan; ?></td>
                                <td><?php echo $absen->date; ?></td>
                                <td><?php echo $absen->jam_masuk; ?></td>
                                <td><?php echo $absen->jam_pulang; ?></td>
                                <td><?php echo $absen->keterangan; ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-3">
            <div class="text-center mt-3">
                <button id="exportButton" class="btn btn-primary">Export Data <i class="fas fa-file-download" style="margin-left: 5px;"></i></button>
            </div>
        </div>
        <!-- Include SweetAlert2 library -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.getElementById("exportButton").addEventListener("click", function() {
                Swal.fire({
                    title: 'Export Data?',
                    text: 'Apakah Anda yakin ingin mengekspor data ini?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3498db',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Export!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Pemrosesan ekspor data dapat ditempatkan di sini.
                        // Anda dapat mengarahkan pengguna ke URL ekspor atau melakukan tindakan lainnya.
                        window.location.href = '<?php echo base_url('admin/export_harian'); ?>';
                    }
                });
            });
        </script>
</body>

</html>