<?php


namespace App\Infra\Mapping;


use Doctrine\ORM\Mapping\Driver\SimplifiedXmlDriver;

class XMLMapping
{
    private SimplifiedXmlDriver $driver;

    public function __construct(array $namespaces)
    {
        $this->driver = new SimplifiedXmlDriver($namespaces);
        $this->driver->setGlobalBasename('User');
    }

    /**
     * @return SimplifiedXmlDriver
     */
    public function getDriver(): SimplifiedXmlDriver
    {
        return $this->driver;
    }
}