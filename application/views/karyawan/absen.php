<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js" integrity="sha256-LkC+rZzbNkEleBllGdKANe5nxH0QnRjn4hbw2lW+Hjo=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" integrity="sha256-VJuwjrIWHWsPSEvQV4DiPfnZi7axOaiWwKfXaJnR5tA=" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <a href="<?php echo base_url('karyawan/tambah_absensi') ?>">
          <i class='bx bx-user'></i>
          <span class="links_name">Absen</span>
        </a>
        <span class="tooltip">Absen</span>
      </li>
      <li>
        <a href="<?php echo base_url('karyawan/profile') ?>">
          <i class="fa-solid fa-user"></i>
          <span class="links_name">Profile</span>
        </a>
        <span class="tooltip">Profile</span>
      </li>
      <li>
        <a href="<?php echo base_url('karyawan/history') ?>">
          <i class="fa-solid fa-history"></i>
          <span class="links_name">History</span>
        </a>
        <span class="tooltip">History</span>
      </li>
      <li class="profile">
        <a href="<?php echo base_url('auth/logout') ?>">
          <div class="profile-details">
            <?php foreach ($user as $row) : ?>
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

  <section class="home-section section">

    <div class="py-3 h-auto" style="margin-left: 4%;">
      <h1 style="margin-bottom: 20px; width: 20px; text-align: center; margin-left: 100%; margin-bottom:10px"><b>Absensi Karyawan</b></h1>
      <a href="<?php echo base_url('karyawan/export_absen') ?>" class="btn btn-primary">Export <i class="fa-solid fa-file-arrow-down"></i></a>
      <a href="<?php echo base_url('karyawan/tambah_absensi') ?>"><button type="submit" class="btn btn-primary w-25" name="submit">Tambah <i class="fa-solid fa-folder-plus"></i></button></a>
      <!-- <a href="<?php echo base_url('karyawan/menu_izin/') ?>"><button type="submit" class="btn btn-primary w-25" name="submit">Izin <i class="fa-solid fa-folder-plus"></i></button></a> -->
      <br><br>
      <table class="table table-bordered" style=" width:210%;">
        <thead class="table-danger text-center">
          <th style=" width: 5%;" scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Kegiatan</th>
          <th scope="col">Jam Masuk</th>
          <th scope="col">Jam Pulang</th>
          <th scope="col">Keterangan</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </thead>
        <tbody class="table-grup-divider">
          <?php $no = 0;
          foreach ($absensi as $row) : $no++ ?>
            <tr class="table-primary text-center">
              <td><?php echo $no ?></td>
              <td><?php echo $row->username ?></td>
              <td><?php echo $row->kegiatan ?></td>
              <td><?php echo $row->jam_masuk ?></td>
              <td><?php echo $row->jam_pulang ?></td>
              <td><?php echo $row->keterangan ?></td>
              <td><?php echo $row->status ?></td>
              <td>
                <!-- <a href="<?php echo base_url('karyawan/ubah_absen/') . $row->id ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a> -->
                <button onclick="hapus(<?php echo $row->id ?>)" class="btn btn-danger"><i class="fa-solid fa-delete-left"></i></button>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>

    </div>
    </div>
  </section>
  <script>
    function hapus(id) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger',
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          swalWithBootstrapButtons.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'

            )
            .then(function() {
              window.location.href = "<?php echo base_url('karyawan/delete_absensi/') ?>" + id;
            })
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'cancel',
            'Your file data is safe :)',
            'error'
          )
        }
      })
    }
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