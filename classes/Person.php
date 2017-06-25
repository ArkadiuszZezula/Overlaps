<?php

include_once "infrastructure/IPerson.php";

class Person implements IPerson {

    private $person_nid;
    private $name;
    private $surname;
    private $favorite_colour;
    private $company_nid;

    public static function get(IDBConnector &$DB, $nid) {
        $dbUser = $DB->query("SELECT * FROM person WHERE person_nid=$nid");
        $tempPerson = new Person();
        $tempPerson->setId($dbUser['person_nid']);
        $tempPerson->setName($dbUser['name']);
        $tempPerson->setSurname($dbUser['surname']);
        $tempPerson->setFavColour($dbUser['favorite_colour']);
        $tempPerson->setCompany($dbUser['company_nid']);
        return $tempPerson;
    }

    public function getId() {
        return $this->person_nid;
    }

    public function setId($person_nid) {
        $this->person_nid = $person_nid;
    }
    public function getName(){
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getSurname() {
        return $this->name;
    }

    public function setSurname($surname) {
        $this->surname = $surname;
    }

    public function getFavColour() {
        if($this->company_nid) {
            return "czerwony";
        }
        return $this->favorite_colour;
    }

    public function setFavColour($colourName) {
        $this->favorite_colour = $colourName;
    }

    public function setCompany($company_nid) {
        $DB = new IDConnector();
        if($DB->query("SELECT * FROM company WHERE company_nid=$company_nid")){
            $this->company_nid = $company_nid;
        } else {
            return false;
        }
    }

    public function getCompanyName() {
        $company_nid =  $this->company_nid;
        $DB = new IDConnector();
        $arrayCompany = $DB->query("SELECT * FROM company WHERE company_nid=$company_nid");
        return $arrayCompany['name'];
    }

    public function getCompanyAddress() {
        $company_nid =  $this->company_nid;
        $DB = new IDConnector();
        $arrayCompany = $DB->query("SELECT * FROM company WHERE company_nid=$company_nid");
        return $arrayCompany['address'];
    }

    public function getCompanyEmployees() {
        $company_nid =  $this->company_nid;
        $DB = new IDConnector();
        $arrayCompany = $DB->escape("SELECT * FROM person WHERE company_nid=$company_nid");
        if ($arrayCompany == "") {
            return false;
        }
        $counter = 0;
        foreach ($arrayCompany as $value) {
           $counter++;
        }
        return $counter;
    }

    //METHODS DEALING WITH CREW INFO

    public function getCrewCode() {
        $person_nid = $this->person_nid;
            if($this->company_nid == 0) {
                return null;
            }
        $DB = new IDConnector();
        if(($DB->query("SELECT * FROM crew WHERE person_nid=$person_nid") == 0 )) {
            return null;
        } else {
            $codeCrew = $DB->query("SELECT * FROM crew WHERE person_nid=$person_nid");
            return $codeCrew['code'];
        }
    }

    public function getPositionName() {
        $person_nid = $this->person_nid;
            if($this->company_nid == 0) {
                return null;
            }
        $DB = new IDConnector();
        if(($DB->query("SELECT * FROM crew WHERE person_nid=$person_nid") == 0 )) {
            return null;
        } else {
            $codeCrew = $DB->query("SELECT * FROM crew WHERE person_nid=$person_nid");
            return $codeCrew['position'];
        }
    }

    //UTILITY METHODS

    public function getDescriptionHTML($surname_before_first_name = false) {
        $crewCode = $this->getCrewCode();
        $nid = $this->person_nid;
        $DB = new IDConnector();
        $dbUser = $DB->query("SELECT * FROM person WHERE person_nid=$nid");
        $name = $dbUser['name'];
        $surname = $dbUser['surname'];
        $fullName = $name." ".$surname;
        if($surname_before_first_name == false) {
            $fullName = $surname." ".$name;
        }
        if ($crewCode !== null) {
            return "<div class=".$crewCode.">".$fullName."</div>";
        }
    }

    public function update(){
        $nid = $this->person_nid;
        $DB = new IDConnector();
        if($nid !== null) {
            $DB->execute("UPDATE `person` SET `name`='$this->name',
                                              `surname`='$this->surname',
                                              `favorite_colour`= '$this->favorite_colour',
                                              `company_nid`= '$this->company_nid'
                                        WHERE `person_nid` = $nid");
        } else {
            $name = $this->name;
            $surname = $this->surname;
            $favorite_colour = $this->favorite_colour;
            $company_nid = $this->company_nid;
            if($company_nid == null) {
                $company_nid = 0;
            }
            $DB->execute("INSERT INTO `person` (`name`, `surname`, `favorite_colour`, `company_nid`)
                        VALUES ('$name', '$surname', '$favorite_colour', '$company_nid')");
        }
    }

}
