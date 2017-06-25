<?php

include_once "infrastructure/IOverlapCalculator.php";
include_once "classes/Overlaps.php";
include_once "classes/Connector.php";
include_once "classes/Person.php";

//EXAMPLE TASK 1

$new = new Overlaps();
$arrayExample = array(array("from" => 12345, "to" => 13455),
                      array("from" => 13013, "to" => 13201),
                      array("from" => 13113, "to" => 13179),
                      array("from" => 12003, "to" => 13600),
                      array("from" => 15003, "to" => 16600),
                      array("from" => 11222, "to" => 11339));
echo $new->getMaxOverlap($arrayExample)."<br>";




//EXAMPLE TASK 3

$newPerson = new Person();
$newPerson->setName("Janek");
$newPerson->setSurname("Kowalski");
$newPerson->setFavColour("Czarny");
$newPerson->setCompany(1);
echo $newPerson->getFavColour()."<br>";
$newPerson->update();
var_dump($newPerson);

$newPerson->setName('gustaw');
$newPerson->update();
var_dump($newPerson);

$DB = new IDConnector();

$tempPerson = $newPerson->get($DB,1);

echo $tempPerson->getId()."<br>";
echo $tempPerson->getName()."<br>";
echo $tempPerson->getSurname()."<br>";
echo $tempPerson->getFavColour()."<br>";
echo $tempPerson->getCompanyName()."<br>";
echo $tempPerson->getCompanyAddress()."<br>";
echo $tempPerson->getCompanyEmployees()."<br>";
echo $tempPerson->getCrewCode()."<br>";
echo $tempPerson->getPositionName()."<br>";
echo $tempPerson->getDescriptionHTML(true)."<br>";
