<?php


namespace App\Models;

use PDO;
use Voodoo\Paginator;

class IndexModel extends BaseModel
{
    public function getAllTasks (): array
    {
        $totalItems = $this->getCountTasks();
        $paginator = $this->setPaginator($totalItems);

        $limit = $_SESSION['limit'];
        $offset = $paginator->getStart();

        $sort = $this->getSort();

        $result = $this->getConnect()->query("SELECT * FROM tasks ORDER BY {$sort} LIMIT {$offset}, {$limit}");

        $tasks = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $tasks[] = $row;
        }

        $this->closeConnection();

        return ['paginator' => $paginator, 'tasks' => $tasks];
    }

    private function getCountTasks (): array
    {
        $result = $this->getConnect()->query('SELECT COUNT(*) as total FROM tasks');
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    private function setPaginator (array $totalItems): Paginator
    {
        $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'].'/';

        return $paginator = (new Paginator)
            ->setUrl($url, PATTERN)
            ->setItems($totalItems['total'], $_SESSION['limit'])
            ->setPage((int) isset($_GET['page']) ? $_GET['page'] : 1);
    }

    private function getSort (): string
    {
        switch ($_SESSION['sort']) {
            case 8: return 'status DESC';
            case 7: return 'status';
            case 6: return 'updated DESC';
            case 5: return 'updated';
            case 4: return 'email DESC';
            case 3: return 'email';
            case 2: return 'name DESC';
            default: return 'name';
        }
    }
}