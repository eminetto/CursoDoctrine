<?php

require_once 'bootstrap.php';

// use DoctrineNaPratica\Model\User;
// use DoctrineNaPratica\Model\Subscription;
use Beer\Model\Style;
use Beer\Model\Brewery;
use Beer\Model\Beer;

//capítulo Testes e manipulação de entidades
//criar um usuário
// $user = [];
// for ($i=0; $i < 100; $i++) { 
// 	$user[$i] = new User;
// 	$user[$i]->setName('Steve Jobs');
// 	$user[$i]->setLogin('steve' . $i);
// 	$user[$i]->setEmail('steve@apple.com');
// 	$user[$i]->setAvatar('steve.png');
// 	$entityManager->persist($user[$i]);
// }
// $entityManager->flush();

$query = $entityManager->createQuery('SELECT u as count FROM DoctrineNaPratica\Model\User u WHERE u.login != :login');
$query->setParameter('login', 'steve');

$result = $query->getResult(\Doctrine\ORM\Query::HYDRATE_SINGLE_SCALAR);
echo $result;
// foreach ($result as $p) {
// 	// echo $p->getLessonCollection()->first()->getCourse()->getName();
// 	// echo $p->getName(), "\n";
// 	// echo $p['u_name'], "\n";
// 	echo $p, "\n";
// }

// //salva a subscription
// $subscription = new Subscription;
// $subscription->setStatus(1);
// $subscription->setStarted(new \DateTime('NOW'));

// $subscription->setUser($user);
// $user->setSubscription($subscription);

// $entityManager->persist($user);
// $entityManager->persist($subscription);
// $entityManager->flush();

// $savedUser = $entityManager
// 			 ->find(User::class, $user->getId());

// echo $savedUser->getSubscription()->getStatus();

// echo $savedUser->getName(), "\n";
// $user = $entityManager
// 		->getRepository(User::class)
// 		->findOneBy(['login' => 'steve', 'email' => 'lsls@lsls.com']);
// if ($user) {
// 	echo $user->getName(), "\n";	
// }
// $savedUser->setName('Elton Minetto');
// $entityManager->persist($savedUser);
// $entityManager->flush();

// $entityManager->remove($savedUser);
// $entityManager->flush();

// echo $savedUser->getSubscription()->getStatus(), "\n";




// //buscar o usuário pelo id
// $savedUser = $entityManager->find('DoctrineNaPratica\Model\User', $user->getId());
// echo $savedUser->getName(), "\n";
// echo $savedUser->getSubscription()->getStatus(), "\n";


// // Recuperação e manipulação de dados
// //dql
// $query = $entityManager->createQuery('SELECT u FROM DoctrineNapratica\Model\User u');
// $users = $query->getResult();
// foreach($users  as $user) {
//     echo $user->getName(),"\n";
// }
// //query builder
// $qb = $entityManager->createQueryBuilder();
// $qb->select('u')->from('DoctrineNapratica\Model\User', 'u');
// $query = $qb->getQuery();
// $users = $query->getResult();
// foreach($users  as $user) {
//     echo $user->getName(),"\n";
// }
// //pegar mais exemplos no capítulo Recuperação e manipulação de dados
// //exclui o usuário
// $entityManager->remove($savedUser);
// $entityManager->flush();

// // $coursesToRemove = $entityManager->getRepository('DoctrineNapratica\Model\Course')->findBy([
// //     'teacher' => $savedUser,
// //     'value' => 0,
// // ]);

// // foreach ($coursesToRemove as $course) {
// //     $entityManager->remove($course);
// // }

// // $entityManager->flush();

// //cervejas
// // http://www.beeradvocate.com/beer/style/
// // $irishDryStout = new Style;
// // $irishDryStout->setName('Irish Dry Stout');
// // $irishDryStout->setDescription("One of the most common stouts, Dry Irish Stout tend to have light-ish bodies to keep them on the highly drinkable side. They're usually a lower carbonation brew and served on a nitro system for that creamy, masking effect. Bitterness comes from both roasted barley and a generous dose of hops, though the roasted character will be more noticeable. Examples of the style are, of course, the big three, Murphy's, Beamish, and Guinness, however there are many American brewed Dry Stouts that are comparable, if not better.");
// // $irishDryStout->setAbvRange('4.0-6.0%');

// // $guinness = new Brewery;
// // $guinness->setName('Guinness');

// // $draught = new Beer;
// // $draught->setName('Guinness Draught');
// // $draught->setAbv(4.20);
// // $draught->setStyle($irishDryStout);
// // $draught->setBrewery($guinness);

// // $irishDryStout->addBeer($draught);
// // $guinness->addBeer($draught);

// // $entityManager->persist($irishDryStout);
// // $entityManager->persist($guinness);
// // $entityManager->persist($draught);
// // $entityManager->flush();

// //buscar cervejas cujo abv > 2
// // $qb = $entityManager->createQueryBuilder();
// // $qb->select('b')->from('Beer\Model\Beer', 'b')->where('b.abv > 2');
// // $query = $qb->getQuery();
// // $beers = $query->getResult();
// // foreach($beers  as $beer) {
// //     echo $beer->getName(), " da cervejaria ", $beer->getBrewery()->getName(), " do estilo ", $beer->getStyle()->getName(),  "\n";
// // }