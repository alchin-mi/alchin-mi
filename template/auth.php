<? $title = 'Форма авторизации'; ?>
<? ob_start() ?>
<? if ($addSuccess): ?>
    <div class="alert alert-success" role="alert">
        Задача успешно создана!
    </div>
<? elseif ($valid instanceof Exception): ?>
    <div class="alert alert-warning" role="alert">
        <?= $valid->getMessage() ?>
    </div>
    <? $valid = false; ?>
<? endif ?>
    <form class="row g-3" action="add" method="post">
        <div class="col-md-6">
            <label for="login" class="form-label">Логин</label>
            <input name="login" type="name" class="form-control" id="login" placeholder="Ведите логин"
                   value="<?= !$valid ? $name : '' ?>">
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="Ведите email"
                   value="<?= !$valid ? $email : '' ?>">
        </div>
        <div class="col-12">
            <input type="submit" class="btn btn-primary"
                   value="Создать">
        </div>
    </form>
<? $content = ob_get_clean() ?>
<? require 'layout.php' ?>