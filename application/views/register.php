<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Studio12 | Register</title>

    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url();?>assets/studio12.png" />
    <link rel="stylesheet" href="<?=base_url();?>assets/register/css/style.css">
    <!-- Font Icon -->
    <link rel="stylesheet" href="<?=base_url();?>assets/register/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60vh;
            margin: 0;
            background: #f2f2f2;
        }
        .main {
            width: 100%;
            max-width: 600px;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 30px;
            padding: 20px;
        }
        .signup {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .signup-content {
            width: 100%;
            padding: 20px;
        }
        .form-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
            border-radius: 30px;
        }
        .form-input {
            width: 100%;
            height: 50px;
            line-height: 1.5;
            padding: 0px 25px;
            border: 1px solid #ddd;
            border-radius: 3px;
            box-sizing: border-box;
        }
        .form-submit {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #04AA6D;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .form-submit:hover {
            background: #666666;
        }
        .loginhere {
            text-align: center;
            margin-top: 20px;
        }
        .loginhere-link {
            color: #666666;
            text-decoration: none;
        }
        .loginhere-link:hover {
            text-decoration: underline;
            color: #04AA6D;
        }
    </style>

    <!-- Sweetalert -->
    <script src="<?= base_url() ?>node_modules/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

    <?php if ($this->session->flashdata('password_err')) { ?>
    <script>
        swal({
            title: "Error Password!",
            text: "Ketik Ulang Password!",
            icon: "error"
        });
    </script>
    <?php } ?>

    <div class="main">
        <section class="signup">
            <div class="signup-content">
                <form method="POST" id="signup-form" class="signup-form" action="<?= base_url();?>Register/proses">
                    <h2 class="form-title">Buat Akun</h2>
                    <div class="form-group">
                        <input type="text" class="form-input" name="username" id="username" placeholder="Your Username" required />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-input" name="email" id="email" placeholder="Your Email" required />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-input" name="password" id="password" placeholder="Password" required />
                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password" required />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Register" />
                    </div>
                </form>
                <p class="loginhere">
                    Sudah ada akun ? <a href="<?=base_url();?>Login/index" class="loginhere-link">Login disini</a>
                </p>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="<?=base_url();?>assets/register/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/register/js/main.js"></script>
</body>

</html>
