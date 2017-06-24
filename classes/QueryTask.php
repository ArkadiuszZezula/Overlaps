<?php

/**
 * Query must return a list of all documents required for CPT position
 * for person with NID = 6 that are expired as of 2009-09-01 or there's no data about them.
 * Refer to task 2 for more details.
 */
class QueryTask {
    /**
     * Final query
     * @var string
     */
    public static $yourQuery = "SELECT * FROM req_docs 
                                LEFT JOIN pers_docs ON req_docs.doc_nid = pers_docs.doc_nid AND req_docs.pos_id = pers_docs.pos_id
                                WHERE pers_docs.pers_nid IS NULL OR pers_docs.pers_nid = 6 
                                AND pers_docs.expires < '2009-09-01'
                                AND req_docs.pos_id = 'CPT'";
}

