<?php
declare(strict_types=1);

namespace App\Core;

use PDO;
use App\Repositories\CourseRepository;

class Container
{
    private array $receipts = [];
    private array $instances = [];

    /*public function __construct()
    {
        $this->receipts = [
            'courseRepository' => function() {
                return new CourseRepository(
                    $this->make("pdo")
                );
            },
            'pdo' => function() {
                $pdo = new PDO(
                    'mysql:host=localhost;dbname=coursemanagement;charset=utf8',
                    'thomas',
                    'thomas'
                );
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

                return $pdo;
            }
        ];
    }

    public function make($name)
    {
        if (!empty($this->instances[$name]))
        {
            return $this->instances[$name];
        }
        if (isset($this->receipts[$name]))
        {
            $this->instances[$name] = $this->receipts[$name];
        }
        return $this->instances[$name];
    }*/
    public $pdo;
    public $courseRepository;
    public function getPdo()
    {
        $this->pdo = new PDO(
            'mysql:host=localhost;dbname=coursemanagement;charset=utf8',
            'thomas',
            'thomas'
        );
        $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        return $this->pdo;
    }

    public function getCourseRepository()
    {
        return new CourseRepository(
            $this->getPdo()
        );
    }
}
