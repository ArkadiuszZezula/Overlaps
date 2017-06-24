<?php

/**
 * Interface for communication with database.
 */
interface IDBConnector {
    /**
     * Used for SELECT queries. Any variables must be prepared beforehand.
     * @param string $txt text of your query
     * @return array result of your query returned as array of table records, 
     * false if it failed
     */
    public function query($txt);
    
    /**
     * Executes UPDATE, INSERT, etc. Any variables must be prepared beforehand.
     * @param string $txt text of your query
     * @return boolean whether the execute was successful or not.
     */
    public function execute($txt);
    
    /**
     * Prepares text to be inserted into a query.
     * @param string $txt
     * @return string prepared text
     */
    public function escape($txt);
}
