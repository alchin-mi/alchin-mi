<? $title = 'Список задач'; ?>
<? ob_start() ?>
    <table class="table table-striped">
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
            </tr>
        </thead>
        <tbody>
            <? foreach ($data['tasks'] as $row): ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['text'] ?></td>
                    <td><?= $row['updated'] ?></td>
                    <td><?= $row['status'] ?></td>
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
<?php $content = ob_get_clean() ?>

<? require 'layout.php' ?>