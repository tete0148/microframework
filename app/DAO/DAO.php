<?php

namespace App\DAO;

use \PDO;
use App\Models\AbstractModel;
use Slim\Container;

abstract class DAO {

    /**
     * @var PDO
     */
    private $pdo;
    /**
     * @var Container
     */
    private $container;

    /**
     * DAO constructor.
     * @param Container $container
     * @param PDO $pdo
     */
    public function __construct(Container $container, PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->container = $container;
    }

    /**
     * @return PDO
     */
    protected function getPDO()
    {
        return $this->pdo;
    }

    protected function getContainer()
    {
        return $this->container;
    }

    /**
     * @param array $row
     * @return AbstractModel
     */
    abstract public function buildDomainObject(array $row);
}