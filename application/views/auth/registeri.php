<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #080710;
        }

        .background {
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }

        .shape:first-child {
            background: linear-gradient(#1845ad, #23a2f6);
            left: -80px;
            top: -80px;
        }

        .shape:last-child {
            background: linear-gradient(to right, #ff512f, #f09819);
            right: -30px;
            bottom: -80px;
        }

        form {
            height: 520px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 30px 20px;
        }

        form * {
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 25px;
            font-weight: 400;
            line-height: 32px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 5px;
            font-size: 12px;
            font-weight: 500;
        }

        input {
            display: block;
            height: 40px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 10px;
            font-size: 10px;
            font-weight: 300;
        }

        ::placeholder {
            color: #e5e5e5;
        }

        button {
            margin-top: 30px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 5px 0;
            font-size: 15px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        .register p {
            margin-top: 10px;
            margin-left: 12%;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        .fixed-page {
            height: 100%;
            overflow: auto;
            background-color: #f0f0f0;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="post" action="<?php echo base_url('auth/aksi_registeri') ?>">
        <h3>Register</h3>
        <p style="color:  rgb(255, 255, 255);"><?php echo $this->session->flashdata('error'); ?></p>

        <label for="username">Username</label>
        <input type="text" placeholder="Username" id="username" name="username"> 

        <label for="email">Email</label>
        <input type="text" placeholder="Email" id="email" name="email"> 

        <label for="nama_depan">Nama Depan</label>
        <input type="text" placeholder="Nama Depan" id="nama_depan" name="nama_depan"> 

        <label for="nama_belakang">Nama Belakang</label>
        <input type="text" placeholder="Nama Belakang" id="nama_belakang" name="nama_belakang"> 

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password">

        <button>Register</button>
        <!-- <div class="register">
            <p>Jika Belum Punya Akun <a href="<?php echo base_url('auth/register') ?>">Daftar di Sini</a></p>
        </div> -->
    </form>
</body>

</html>