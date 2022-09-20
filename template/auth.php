<? $title = 'Форма авторизации'; ?>
<? ob_start() ?>
<? if ($valid instanceof Exception): ?>
    <div class="alert alert-warning" role="alert">
        <?= $valid->getMessage() ?>
    </div>
    <? $valid = false; ?>
<? elseif ($valid === true && !$loginSuccess): ?>
    <div class="alert alert-warning" role="alert">
        Пользователь с таким логином и паролем не существует
    </div>
    <? $valid = false; ?>
<? endif ?>
    <form class="row g-3" action="auth" method="post">
        <div class="col-md-6">
            <label for="login" class="form-label">Логин</label>
            <input name="login" type="name" class="form-control" id="login" placeholder="Ведите логин"
                   value="<?= !$valid ? $_POST['login'] : '' ?>">
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="Ведите пароль"
                   value="<?= !$valid ? $_POST['password'] : '' ?>">
        </div>
        <div class="col-12">
            <input type="submit" class="btn btn-primary"
                   value="Создать">
        </div>
    </form>
<? $content = ob_get_clean() ?>
<? require 'layout.php' ?>