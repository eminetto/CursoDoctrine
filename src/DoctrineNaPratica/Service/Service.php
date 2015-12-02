<?php

namespace DoctrineNaPratica\Service;

use Doctrine\DBAL\DriverManager;

abstract class Service
{

	/**
	 * Doctrine EntityManager
	 * @var Doctrine\ORM\EntityManager
	 */
	protected $em;

	/**
	 * Database Connection
	 * @var \Doctrine\DBAL\Connection
	 */
	protected $conn;


	public function __construct()
	{
		require __DIR__ . '/../../../bootstrap.php';

		$this->em = $entityManager;
		$this->conn = DriverManager::getConnection($dbParams, $config);
	}	
}
