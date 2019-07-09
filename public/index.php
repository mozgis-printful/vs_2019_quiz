<?php

require_once __DIR__ . '/../vendor/autoload.php';

$muris = new \Quiz\Cat('Muris');
$puka = new \Quiz\Cat('Pūka');
$muris->eat();
$muris->eat();
$muris->eat();
$muris->eat();

$puka->eat();
// $muris->getName();
// echo \Quiz\Cat::$animalCount;
$reksis = new \Quiz\Dog('Reksis');
$reksis->run();
$reksis->run();
// $reksis->getHunger();


$billy = new \Quiz\Eagle('Billy');

$owner = new \Quiz\Owner();
$owner->assignAnimal($reksis);
$owner->assignAnimal($billy);

$owner->sleep(10);
$billy->sleep(20);

try {
    $owner->walk($reksis);
    $owner->flyWith($billy);
} catch (Exception $e) {
    echo $e->getMessage();
}


