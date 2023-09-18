<?php

declare(strict_types=1);


namespace App;


use DateTime;

class OurDate
{

    private DateTime $date;

    public function __construct(string $yyyyMMdd)
    {
        $dateTime = DateTime::createFromFormat('Y/m/d H:i:s', $yyyyMMdd . ' 00:00:00');
        if(!$dateTime){
            throw new \InvalidArgumentException('Wrong date');
        }
        $this->date = $dateTime;
    }

    public function isSameDay($anotherDate): bool
    {
        return
            $anotherDate->getDay() === $this->getDay()
            && $anotherDate->getMonth() === $this->getMonth();
    }

    private function getDay(): int
    {
        return (int)$this->date->format('d');
    }

    private function getMonth(): int
    {
        return (int)$this->date->format('m');
    }

}
