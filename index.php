<?php

include_once "infrastructure/IOverlapCalculator.php";
include_once "classes/Overlaps.php";

$new = new Overlaps();
$arrayExample = array(array("from" => 12345, "to" => 13455),
                      array("from" => 13013, "to" => 13201),
                      array("from" => 13113, "to" => 13179),
                      array("from" => 12003, "to" => 13600),
                      array("from" => 15003, "to" => 16600),
                      array("from" => 11222, "to" => 11339));
echo $new->getMaxOverlap($arrayExample);