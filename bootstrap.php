<?php
//AutoLoader do Composer
$loader = require __DIR__.'/vendor/autoload.php';
//vamos adicionar nossas classes ao AutoLoader
$loader->add('DoctrineNaPratica', __DIR__.'/src');
$loader->add('Beer', __DIR__.'/src');

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

//se for falso usa o APC como cache, se for true usa cache em arrays
$isDevMode = true;

//caminho das entidades
$paths = [
		  __DIR__ . '/src/DoctrineNaPratica/Model', 
		  __DIR__ . '/src/Beer/Model'
];

// configurações do banco de dados
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',//aluno
    'password' => 'root', //em branco
    'dbname'   => 'dnp', //test
    'host'     => '127.0.0.1',
    'port'     => 3306
    // 'driver' => 'pdo_sqlite',
    // 'path' => 'curso.db'
);

$config = Setup::createConfiguration($isDevMode);
$config->setQueryCacheImpl(new \Doctrine\Common\Cache\ApcCache());
$config->setResultCacheImpl(new \Doctrine\Common\Cache\ApcCache());

//leitor das annotations das entidades
$driver = new AnnotationDriver(new AnnotationReader(), $paths);
$config->setMetadataDriverImpl($driver);
//registra as annotations do Doctrine
AnnotationRegistry::registerFile(
    __DIR__ . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php'
);
//cria o entityManager
$entityManager = EntityManager::create($dbParams, $config);

//subscriber
// $evm = $entityManager->getEventManager();
// $entitySubscriber = new DoctrineNaPratica\Model\Subscriber\EntitySubscriber;
// $evm->addEventSubscriber($entitySubscriber);