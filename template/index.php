<? use App\Services\SimpleAuth\Auth; ?>

<? if (count($data['tasks']) > 0): ?>
    <table class="table">
        <thead>
        <tr>
            <th>Имя&nbsp;
                <a class="text-<?= $sort == 1 || $sort == 2 ? 'primary' : 'info' ?>"
                   href="?<?= $this->getSortUrl($sort == 1 ? 2 : 1) ?>">
                    <i class="fa fa-sort-<?= $sort != 2 ? 'down' : 'up' ?>"></i>
                </a>
            </th>
            <th>Email&nbsp;
                <a class="text-<?= $sort == 3 || $sort == 4 ? 'primary' : 'info' ?>"
                   href="?<?= $this->getSortUrl($sort == 3 ? 4 : 3) ?>">
                    <i class="fa fa-sort-<?= $sort != 4 ? 'down' : 'up' ?>"></i>
                </a>
            </th>
            <th>Текст</th>
            <th>Обновлено&nbsp;
                <a class="text-<?= $sort == 5 || $sort == 6 ? 'primary' : 'info' ?>"
                   href="?<?= $this->getSortUrl($sort == 5 ? 6 : 5) ?>">
                    <i class="fa fa-sort-<?= $sort != 6 ? 'down' : 'up' ?>"></i>
                </a>
            </th>
            <th>Статус&nbsp;
                <a class="text-<?= $sort == 7 || $sort == 8 ? 'primary' : 'info' ?>"
                   href="?<?= $this->getSortUrl($sort == 7 ? 8 : 7) ?>">

                    <i class="fa fa-sort-<?= $sort != 8 ? 'down' : 'up' ?>"></i>
                </a>
            </th>
            <? if (Auth::getCurrentUser()['login'] === 'admin'): ?>
                <th>&nbsp;</th>
            <? endif; ?>
        </tr>
        </thead>
        <tbody>
        <? foreach ($data['tasks'] as $row): ?>
            <tr class="align-middle<?= $row['status'] ? ' table-success' : '' ?>">
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['text'] ?></td>
                <td><?= $row['updated'] ?></td>
                <td>
                    <?= $row['status'] ? 'Выполнена' : 'Не готова' ?>
                    <?= $row['moderated'] ? '<br/>Модерировано' : '' ?>
                </td>
                <? if (Auth::getCurrentUser()['login'] === 'admin'): ?>
                    <td>
                        <a href="/edit?id=<?= $row['id'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                        </a>
                    </td>
                <? endif; ?>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>
    <div class="btn-toolbar mb-3">
        <div class="btn-group mr-2">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?= $pagination ?>
                </ul>
            </nav>
        </div>
        <div class="btn-group mr-2">
            <div class="dropdown">
                <a class="btn btn-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                    Показать по <?= (int) $_SESSION['limit'] ?: 3 ?>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="?limit=3">3</a>
                    <a class="dropdown-item" href="?limit=5">5</a>
                    <a class="dropdown-item" href="?limit=10">10</a>
                </div>
            </div>
        </div>
    </div>
<? else: ?>
    <div class="alert alert-warning" role="alert">Задачи отсутствуют</div>
<? endif;?>