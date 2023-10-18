<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        .container {
            margin-top: 100px;
            text-align: center;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .welcome-card {
            border-radius: 15px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            /* Warna latar belakang card */
        }

        .welcome-card p{
            color: red;
        }

        .welcome-text {
            color: #007BFF;
            /* Warna teks judul */
            font-size: 32px;
            /* Ukuran teks judul */
            margin-bottom: 20px;
            /* Jarak bawah judul */
        }

        .description {
            font-size: 18px;
            /* Ukuran teks deskripsi */
        }

        .card-title {
            font-size: 24px;
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
            color: #007BFF;
        }

        body {
            background-image: url('https://imgcdn.solopos.com/@space/_large/2022/01/kantor.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            color: #fff;
        }

        .welcome-text {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="welcome-card card">
                    <div class="card-body">
                        <h1 class="welcome-text">Welcome to Our Website</h1>
                        <p class="description">Explore our website and discover amazing features.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="background-color: #007BFF; border-radius: 15px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);">
                        <h3 class="card-title" style="color: #fff;">Get Started</h3>
                        <hr style="background-color: #fff;">
                        <ul class="menu-list" style="list-style-type: none; padding: 0;">
                            <li><a href="auth" style="color: #fff; font-weight: bold; font-size: 20px; text-decoration: none;">Login</a></li>
                            <li><a href="auth/register" style="color: #fff; font-weight: bold; font-size: 20px; text-decoration: none;">Register Admin</a></li>
                            <li><a href="auth/registeri" style="color: #fff; font-weight: bold; font-size: 20px; text-decoration: none;">Register Karyawan</a></li>
                        </ul>
                        <!-- <div class="text-center mt-4">
                            <p style="font-size: 18px; color: #fff;">Belum punya akun?</p>
                            <a href="register" class="btn btn-light" style="border-radius: 5px; font-weight: bold;">Buat Akun</a>
                        </div> -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>