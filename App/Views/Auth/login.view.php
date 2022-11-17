<?php
$layout = 'auth';
/** @var Array $data */
?>
<div class="jumbotron d-flex align-items-center min-vh-100">
    <div class="container rounded-4" id="loginContainer">
        <ul class="nav nav-tabs nav-justified rounded-top" role="tablist">
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#regist">Register</a>
            </li>
        </ul>
        <div class="tab-content">
                <!-- Login form.</p>-->
            <div id="login" class="container tab-pane">
                <form method="post">
                    <input type="hidden" name="form" value="login">
                    <div class="div_form">
                        <label class="loglabel whitetext" for="nick">username:</label>
                        <input id="nick" class="form-control" name="username" placeholder="enter username" maxlength="64" required>
                    </div>
                    <div class="div_form">
                        <label class="loglabel whitetext">password:</label>
                        <input type="password" class="form-control" name="passwd" placeholder="enter password" maxlength="64" required>
                        <p class="warningMessage text-center"><?= @$data['message'] ?></p>
                        <button type="submit" name="submit" class="btn greenButton centeredButton whitetext mt32 mb16">Log in</button>
                    </div>
                </form>
            </div>
                <!-- Registration form.-->
            <div id="regist" class="container tab-pane">
<!--                <form onSubmit={signUp} onsubmit="" method="post">-->
                <form onsubmit="return validateRegistration()" method="post">
                    <input type="hidden" name="form" value="registration">
                    <div class="div_form">
                        <div class="row">
                            <div class="col col-min-width-128">
                                <label class="loglabel whitetext">name:</label>
                                <input id="first_name" class="form-control" name="first_name" placeholder="first name" maxlength="64">
                            </div>
                            <div class="col col-min-width-128">
                                <label class="loglabel whitetext">surname:</label>
                                <input id="surname" class="form-control" name="surname" placeholder="surname" maxlength="64">
                            </div>
                        </div>
                    </div>
                    <div class="div_form">
                        <label class="loglabel whitetext" for="email">e-mail:</label>
                        <input id="email" type="email" class="form-control" name="email" onkeyup="emailUsedCheck(this.value)" placeholder="enter your e-mail" maxlength="128">
                        <p id="emailMessage"></p>
                    </div>
                    <div class="div_form">
                        <label class="loglabel whitetext">username:</label>
                        <input id="username" class="form-control" name="username" onkeyup="usernameUsedCheck(this.value)" placeholder="choose your username" maxlength="64" required>
                        <p id="usernameMessage"></p>
                    </div>
                    <div class="div_form">
                        <label class="loglabel whitetext">password:</label>
                        <input id="pass1" type="password" class="form-control" name="passwd" onkeyup="passwordLength(this.value)" placeholder="choose your password" maxlength="64" required>
                        <p id="passwordLengthMessage" class="warningMessage text-center"></p>
                    </div>
                    <div class="div_form">
                        <label class="loglabel whitetext">repeat password:</label>
                        <input id="pass2" type="password" class="form-control" name="passwdcheck" onkeyup="comparePasswords(this.value)" placeholder="write password again" maxlength="64" required>
                        <p id="passwordRepeatMessage"></p>
                        <button id="regBut" type="submit" name="submit" class="btn blueButton centeredButton whitetext mt32 mb16">Create an account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
