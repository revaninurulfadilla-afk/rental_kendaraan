<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Rental Kendaraan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: linear-gradient(to right, #ff758c, #ff7eb3);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        .login-box{
            width: 400px;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }

        .login-title{
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
            color: #ff4f81;
        }

        .form-control{
            border-radius: 10px;
            height: 45px;
        }

        .btn-login{
            background: #ff4f81;
            color: white;
            width: 100%;
            border-radius: 10px;
            height: 45px;
            border: none;
        }

        .btn-login:hover{
            background: #ff2e6d;
        }

        .register{
            text-align: center;
            margin-top: 15px;
        }

    </style>

</head>
<body>

    <div class="login-box">

        <h2 class="login-title">
            Login
        </h2>

        <form action="<?= site_url('auth/login') ?>" method="post">

            <div class="mb-3">
                <input 
                    type="email" 
                    name="email" 
                    class="form-control"
                    placeholder="Masukkan Email"
                    required
                >
            </div>

            <div class="mb-3">
                <input 
                    type="password" 
                    name="password" 
                    class="form-control"
                    placeholder="Masukkan Password"
                    required
                >
            </div>

            <button type="submit" class="btn-login">
                Login
            </button>

        </form>

        <div class="register">
            Belum punya akun?
            <a href="<?= base_url('auth/register') ?>">
                Register
            </a>
        </div>

    </div>

</body>
</html>