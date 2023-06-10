<?php include(ROOT . '/views/layouts/header.php'); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <div class="signup-form"><!--sign up form-->
                    <div class="login-form"><!--login form-->
                        <h2>Вход в аккаунт</h2>
                        <form action="" method="post">
                            <input type="email" name="email" value="<?= $email ?>"
                                   placeholder=" Адрес электронной почты">
                            <input type="password" name="password" placeholder="Пароль">
                            <input type="submit" name="log_in" value="Авторизоваться">
                        </form>
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <div class="text-danger text-center">
                                <ul style="padding: 0">
                                    <?php foreach ($errors as $error): ?>
                                        <li> - <?= $error ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!--/sign up form-->
                    <br>
                    <br>
                </div>
            </div>
        </div>
</section>

<?php include(ROOT . '/views/layouts/footer.php'); ?>
