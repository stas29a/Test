<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 18.01.16
 * Time: 23:44
 */

namespace Application\Services\Storage;


use Application\BaseFactory;
use Application\Interfaces\Entity;

class Storage implements \Application\Interfaces\Storage
{
    protected $currentStorageType = 'SQL';
    protected $pdo;

    public function __construct(\PDO $PDO)
    {
        $this->pdo = $PDO;
    }

    public function getRepository($entityName)
    {
        $className = str_replace('Entities', 'Repositories', $entityName);
        $repository = BaseFactory::getInstance($className);

        return $repository;
    }

    public function save(Entity $entity)
    {
        $table = $entity->getNamespace();
        $data = $entity->toArray();
        $columns = array_keys($data);
        $bindValues = [];

        foreach($columns as $column)
            $bindValues[":$column"] = $data[$column];

        $stmt = $this->pdo->prepare("insert into $table(". implode(',', $columns).") values(". implode(',', array_keys($bindValues)) .")");

        $stmt->execute($bindValues);
    }
}