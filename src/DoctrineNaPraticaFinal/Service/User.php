<?php

namespace DoctrineNaPratica\Service;

class User extends Service
{
	public function getUsers()
	{
		$query = $this->em->createQuery('SELECT u FROM DoctrineNapratica\Model\User u');
		$users = $query->getResult();

		return $users;
	}
}
