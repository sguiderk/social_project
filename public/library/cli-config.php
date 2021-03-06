<?php
use Doctrine\ORM\Mapping\Driver\YamlDriver;


$classLoader = new \Doctrine\Common\ClassLoader('Entities', __DIR__);
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Proxies', __DIR__);
$classLoader->register();

$config = new \Doctrine\ORM\Configuration();
$config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache);
$config->setProxyDir(__DIR__ . '/Proxies');
$config->setProxyNamespace('Proxies');



/*

$driver = new YamlDriver( __DIR__ . '/../application/models/Orm_entity/');
$driver->setFileExtension('.yml');
$config->setMetadataDriverImpl($driver);  */


$driverImpl = $config->newDefaultAnnotationDriver( __DIR__ . '/../orm/' );
$config->setMetadataDriverImpl($driverImpl); 

$connectionOptions = array(
    'driver' => 'pdo_mysql',
     'host'=> 'localhost',
    'dbname' => 'zenddatabase',
    'username' => 'root',
    'password' => 'root'
);

$em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));
#$cli->setHelperSet($helperSet);