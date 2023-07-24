<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<!--    --><?php //debug($_POST);die; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card mt-5 ">
                <?php if (!empty($_SESSION['error'])): ?>
                    <div class="alert mt-5 mx-3 alert-danger"><?=$_SESSION['error']?></div>
                <?php endif; ?>
<!--                --><?php //unset($_SESSION['error']) ?>
                <h3 class="text-center my-4">Ro'yhatdan o'tish</h3>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-floating mb-3">
                            <input value="<?=!empty($username1) ? $username1 : ''?>" type="text" class="form-control" name="username" id="username">
                            <label for="username">Username</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input value="<?=!empty($password1) ? $password1 : ''?>" type="password" class="form-control" name="password" id="password" placeholder="Password">
                            <label for="password">Password</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input value="<?=!empty($confirm) ? $confirm : ''?>" type="password" class="form-control" name="confirm" id="confirm" placeholder="confirm">
                            <label for="confirm">Parolni tasdiqlash</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input value="<?=!empty($phone) ? $phone : ''?>" type="tel" class="form-control" name="phone" id="Telefon">
                            <label for="tel">Telefon</label>
                        </div>
                        <button class="btn btn-primary my-3 p-2 w-100">Kirish</button>
                        <p>Agar akkauntingiz mavjud bo'la  <a href="/user/login">kirish</a> </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>