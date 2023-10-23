<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('background-image.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #fff;
        }

        .container {
            width: 80%;
            max-width: 400px;
            margin: 0 auto;
            background: rgb(0, 140, 0);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px #000000;
        }

        h2 {
            text-align: center;
            color: #007BFF;
        }

        label {
            font-weight: bold;
            color: #007BFF;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 94%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 15px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .password-toggle {
            cursor: pointer;
            color: #007BFF;
            text-decoration: underline; /* Tambah garis bawah untuk menandai tautan */
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Register</h2>
        <form method="post" action="<?php echo base_url('auth/aksi_registeri') ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br><br>

            <label for="nama_depan">Nama Depan:</label>
            <input type="text" name="nama_depan" required><br><br>

            <label for="nama_belakang">Nama Belakang:</label>
            <input type="text" name="nama_belakang" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <span class="password-toggle" id="password-toggle" onclick="togglePassword()">Lihat Password</span><br><br>
            <p>password minimal 8  karakter</p>

            <input type="hidden" name="role" value="karyawan">

            <input type="submit" value="Register">
        </form>
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById('password');
            var passwordToggle = document.getElementById('password-toggle');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                passwordToggle.textContent = 'Sembunyikan Password';
            } else {
                passwordField.type = 'password';
                passwordToggle.textContent = 'Lihat Password';
            }
        }
    </script>
</body>

</html>
