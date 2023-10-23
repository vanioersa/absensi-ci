<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <title>Login</title>
    <style>
    .container {
        margin-top: 150px;
        background-color: rgb(0, 140, 0);
        padding: 20px;
        border-radius: 10px;
        color: #fff;
        width: 40%;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label{
        color: #007BFF;
    }
    .form-title {
        text-align: center;
        font-size: 35px;
        margin-bottom: 20px;
        color: blue;
    }
    .form-control{
        border-radius: 20px;
    }
    .btn-eye {
        background-color: #007BFF;
        border: none;
        color: #fff;
        width: 50px;
    }
    </style>
</head>
<body>
    <div class="container">
        <div>
            <div>
                <h1 class="form-title"><b>Login</b></h1>
            </div>
            <div class=" mx-auto">
                <form action="<?php echo base_url('auth/fungsi_login')?>" method="post">
                    <div class="form-group">
                        <label for="email"><b>Email</b></label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password"><b>Password</b></label>
                        <div class="input-group" id="show_hide_password" >
                            <input type="password" name="password" class="form-control" required autocomplete="current-password" placeholder="Password">
                            <div class="input-group-append">
                                <button type="button" class="btn-eye" id="show_password_toggle">
                                    <i class="bi bi-eye-slash" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#show_password_toggle").on('click', function(event) {
                event.preventDefault();
                var passwordInput = $('#show_hide_password input');
                var eyeIcon = $('#show_hide_password i');
                if (passwordInput.attr("type") === "password") {
                    passwordInput.attr('type', 'text');
                    eyeIcon.removeClass("bi-eye-slash").addClass("bi-eye");
                } else {
                    passwordInput.attr('type', 'password');
                    eyeIcon.removeClass("bi-eye").addClass("bi-eye-slash");
                }
            });
        });
    </script>
</body>
</html>
