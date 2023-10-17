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
  body {
    font-family: Arial, Helvetica, sans-serif;
  }

  /* Full-width input fields */
  input[type=text],
  input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    box-sizing: border-box;
  }

  .gradient-custom {
    /* fallback for old browsers */
    background: #6565a3;

    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right bottom, rgba(31, 164, 194), rgba(102, 61, 217))
  }

  /* Set a style for all buttons */
  /* button {
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin-left: 10%;
    border: none;
    cursor: pointer;
    width: 100%;
  } */

  button:hover {
    opacity: 0.8;
  }

  /* Extra styles for the cancel button */
  .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
  }

  /* Center the image and position the close button */
  .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
  }

  img.avatar {
    width: 40%;
    border-radius: 50%;
  }

  .container {
    padding: 16px;
  }

  span.psw {
    float: right;
    padding-top: 16px;
  }

  /* The Modal (background) */
  .modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0);
    /* Black w/ opacity */
    padding-top: 60px;
  }

  /* Modal Content/Box */
  .modal-content {
    background-color: #fefefe;
    margin-left: 35%;
    /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 50%;
    /* Could be more or less, depending on screen size */
    background-color: rgb(192, 192, 192);
  }

  /* The Close Button (x) */
  .close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: red;
    cursor: pointer;
  }

  /* Add Zoom Animation */
  .animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
  }

  @-webkit-keyframes animatezoom {
    from {
      -webkit-transform: scale(0)
    }

    to {
      -webkit-transform: scale(1)
    }
  }

  @keyframes animatezoom {
    from {
      transform: scale(0)
    }

    to {
      transform: scale(1)
    }
  }

  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
    span.psw {
      display: block;
      float: none;
    }

    .cancelbtn {
      width: 100%;
    }
  }
</style>

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
              <div style="background-color: rgba(47, 199, 229, 0.8);" class="col-md-8">
                <div class="card-body p-4">
                  <h6>Information</h6>
                  <hr class="mt-0 mb-4">
                  <?php foreach ($user as $row) : ?>
                    <div class="row pt-1">
                      <div class="col-6 mb-3">
                        <h6>First Name</h6>
                        <p class="text-muted"><?php echo $row->nama_depan ?></p>
                      </div>
                      <div class="col-6 mb-3">
                        <h6>Last Name</h6>
                        <p class="text-muted"><?php echo $row->nama_belakang ?></p>
                      </div>
                      <div class="col-6 mb-3">
                        <h6>Username</h6>
                        <p class="text-muted"><?php echo $row->username ?></p>
                      </div>
                      <div class="col-6 mb-3">
                        <h6>Email</h6>
                        <p class="text-muted"><?php echo $row->email ?></p>
                      </div>
                      <div style="margin-left: 25%;" class="col-6">
                        <h6>Password</h6>
                        <p class="text-muted"><?php echo $row->password ?></p>
                      </div>
                    <?php endforeach ?>
                    <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-primary w-100" style="width:auto;">Ubah</button>
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
                    <div class="d-flex justify-content-start" style="margin-top: 10px; margin-left: 10px;">
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
      <div id="id01" class="modal">
        <form class="modal-content animate" action="/action_page.php" method="post">
          <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
          </div>

          <div class="container">
            <label for="uname"><b>First Name</b></label>
            <input type="text" placeholder="Enter First Name" name="nama_depan" required>

            <label for="uname"><b>Last Name</b></label>
            <input type="text" placeholder="Enter Last Name" name="nama_belakang" required>

            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="uname"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <a href="profile" class="btn btn-primary">Ubah</a>

            <!-- <label>
              <input type="checkbox" checked="checked" name="remember"> Remember me
            </label> -->

            <a style="margin-left: 83%;" type="button" onclick="document.getElementById('id01').style.display='none'" class="btn btn-danger ">Cancel</a>

          </div>
          <div class="container" style="background-color:#f1f1f1">
            <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
          </div>
        </form>
      </div>
    </div>

    <script>
      // Get the modal
      var modal = document.getElementById('id01');

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>
</body>

</html>