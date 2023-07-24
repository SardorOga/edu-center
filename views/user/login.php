<?php
session_start();
?>
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card mt-5 ">
                <?php if (!empty($_SESSION['error'])): ?>
                    <div class="alert mt-5 mx-3 alert-danger"><?=$_SESSION['error']?></div>
                <?php endif; ?>
                <?php if (!empty(  $_SESSION['success'])): ?>
                    <div class="alert mt-5 mx-3 alert-success"><?=$_SESSION['success']?></div>
                <?php endif; ?>
                <?php
                unset($_SESSION['error']);
                unset($_SESSION['success']);
                ?>
                <h3 class="text-center my-4">Kirish</h3>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-floating mb-3">
                            <input value="<?=!empty($username1) ? $username1 : ''?>" type="text" class="form-control" name="username" id="floatingInput">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating">
                            <input value="<?=!empty($password1) ? $password1 : ''?>" type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Parol</label>
                        </div>
                        <button class="btn btn-primary my-3 p-2 w-100">Kirish</button>
                        <p>Agar ro'yhatdan o'tgan bolmasangiz <a href="/user/register">ro'yhatdan o'tish</a> </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>