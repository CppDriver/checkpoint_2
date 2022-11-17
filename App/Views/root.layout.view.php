<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/css/style.css">
    <title>checkpoint_2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="?c=home">About game</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=home&a=rules">Rules</a>
                </li>
                <li class="nav-item justify-content-end">
                </li>
            </ul>
            <?php if ($auth->isLogged()) { ?>
            <span class="navbar-text ms-auto">
                <a class="btn greenButton mr8" role="button" href="?c=user"><?= $auth->getLoggedUserName() ?></a>
            </span>
            <span class="navbar-text">
                <a class="btn brownButton" role="button" href="?c=auth&a=logout">Logout</a>
            </span>
            <?php } else { ?>
            <span class="navbar-text ms-auto">
                <a class="btn greenButton mr8" role="button" href="?c=auth&a=login#login">Login</a>
            </span>
            <span class="navbar-text">
                <a class="btn blueButton" role="button" href="?c=auth&a=login#regist">Register</a>
            </span>
            <?php } ?>
        </div>
    </div>
</nav>
<div class="web-content">
    <?= $contentHTML ?>
</div>
</body>
</html>