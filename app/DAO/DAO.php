<?php

namespace App\DAO;

use \PDO;
use App\Models\AbstractModel;

abstract class DAO {

    /**
     * @var PDO
     */
    private $pdo;

    /**
     * DAO constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return PDO
     */
    protected function getPDO()
    {
        return $this->pdo;
    }

    /**
     * @param array $row
     * @return AbstractModel
     */
    abstract function buildDomainObject(array $row);
}