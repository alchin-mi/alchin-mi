<? $title = 'Форма для создания задачи'; ?>
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
            <label for="name" class="form-label">Имя</label>
            <input name="name" type="name" class="form-control" id="name" placeholder="Ведите имя"
                   value="<?= !$valid ? $name : '' ?>">
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="Ведите email"
                   value="<?= !$valid ? $email : '' ?>">
        </div>
        <div class="col-12">
            <label for="text" class="form-label">Текст</label>
            <textarea name="text" class="form-control" id="text" placeholder="Пример задачи"><?if(!$valid) echo $test;?></textarea>
        </div>
        <div class="col-12">
            <input type="submit" class="btn btn-primary"
                   value="Создать">
        </div>
    </form>
<? $content = ob_get_clean() ?>
<? require 'layout.php' ?>