<?php
//$layout = 'auth';
/** @var \App\Core\IAuthenticator $auth */
/** @var Array $data */
?>

<div class="container text-center">
<!--<div class="container-fluid">-->
    <div class="whitetext mt32">
        Welcome, <strong><?= $auth->getLoggedUserName() ?></strong>!<br><br>
    </div>
    <form method="post" action="?c=user&a=changePassword">
        <div class="div_form">
            <div class="row">
                <div class="col col-min-width-128">
                    <input class="form-control mt32" type="password" name="oldpassword" placeholder="current password" maxlength="64" required>
                </div>
                <div class="col col-min-width-128">
                    <input class="form-control mt32" type="password" name="newpassword" placeholder="new password" maxlength="64" required>
                </div>
                <div class="col col-min-width-128">
                    <button class="btn blueButton whitetext mt32" type="submit">Change password</button>
                </div>
            </div>
            <p class="<?php echo (@$data['message'] === 'Password changed successfully.')?'okMessage':'warningMessage';?> text-center mt32"><?= @$data['message'] ?></p>
        </div>
    </form>
    <div class="whitetext text-center">
        <a class="btn brownButton whitetext mt32" href="?c=auth&a=delete">Delete account</a>
    </div>
</div>