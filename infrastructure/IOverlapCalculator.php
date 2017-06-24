<?php

/**
 * Interface defining a class for finding maximum overlapping intervals.
 */
interface IOverlapCalculator {    
    /**
     * Get maximum overlapping intervals from submitted array.
     * The array should be validated and false should be returned on failed validation.
     * @param array $intervals new list of intervals, must be like
     * $intervals = array(
     *   array('from' => 12345, 'to' => 13455),
     *   array('from' => 13013, 'to' => 13201),
     *		...
     *	    );
     * etc.
     */
    public function getMaxOverlap($intervals);
}
