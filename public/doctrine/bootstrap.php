<?php

require_once(__DIR__ . '/../../vendor/autoload.php');

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DoctrineFactory
{

    private $paths;
    private $isDevMode = false;

    private $dbParams;

    private $em;

    public function __construct()
    {
        $this->paths = array(__DIR__ . '/entitys');
        $this->dbParams = include(__DIR__ . '/config/dbParams.php');
    }


    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        if ($this->em === null) {
            $config = Setup::createAnnotationMetadataConfiguration($this->paths, $this->isDevMode);
            $this->em = EntityManager::create($this->dbParams, $config);
        }

        return $this->em;
    }

    public function getConnection()
    {
        return $this->getEntityManager()->getConnection();
    }

    public function createQueryBuilder()
    {
        return $this->getConnection()->createQueryBuilder();
    }
}