<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class InitialProject extends AbstractMigration
{
    public function up(): void
    {
        $tasks = $this->table('tasks');
        $tasks->addColumn('name', 'string', ['limit' => 255])
                ->addColumn('text', 'text', ['null' => true])
                ->addColumn('email', 'string', ['limit' => 255])
                ->addColumn('status', 'integer', ['limit' => 2, 'default' => 0])
                ->addColumn('moderated', 'integer', ['limit' => 2, 'default' => 0])
                ->addColumn('created', 'datetime')
                ->addColumn('updated', 'timestamp', ['default' => 'CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'])
                ->create();

        $users = $this->table('users');
        $users->addColumn('name', 'string', ['limit' => 255])
                ->addColumn('login', 'string', ['limit' => 255])
                ->addColumn('password', 'string', ['limit' => 40])
                ->addColumn('email', 'string', ['limit' => 255])
                ->addColumn('created', 'datetime')
                ->addColumn('updated', 'timestamp', ['default' => 'CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'])
                ->create();

        if ($this->isMigratingUp()) {
            $tasks->insert(['id' => 1, 'name' => 'Август', 'text' => 'Подойти к машине', 'email' => 'august@promrukav.ru', 'created' => '2022-09-19 18:06:07', 'updated' => '2022-09-19 18:06:07'])->saveData();
            $tasks->insert(['id' => 2, 'name' => 'Венера', 'text' => 'Сесть в машину', 'email' => 'venera@promrukav.ru', 'created' => '2022-09-19 18:05:07', 'updated' => '2022-09-19 18:05:07'])->saveData();
            $tasks->insert(['id' => 3, 'name' => 'Борис', 'text' => 'Завести машину', 'email' => 'boris@promrukav.ru', 'created' => '2022-09-19 18:04:07', 'updated' => '2022-09-19 18:04:07'])->saveData();
            $tasks->insert(['id' => 4, 'name' => 'Герман', 'text' => 'Поехать на рынок', 'email' => 'german@promrukav.ru', 'created' => '2022-09-19 18:03:07', 'updated' => '2022-09-19 18:03:07'])->saveData();
            $tasks->insert(['id' => 5, 'name' => 'Дарья', 'text' => 'Найти дерево', 'email' => 'darya@promrukav.ru', 'created' => '2022-09-19 18:02:07', 'updated' => '2022-09-19 18:02:07'])->saveData();
            $tasks->insert(['id' => 6, 'name' => 'Елена', 'text' => 'Купить дерево', 'email' => 'elena@promrukav.ru', 'created' => '2022-09-19 18:01:07', 'updated' => '2022-09-19 18:01:07'])->saveData();
            $tasks->insert(['id' => 7, 'name' => 'Жанна', 'text' => 'Поехать в парк', 'email' => 'zhanna@promrukav.ru', 'created' => '2022-09-19 18:00:07', 'updated' => '2022-09-19 18:00:07'])->saveData();
            $tasks->insert(['id' => 8, 'name' => 'Злата', 'text' => 'Посадить дерево', 'email' => 'zlata@promrukav.ru', 'created' => '2022-09-19 17:59:07', 'updated' => '2022-09-19 17:59:07'])->saveData();
            $tasks->insert(['id' => 9, 'name' => 'Иван', 'text' => 'Полить дерево', 'email' => 'ivan@promrukav.ru', 'created' => '2022-09-19 17:58:07', 'updated' => '2022-09-19 17:58:07'])->saveData();
            $tasks->insert(['id' => 10, 'name' => 'Кира', 'text' => 'Ухаживать за деревом', 'email' => 'kira@promrukav.ru', 'created' => '2022-09-19 17:57:07', 'updated' => '2022-09-19 17:57:07'])->saveData();
            $tasks->insert(['id' => 11, 'name' => 'Лев', 'text' => 'Любоваться деревом', 'email' => 'lev@promrukav.ru', 'created' => '2022-09-19 17:56:07', 'updated' => '2022-09-19 17:56:07'])->saveData();
            $tasks->insert(['id' => 12, 'name' => 'Марта', 'text' => 'Улучшить мир', 'email' => 'marta@promrukav.ru', 'created' => '2022-09-19 17:55:07', 'updated' => '2022-09-19 17:55:07'])->saveData();

            $users->insert([
                    'id' => 1, 'name' => 'Администратор', 'login' => 'admin', 'password' => '202cb962ac59075b964b07152d234b70', 'email' => 'admin@promrukav.ru', 'created' => '2022-09-19 17:55:07', 'updated' => '2022-09-19 17:55:07'
            ])->save();
        }

    }

    public function down () {
        $sql = "DROP TABLE `tasks`, `users`;";
        $this->execute($sql);
    }
}
