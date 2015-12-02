<?php

require 'bootstrap.php';

use Beer\Model\Style;
use Beer\Model\Beer;
use Beer\Model\Brewery;

// $styles = $entityManager->getRepository('Beer\Model\Style')->findAll();
$query = $entityManager->createQuery('select style from Beer\Model\Style style');
$styles = $query->getResult(\Doctrine\ORM\Query::HYDRATE_OBJECT);
foreach ($styles as $style) {
    echo "<b>Estilo</b> ", $style->getName(), "<br>";
    echo "<b>Cervejas</b><br>";
    foreach ($style->getBeerCollection() as $beer) {
        echo "Cerveja ", $beer->getName(), " da marca ", $beer->getBrewery()->getName(), "<br>";
    }
}

//buscar cervejas cujo abv > 2
$qb = $entityManager->createQueryBuilder();
$qb->select('b')->from('Beer\Model\Beer', 'b')->where('b.abv > 2');
$query = $qb->getQuery();
$beers = $query->getResult();
foreach($beers  as $beer) {
    echo $beer->getName(), " da cervejaria ", $beer->getBrewery()->getName(), " do estilo ", $beer->getStyle()->getName(),  "\n";
}

// $irishDryStout = new Style;
// $irishDryStout->setName('Irish Dry Stout');
// $irishDryStout->setDescription("One of the most common stouts, Dry Irish Stout tend to have light-ish bodies to keep them on the highly drinkable side. They're usually a lower carbonation brew and served on a nitro system for that creamy, masking effect. Bitterness comes from both roasted barley and a generous dose of hops, though the roasted character will be more noticeable. Examples of the style are, of course, the big three, Murphy's, Beamish, and Guinness, however there are many American brewed Dry Stouts that are comparable, if not better.");
// $irishDryStout->setAbvRange('4.0-6.0%');

// $guinness = new Brewery;
// $guinness->setName('Guinness');

// $draught = new Beer;
// $draught->setName('Guinness Draught');
// $draught->setAbv(4.20);
// $draught->setStyle($irishDryStout);
// $draught->setBrewery($guinness);

// $irishDryStout->addBeer($draught);
// $guinness->addBeer($draught);

// $entityManager->persist($irishDryStout);
// $entityManager->persist($guinness);
// $entityManager->persist($draught);
// $entityManager->flush();
