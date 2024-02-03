<?php

class Dates {

    public function toDateFormat($dateString) {
        
        $dateTime = new DateTime($dateString);
        return $dateTime->format('F j, Y, g:i:s A');

    }
}