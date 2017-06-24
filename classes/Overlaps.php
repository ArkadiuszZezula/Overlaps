<?php


class Overlaps implements IOverlapCalculator {

    public function getMaxOverlap($intervals) {

        $counter = 0;

        foreach ($intervals as $key => $value) {
            if (!is_array($intervals) || !count($intervals) || !$value['from'] || !$value['to']
                || $value['from'] <= 0 || $value['to'] <= 0 || $value['from'] >= ($value['to']-1)) {
                return false;
            }
            $tempCounter = 0;
            foreach ($intervals as $key2 => $value2) {
                if (($value['from'] < ($value2['to']) && $value['to'] > $value2['from'])) {
                    $tempCounter ++;
                }
            }
            if ($tempCounter > $counter) {
                $counter = $tempCounter;
            }
        }
        return $counter;
    }
}

