Установка
------------

* После скачивания репозитория локально подключите зависимости
```bash
composer install
```
* Создайте файл конфигурации. Это можно сделать переименовав файл `example.config.inc.php -> config.inc.php` в директории `/config` относительно корня, подставив в него нужные значения.
* Если зависимости подключились верно, инициализируйте файл для настройки [phinx](https://book.cakephp.org/phinx/0/en/install.html) командой 
```bash
php /vendor/bin/phinx init`
```
* Затем сконфигурируйте созданный файл `phinx.php` по примеру из файла `/example.phinx.php`
* Дальше накатите миграции 
```bash
php /vendor/bin/phinx migrate
```