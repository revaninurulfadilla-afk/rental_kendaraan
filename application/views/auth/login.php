<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Register</title>

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
            position:relative;
            width:850px;
            height:550px;
            background:#fff;
            border-radius:30px;
            overflow:hidden;
            box-shadow:0 0 30px rgba(0,0,0,.2);
        }

        .form-box{
            position:absolute;
            width:50%;
            height:100%;
            background:#fff;
            display:flex;
            align-items:center;
            text-align:center;
            padding:40px;
            transition:.6s ease-in-out;
            z-index: 2;
        }

        .form-box.login{
            right:0;
        }

        .form-box.register{
            left:-50%;
            opacity:0;
            visibility:hidden;
        }

        .container.active .form-box.login{
            right:-50%;
        }

        .container.active .form-box.register{
            left:0;
            opacity:1;
            visibility:visible;
        }

        form{
            width:100%;
        }

        h1{
            margin-bottom:20px;
            color:#2563eb;
        }

        .input-box{
            position:relative;
            margin:20px 0;
        }

        .input-box input{
            width:100%;
            padding:13px 50px 13px 20px;
            border:none;
            background:#eff6ff;
            border-radius:8px;
            outline:none;
        }

        .input-box i{
            position:absolute;
            right:20px;
            top:50%;
            transform:translateY(-50%);
            color:#999;
        }

        .btn{
            width:100%;
            height:45px;
            border:none;
            border-radius:8px;
            background:#2563eb;
            color:#fff;
            font-size:16px;
            cursor:pointer;
            transition:0.3s;
        }
        .btn:hover{
            background:#1d4ed8;
        }

        .toggle-box{
            position:absolute;
            width:100%;
            height:100%;
        }

        .toggle-box::before{
            content:'';
            position:absolute;
            left:-250%;
            width:300%;
            height:100%;
            background:#60a5fa;
            border-radius:150px;
            transition:1s ease-in-out;
        }

        .container.active .toggle-box::before{
            left:50%;
        }

        .toggle-panel{
            position:absolute;
            width:50%;
            height:100%;
            color:#fff;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            z-index:2;
            transition:.6s ease-in-out;
        }

        .toggle-left{
            left:0;
        }

        .toggle-right{
            right:-50%;
        }

        .container.active .toggle-left{
            left:-50%;
        }

        .container.active .toggle-right{
            right:0;
        }

        .toggle-panel p{
            margin:20px 0;
        }

        .toggle-panel button{
            width:160px;
            height:46px;
            border:2px solid #fff;
            background:transparent;
            color:#fff;
            border-radius:8px;
            cursor:pointer;
        }
        .toggle-panel h2{
            margin-top:20px;
            color:white;
        }

    </style>

</head>
<body>

<div class="container">

    <!-- LOGIN -->
    <div class="form-box login">

        <form action="<?= base_url('index.php/auth/login') ?>" method="post">
            <h1>Login</h1>

            <div class="input-box">
                <input type="email" name="email"
                placeholder="Email" required>

                <i class="fa-solid fa-envelope"></i>
            </div>

            <div class="input-box">
                <input type="password" name="password"
                placeholder="Password" required>

                <i class="fa-solid fa-lock"></i>
            </div>

            <button type="submit" class="btn">
                Login
            </button>

        </form>

    </div>

    <!-- REGISTER -->
    <div class="form-box register">

        <form action="<?= site_url('auth/login') ?>" method="post">
            <h1>Register</h1>

            <div class="input-box">
                <input type="text" name="nama"
                placeholder="Nama Lengkap" required>

                <i class="fa-solid fa-user"></i>
            </div>

            <div class="input-box">
                <input type="email" name="email"
                placeholder="Email" required>

                <i class="fa-solid fa-envelope"></i>
            </div>

            <div class="input-box">
                <input type="password" name="password"
                placeholder="Password" required>

                <i class="fa-solid fa-lock"></i>
            </div>

            <button type="submit" class="btn">
                Register
            </button>

        </form>

    </div>

    <!-- PANEL -->
    <div class="toggle-box">

        <div class="toggle-panel toggle-left">

            <img src="<?= base_url('assets/logo.png') ?>"width="180">
            <h2>Sistem Rental Kendaraan</h2>

            <p>Belum punya akun?</p>

            <button class="register-btn">
                Register
            </button>

        </div>

        <div class="toggle-panel toggle-right">

            <img src="<?= base_url('assets/logo.png') ?>"width="180">
            <h2>Sistem Rental Kendaraan</h2>

            <p>Sudah punya akun?</p>

            <button class="login-btn">
                Login
            </button>

        </div>

    </div>

</div>

<script>

    const container = document.querySelector('.container');
    const registerBtn = document.querySelector('.register-btn');
    const loginBtn = document.querySelector('.login-btn');

    registerBtn.addEventListener('click', () => {
        container.classList.add('active');
    });

    loginBtn.addEventListener('click', () => {
        container.classList.remove('active');
    });

</script>

</body>
</html>
