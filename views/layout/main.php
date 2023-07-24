<?php
if (!empty($_SESSION['user_id'])){
    $user = new \models\User();
    $userItem = $user->getById($_SESSION['user_id']);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="/site/index">My framework</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/product/all">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/student/all">Studentlar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/subject/all">Kurslar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/teacher/all">O'qituvchilar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/fan/all">Fanlar</a>
                </li>
            </ul>
        </div>
        <a href="/user/logout" class="btn btn-danger">Chiqish </a>
    </div>
</nav>