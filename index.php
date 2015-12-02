<?php

require 'bootstrap.php';

use DoctrineNaPratica\Model\User;
use DoctrineNaPratica\Model\Subscription;

$steve = $entityManager->getRepository('DoctrineNaPratica\Model\User')->find(1);
if (!$steve) {
    $steve = new User;
    $steve->setName('Steve Jobs');
    $steve->setLogin('sjobs');
    $steve->setEmail('steve@apple.com');
    $steve->setAvatar('steve.jpg');    

    $subscription = new Subscription;
    $subscription->setUser($steve);
    $subscription->setStatus(1);
    $subscription->setStarted(new \Datetime);
    $steve->setSubscription($subscription);

    $entityManager->persist($subscription);
}
$steve->setName('Steve Wonder');

$entityManager->persist($steve);
echo $steve->getName(), "\n";

$bill = $entityManager->getRepository('DoctrineNaPratica\Model\User')->findOneBy(array('login' => 'bill'));
if (!$bill) {
    $bill = new User;
    $bill->setName('Bill Gates');
    $bill->setLogin('bill');
    $bill->setEmail('bill@ms.com');
    $bill->setAvatar('bill.jpg');

    $entityManager->persist($bill);

}
echo $bill->getId(), "\n";

try {
    $entityManager->flush();    
} catch (Exception $e) {
    echo $e->getMessage();
}

echo $bill->getId(), "\n";
$entityManager->remove($bill);
$entityManager->flush();

echo $steve->getName(), " começou a subscription em ", $steve->getSubscription()->getStarted()->format('d/m/Y'), "\n";











