<!DOCTYPE html>
<html>

<head>
    <title>Absensi Karyawan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
    body {
        font-family: verdana;
        font-size: 0.85em;
        background-image: url(https://png.pngtree.com/background/20210711/original/pngtree-watercolor-black-white-brush-background-picture-image_1166963.jpg);
    }

    .menu {
        display: block;
        background-color: #E0FFFF;
        height: 46px;
    }

    .content {
        clear: both;
        padding: 30px 0;
        min-height: 200px;
    }

    .footer {
        clear: both;
        margin-top: 140px;
        background-color: #E0FFFF;
        padding: 10px 10px;
    }

    #navigasi {
        position: relative;
        line-height: 30px;
        margin-left: 40%;
        padding: 0;
        list-style-type: none;
        list-style-position: outside;
    }

    #navigasi a {
        display: block;
        padding: 8px 16px;
        background-color: #66CDAA;
        color: #fff;
        text-decoration: none;
    }

    #navigasi a:hover {
        background-color: #66CDAA;
        color: #fff;
    }

    #navigasi li {
        position: relative;
        float: left;
    }

    #navigasi ul {
        position: absolute;
        display: none;
        margin: 0;
        padding: 0;
        list-style-type: none;
        list-style-position: outside;
    }

    #navigasi li ul a {
        width: 12em;
        height: auto;
        float: left;
    }

    #navigasi li:hover ul {
        display: block;
    }

    #navigasi li:hover ul ul {
        display: none;
    }
</style>

<body>
    <center><h1 style="color: white;"><b>Selamat Datang</b></h1>
    <hr>
    <div class="menu">
        <ul id="navigasi">
            <li><a href="auth/register">Register Admin</a></li>
            <li><a href="auth/registeri">Register Karyawan</a></li>
            <li><a href="auth">Login</a></li>
        </ul>
    </div>
    <img src="https://cdn.pixabay.com/photo/2017/07/25/11/59/logo-2537871_1280.png" style="width: 275px; height: 240px; ; margin-top: 40px;">
    </center>
</body>

</html>