<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        body {
            background-image: url('https://imgcdn.solopos.com/@space/_large/2022/01/kantor.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            color: #fff;
        }

        .container {
            margin-top: 100px;
        }

        .welcome-card {
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            background-color: #fff;
        }

        .welcome-text {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .description {
            font-size: 15px;
        }

        .menu-buttons {
            margin-top: 20px;
            text-align: center;
        }

        .menu-buttons a {
            margin: 0 10px;
        }

        .menu-list {
            list-style: none;
            padding: 0;
        }

        .menu-list li {
            margin-bottom: 15px;
        }

        .menu-list a {
            text-decoration: none;
            font-size: 18px;
            color: #fff;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 24px;
            
        }

        .card .card-body {
            background-color: #007BFF;
            border-radius: 15px;
            color: #fff;
        }

        hr {
            background-color: #007BFF;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="welcome-card card">
                    <div class="card-body">
                        <h3 class="welcome-text">Selamat Datang di Absensi Karyawan</h3>
                        <p class="description">Jelajahi Absensi karyawan dan temukan berbagai fitur yang bermanfaat.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Memulai</h3>
                        <hr>
                        <ul class="menu-list">
                            <li><a href="auth" class="btn btn-info btn-block">Login</a></li>
                            <!-- <li><a href="auth/register" class="btn btn-info btn-block">Register Admin</a></li> -->
                            <li><a href="auth/registeri" class="btn btn-info btn-block">Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
