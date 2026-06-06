<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Rental Kendaraan</title>

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
            background:#dbeafe;
        }

        .container{
            width:550px;
            background:#fff;
            border-radius:20px;
            padding:40px;
            box-shadow:0 0 30px rgba(0,0,0,.2);
        }

        .logo{
            text-align:center;
            margin-bottom:20px;
        }

        .logo img{
            width:120px;
        }

        h1{
            text-align:center;
            margin-bottom:25px;
            color:#2563eb;
        }

        .input-box{
            position:relative;
            margin-bottom:18px;
        }

        .input-box input{
            width:100%;
            padding:13px 45px 13px 15px;
            border:none;
            background:#eff6ff;
            border-radius:8px;
            outline:none;
        }

        .input-box textarea{
            width:100%;
            padding:13px 45px 13px 15px;
            border:none;
            background:#eff6ff;
            border-radius:8px;
            outline:none;
            resize:none;
            min-height:90px;
        }

        .input-box i{
            position:absolute;
            right:15px;
            top:50%;
            transform:translateY(-50%);
            color:#888;
        }

        .textarea-icon{
            top:25px !important;
        }

        .btn{
            width:100%;
            height:45px;
            border:none;
            border-radius:8px;
            background:#2563eb;
            color:#fff;
            cursor:pointer;
            font-size:16px;
        }

        .btn:hover{
            background:#1d4ed8;
        }

        .alert-danger{
            background:#fee2e2;
            color:#b91c1c;
            padding:10px;
            border-radius:8px;
            margin-bottom:15px;
        }

        .alert-success{
            background:#dcfce7;
            color:#166534;
            padding:10px;
            border-radius:8px;
            margin-bottom:15px;
        }

        .login-link{
            text-align:center;
            margin-top:20px;
        }

        .login-link a{
            color:#2563eb;
            text-decoration:none;
            font-weight:bold;
        }

    </style>
</head>
<body>

<div class="container">

    <div class="logo">
        <img src="<?= base_url('assets/logo.png') ?>" alt="Logo">
    </div>

    <h1>Register</h1>

    <?php if($this->session->flashdata('error')) : ?>
        <div class="alert-danger">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?= validation_errors(
        '<div class="alert-danger">',
        '</div>'
    ); ?>

    <form action="<?= site_url('auth/process_register') ?>" method="post">

        <div class="input-box">
            <input type="text"
                   name="nama"
                   placeholder="Nama Lengkap"
                   value="<?= set_value('nama'); ?>"
                   required>

            <i class="fa-solid fa-user"></i>
        </div>

        <div class="input-box">
            <input type="email"
                   name="email"
                   placeholder="Email"
                   value="<?= set_value('email'); ?>"
                   required>

            <i class="fa-solid fa-envelope"></i>
        </div>

        <div class="input-box">
            <input type="text"
                   name="nik"
                   placeholder="NIK"
                   value="<?= set_value('nik'); ?>"
                   required>

            <i class="fa-solid fa-id-card"></i>
        </div>

        <div class="input-box">
            <input type="text"
                   name="telepon"
                   placeholder="Nomor Telepon"
                   value="<?= set_value('telepon'); ?>"
                   required>

            <i class="fa-solid fa-phone"></i>
        </div>

        <div class="input-box">
            <textarea name="alamat"
                      placeholder="Alamat Lengkap"
                      required><?= set_value('alamat'); ?></textarea>

            <i class="fa-solid fa-location-dot textarea-icon"></i>
        </div>

        <div class="input-box">
            <input type="password"
                   name="password"
                   placeholder="Password"
                   required>

            <i class="fa-solid fa-lock"></i>
        </div>

        <div class="input-box">
            <input type="password"
                   name="password2"
                   placeholder="Konfirmasi Password"
                   required>

            <i class="fa-solid fa-lock"></i>
        </div>

        <button type="submit" class="btn">
            Register
        </button>

    </form>

    <div class="login-link">

        Sudah punya akun?

        <a href="<?= site_url('auth') ?>">
            Login
        </a>

    </div>

</div>

</body>
</html>