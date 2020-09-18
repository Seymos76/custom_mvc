<?php


namespace App\Infra\EntityManager;


use App\Config\Database;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping;
use Doctrine\ORM\NativeQuery;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\PessimisticLockException;
use Doctrine\ORM\Query;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\UnitOfWork;
use Doctrine\Persistence\Mapping\ClassMetadataFactory;
use Doctrine\Persistence\ObjectRepository;

/**
 * @method Mapping\ClassMetadata getClassMetadata($className)
 */
class EntityManager implements EntityManagerInterface
{
    protected bool $isDevMode = true;

    protected $proxyDir = null;

    protected $cache = null;

    protected $config;

    protected $database;

    protected array $connexion;

    public function __construct()
    {
        $this->database = Database::getConnexion();
    }

    public function init(): \Doctrine\ORM\EntityManager
    {
        $this->config = Setup::createYAMLMetadataConfiguration([__DIR__."/../../../config/orm"], $this->isDevMode);
        $this->connexion = [
            'driver' => 'pdo_mysql',
            'user' => Database::DB_USER,
            'password' => Database::DB_PASS,
            'host' => Database::DB_HOST,
            'dbname' => Database::DB_NAME
        ];
        return \Doctrine\ORM\EntityManager::create($this->connexion, $this->config);
    }

    public function getCache()
    {
        // TODO: Implement getCache() method.
    }

    public function getConnection()
    {
        return $this->database;
    }

    public function getExpressionBuilder()
    {
        // TODO: Implement getExpressionBuilder() method.
    }

    public function beginTransaction()
    {
        // TODO: Implement beginTransaction() method.
    }

    public function transactional($func)
    {
        // TODO: Implement transactional() method.
    }

    public function commit()
    {
        // TODO: Implement commit() method.
    }

    public function rollback()
    {
        // TODO: Implement rollback() method.
    }

    public function createQuery($dql = '')
    {
        // TODO: Implement createQuery() method.
    }

    public function createNamedQuery($name)
    {
        // TODO: Implement createNamedQuery() method.
    }

    public function createNativeQuery($sql, ResultSetMapping $rsm)
    {
        // TODO: Implement createNativeQuery() method.
    }

    public function createNamedNativeQuery($name)
    {
        // TODO: Implement createNamedNativeQuery() method.
    }

    public function createQueryBuilder()
    {
        // TODO: Implement createQueryBuilder() method.
    }

    public function getReference($entityName, $id)
    {
        // TODO: Implement getReference() method.
    }

    public function getPartialReference($entityName, $identifier)
    {
        // TODO: Implement getPartialReference() method.
    }

    public function close()
    {
        // TODO: Implement close() method.
    }

    public function copy($entity, $deep = false)
    {
        // TODO: Implement copy() method.
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        // TODO: Implement lock() method.
    }

    public function getEventManager()
    {
        // TODO: Implement getEventManager() method.
    }

    public function getConfiguration()
    {
        // TODO: Implement getConfiguration() method.
    }

    public function isOpen()
    {
        // TODO: Implement isOpen() method.
    }

    public function getUnitOfWork()
    {
        // TODO: Implement getUnitOfWork() method.
    }

    public function getHydrator($hydrationMode)
    {
        // TODO: Implement getHydrator() method.
    }

    public function newHydrator($hydrationMode)
    {
        // TODO: Implement newHydrator() method.
    }

    public function getProxyFactory()
    {
        // TODO: Implement getProxyFactory() method.
    }

    public function getFilters()
    {
        // TODO: Implement getFilters() method.
    }

    public function isFiltersStateClean()
    {
        // TODO: Implement isFiltersStateClean() method.
    }

    public function hasFilters()
    {
        // TODO: Implement hasFilters() method.
    }

    public function find($className, $id)
    {
        // TODO: Implement find() method.
    }

    public function persist($object)
    {
        // TODO: Implement persist() method.
    }

    public function remove($object)
    {
        // TODO: Implement remove() method.
    }

    public function merge($object)
    {
        // TODO: Implement merge() method.
    }

    public function clear($objectName = null)
    {
        // TODO: Implement clear() method.
    }

    public function detach($object)
    {
        // TODO: Implement detach() method.
    }

    public function refresh($object)
    {
        // TODO: Implement refresh() method.
    }

    public function flush()
    {
        // TODO: Implement flush() method.
    }

    public function getRepository($className)
    {
        // TODO: Implement getRepository() method.
    }

    public function getMetadataFactory()
    {
        // TODO: Implement getMetadataFactory() method.
    }

    public function initializeObject($obj)
    {
        // TODO: Implement initializeObject() method.
    }

    public function contains($object)
    {
        // TODO: Implement contains() method.
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement @method Mapping\ClassMetadata getClassMetadata($className)
    }
}