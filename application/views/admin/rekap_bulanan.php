<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js" integrity="sha256-LkC+rZzbNkEleBllGdKANe5nxH0QnRjn4hbw2lW+Hjo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" integrity="sha256-VJuwjrIWHWsPSEvQV4DiPfnZi7axOaiWwKfXaJnR5tA=" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    /* Google Font Link */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        height: 100%;
        width: 78px;
        background: #11101D;
        padding: 6px 14px;
        z-index: 99;
        transition: all 0.5s ease;
    }

    .sidebar.open {
        width: 250px;
    }

    .sidebar .logo-details {
        height: 60px;
        display: flex;
        align-items: center;
        position: relative;
    }

    .sidebar .logo-details .icon {
        opacity: 0;
        transition: all 0.5s ease;
    }

    .sidebar .logo-details .logo_name {
        color: #fff;
        font-size: 20px;
        font-weight: 600;
        opacity: 0;
        transition: all 0.5s ease;
    }

    .sidebar.open .logo-details .icon,
    .sidebar.open .logo-details .logo_name {
        opacity: 1;
    }

    .sidebar .logo-details #btn {
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        font-size: 22px;
        transition: all 0.4s ease;
        font-size: 23px;
        text-align: center;
        cursor: pointer;
        transition: all 0.5s ease;
    }

    .sidebar.open .logo-details #btn {
        text-align: right;
    }

    .sidebar i {
        color: #fff;
        height: 60px;
        min-width: 50px;
        font-size: 28px;
        text-align: center;
        line-height: 60px;
    }

    .sidebar .nav-list {
        margin-top: 20px;
        height: 100%;
    }

    .sidebar li {
        position: relative;
        margin: 8px 0;
        list-style: none;
    }

    .sidebar li .tooltip {
        position: absolute;
        top: -20px;
        left: calc(100% + 15px);
        z-index: 3;
        background: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 15px;
        font-weight: 400;
        opacity: 0;
        white-space: nowrap;
        pointer-events: none;
        transition: 0s;
    }

    .sidebar li:hover .tooltip {
        opacity: 1;
        pointer-events: auto;
        transition: all 0.4s ease;
        top: 50%;
        transform: translateY(-50%);
    }

    .sidebar.open li .tooltip {
        display: none;
    }

    .sidebar input {
        font-size: 15px;
        color: #FFF;
        font-weight: 400;
        outline: none;
        height: 50px;
        width: 100%;
        width: 50px;
        border: none;
        border-radius: 12px;
        transition: all 0.5s ease;
        background: #1d1b31;
    }

    .sidebar.open input {
        padding: 0 20px 0 50px;
        width: 100%;
    }

    .sidebar .bx-search {
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        font-size: 22px;
        background: #1d1b31;
        color: #FFF;
    }

    .sidebar.open .bx-search:hover {
        background: #1d1b31;
        color: #FFF;
    }

    .sidebar .bx-search:hover {
        background: #FFF;
        color: #11101d;
    }

    .sidebar li a {
        display: flex;
        height: 100%;
        width: 100%;
        border-radius: 12px;
        align-items: center;
        text-decoration: none;
        transition: all 0.4s ease;
        background: #11101D;
    }

    .sidebar li a:hover {
        background: #FFF;
    }

    .sidebar li a .links_name {
        color: #fff;
        font-size: 15px;
        font-weight: 400;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: 0.4s;
    }

    .sidebar.open li a .links_name {
        opacity: 1;
        pointer-events: auto;
    }

    .sidebar li a:hover .links_name,
    .sidebar li a:hover i {
        transition: all 0.5s ease;
        color: #11101D;
    }

    .sidebar li i {
        height: 50px;
        line-height: 50px;
        font-size: 18px;
        border-radius: 12px;
    }

    .sidebar li.profile {
        position: fixed;
        height: 60px;
        width: 78px;
        left: 0;
        bottom: -8px;
        padding: 10px 14px;
        background: #1d1b31;
        transition: all 0.5s ease;
        overflow: hidden;
    }

    .sidebar.open li.profile {
        width: 250px;
    }

    .sidebar li .profile-details {
        display: flex;
        align-items: center;
        flex-wrap: nowrap;
    }

    .sidebar li img {
        height: 45px;
        width: 45px;
        object-fit: cover;
        border-radius: 6px;
        margin-right: 10px;
    }

    .sidebar li.profile .name,
    .sidebar li.profile .job {
        font-size: 15px;
        font-weight: 400;
        color: #fff;
        white-space: nowrap;
    }

    .sidebar li.profile .job {
        font-size: 12px;
    }

    .sidebar .profile #log_out {
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        background: #1d1b31;
        width: 100%;
        height: 60px;
        line-height: 60px;
        border-radius: 0px;
        transition: all 0.5s ease;
    }

    .sidebar.open .profile #log_out {
        width: 50px;
        background: none;
    }

    .home-section {
        position: relative;
        background: #E4E9F7;
        min-height: 100vh;
        top: 0;
        left: 78px;
        width: calc(100% - 78px);
        transition: all 0.5s ease;
        z-index: 2;
        margin-top: -20px;
        padding-top: 20px;
    }

    .sidebar.open~.home-section {
        left: 250px;
        width: calc(100% - 250px);
    }


    .home-section .text {
        display: inline-block;
        color: #11101d;
        font-size: 25px;
        font-weight: 500;
        margin: 18px
    }

    @media (max-width: 420px) {
        .sidebar li .tooltip {
            display: none;
        }
    }
