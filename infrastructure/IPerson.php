<?php

interface IPerson {
    /**
     * Static method that creates object representing person
     * @param IDBConnector $DB database connector (assume connection is already set up)
     * @param type $nid id of person to create
     * @return Person object representing person with given nid
     */
    public static function get(IDBConnector &$DB, $nid);
    
    ////////////////////////
    //METHODS DEALING WITH PERSONAL INFO
    ////////////////////////
    
    /**
     * Get person name.
     * @return string
     */
    public function getName();
    
    /**
     * Set new name for this person.
     * @param string $name
     */
    public function setName($name);
    
    /**
     * Get person surname.
     * @return string
     */
    public function getSurname();
    
    /**
     * Set new surname for this person.
     * @param string $surname
     */
    public function setSurname($surname);
    
    /**
     * Get person favourite colour.
     * In the special case of crewman with company_nid = 1
     * should always return value "czerwony"
     * @return string
     */
    public function getFavColour();
    
    /**
     * Set new favourite colour for this person.
     * @param string $colourName
     */
    public function setFavColour($colourName);
    
    ////////////////////////
    //METHODS DEALING WITH COMPANY INFO
    ////////////////////////
    
    /**
     * Set new company for this person.
     * Setting this for non-existing company shouldn't be possible.
     * @param int $company_nid if set to 0 this person is unemployed.
     */
    public function setCompany($company_nid);
    
    /**
     * Get company name.
     * @return string
     */
    public function getCompanyName();
    
    /**
     * Get company address.
     * @return string
     */
    public function getCompanyAddress();
    
    /**
     * Get company employees count.
     * @return int
     */
    public function getCompanyEmployees();

    ////////////////////////
    //METHODS DEALING WITH CREW INFO
    ////////////////////////
    
    /**
     * Get crew code.
     * @return int if person belongs to a crew, null otherwise.
     */
    public function getCrewCode();

    /**
     * Get position name.
     * @return string if person belongs to a crew, null otherwise.
     */
    public function getPositionName();
    
    ////////////////////////
    //UTILITY METHODS
    ////////////////////////
    
    /**
     * Get person description in HTML ready form.
     * @param boolean $surname_before_first_name order of surname and name
     * @return string
     */
    public function getDescriptionHTML($surname_before_first_name = false);
    
    /**
     * Executes single query for saving all the changes to database.
     */
    public function update();
}
