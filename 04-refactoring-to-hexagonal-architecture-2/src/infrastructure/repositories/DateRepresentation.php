<?php


namespace App\infrastructure\repositories;


use App\core\OurDate;
use DateTime;

class DateRepresentation
{
    private const DATE_FORMAT = "Y/m/d";
    private string $dateAsString;

    public function __construct(string $dateAsString)
    {
        $this->dateAsString = $dateAsString;
    }

    public function toDate(): OurDate
    {
        $dateTime = DateTime::createFromFormat(self::DATE_FORMAT, $this->dateAsString);
        if(!$dateTime){
            throw new \InvalidArgumentException('Wrong date');
        }
        return new OurDate($dateTime);
    }

}