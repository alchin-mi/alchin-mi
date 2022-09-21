<? if ($editSuccess === true): ?>
    <div class="alert alert-success" role="alert">
        Задача успешно отредактирована!
    </div>
<? elseif ($valid instanceof Exception): ?>
    <div class="alert alert-warning" role="alert">
        <?= $valid->getMessage() ?>
    </div>
    <? $valid = false; ?>
<? endif ?>
<form class="row g-3" method="post">
    <input type="hidden" name="id" value="<?= $task['id'] ?>">
    <input type="hidden" name="oldText" value="<?= $task['text'] ?>">
    <div class="col-md-6">
        <label for="name" class="form-label">Имя</label>
        <input name="name" type="name" class="form-control" id="name" placeholder="Ведите имя"
               value="<?= $task['name'] ?>">
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input name="email" type="email" class="form-control" id="email" placeholder="Ведите email"
               value="<?= $task['email'] ?>">
    </div>
    <div class="col-12">
        <label for="text" class="form-label">Текст</label>
        <textarea name="text" class="form-control" id="text" placeholder="Пример задачи"><?= $task['text'] ?></textarea>
    </div>
    <div class="col-6">
        <div class="form-check">
            <input name="status" class="form-check-input" type="checkbox" value=1
                   id="status"<?= $task['status'] ? ' checked' : '' ?>>
            <label class="form-check-label" for="status">
                Задача выполнена
            </label>
        </div>
    </div>
    <div class="col-6">
        <input type="submit" class="btn btn-primary"
               value="Редактировать">
    </div>
</form>