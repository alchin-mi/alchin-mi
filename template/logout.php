<? $title = 'Форма авторизации'; ?>
<? ob_start() ?>
    <? if ($loginSuccess): ?>
        <div class="alert alert-success" role="alert">
            Вы успешно авторизовались!
        </div>
    <? endif; ?>
    <form class="row g-3" action="auth" method="post">
        <div class="col-12 gy-5">
            <input type="hidden" name="logout" value="1">
            <input type="submit" class="btn btn-primary"
                   value="Выйти">
        </div>
    </form>
<? $content = ob_get_clean() ?>
<? require 'layout.php' ?>