</style>
<style>
    .blue {
        background-color: #fff;
        border-radius: 10px;
        border: none;
        position: relative;
        margin-bottom: 30px;
        box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1),
            0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1),
            0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12),
            0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
    }

    .table-responsive {
        overflow-x: auto;
    }

    .table {
        width: 100%;
    }

    @media (min-width: 992px) {
        .sidebar.open~.home-section {
            left: 250px;
            width: calc(100% - 250px);
        }
    }
</style>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bxl-c-plus-plus icon'></i>
            <div class="logo_name">Absensi Karyawan</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="<?php echo base_url('karyawan') ?>">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="<?php echo base_url('admin/karyawan'); ?>">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Karyawan</span>
                </a>
                <span class="tooltip">Karyawan</span>
            </li>
            <li>
                <a href="<?php echo base_url('admin/profile'); ?>">
                    <i class="fa-solid fa-user"></i>
                    <span class="links_name">Account</span>
                </a>
                <span class="tooltip">Account</span>
            </li>
            <li class="profile">
                <a href="<?php echo base_url('auth/logout'); ?>">
                    <div class="profile-details">
                        <?php foreach ($admin as $row) : ?>
                            <img src="<?php echo  base_url('./image/karyawan/' . $row->image) ?>" height="150" width="150" class="rounded-circle">
                            <div class="name_job">
                                <div class="name"><?php echo $this->session->userdata('username') ?></div>
                                <div class="job">Web designer</div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <i class='bx bx-log-out' id="log_out"></i>
                </a>
            </li>
        </ul>
    </div>

    <section class="home-section">
        <div class="container">
            <div class="text-center mt-5">
                <h1 style="font-size: 24px; background-color: #000; color: white; padding: 10px; border-radius: 5px;">
                    <b>Rekap Bulanan</b>
                </h1>
            </div>
            <hr style="background-color: red; height: 10px;">
            <div class="table-responsive">
                <form action="<?php echo base_url('admin/rekap_bulanan') ?>" method="post">
                    <div>
                        <div class="row">
                            <div class="col-4">
                                <select name="bulan" id="form-select" class="form-select" aria-label="Default Select Example">
                                    <option selected>Bulan</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Febuari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">Seprtember</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                            </div>
                            <div class="col-4" style="text-align: right;">
                                <a href="<?php echo base_url('admin/export_bulanan'); ?>" class="btn btn-primary" style="background-color: #3498db; border: 2px solid #3498db; padding: 5px 20px; border-radius: 5px;">
                                    Export <i class="fas fa-file-download" style="margin-left: 5px;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </form><br>
                <table class="table table-striped table-bordered text-center">
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
                        foreach ($absensi_bulanan as $absen) : $no++ ?>
                            <tr>
                                <th scope="row"><?php echo $no ?></th>
                                <td><?php echo $absen->nama_depan . ' ' . $absen->nama_belakang; ?></td>
                                <td><?php echo $absen->kegiatan; ?></td>
                                <td><?php echo $absen->date; ?></td>
                                <td><?php echo $absen->jam_masuk; ?></td>
                                <td><?php echo $absen->jam_pulang; ?></td>
                                <td><?php echo $absen->keterangan; ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <div class="text-center mt-3">
                </div>
            </div>
        </div>
    </section>

    <script>
        const exportButton = document.getElementById("exportBtn");

        exportButton.addEventListener("click", () => {
            const selectedMonth = document.getElementById("form-select").value;
            if (selectedMonth !== "Bulan") {
                // Redirect to the export page with the selected month as a parameter
                window.location.href = "<?php echo base_url('admin/export_bulanan/'); ?>" + selectedMonth;
            }
        });
    </script>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        searchBtn.addEventListener("click", () => { // Sidebar open when you click on the search iocn
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        // following are the code to change sidebar button(optional)
        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
            }
        }
    </script>
</body>

</html>