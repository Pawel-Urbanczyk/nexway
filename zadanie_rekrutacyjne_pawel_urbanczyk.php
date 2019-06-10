<?php


class Dates{

public $startDate;
public $deliveryDays;
public $lastYear = null;
public $daysOff = array(
    '01-01',
    '01-06',
    '05-01',
    '05-03',
    '08-15',
    '11-01',
    '11-11',
    '12-25',
    '12-26'
);
public $i;
public $year;
public $easter;
public $easterMonday;
public $date;
public $pentecost;
public $corpusChristi;
public $weekDay;
public $sendingDate;
public $isAvaliable;


public function deliveryDate($startDate, $deliveryDays){

    if($deliveryDays <= 0){
        return null;
    }

    $startDate = strtotime('-1 day', strtotime($startDate));

    $this->i = 0;

    while($this->i <= $deliveryDays){

        $this->year = date('Y', $startDate);

        if($this->year !== $this->lastYear){

            $this->lastYear = $this->year;
            $this->easter = date('m-d', easter_date($this->year));
            $this->date = strtotime($this->year.'-'.$this->easter);
            $this->easterMonday = date('m-d', strtotime('+1 day', $this->date));
            $this->pentecost =date('m-d', strtotime('+49 days', $this->date));
            $this->corpusChristi = date('m-d', strtotime('+60 days', $this->date));

            $this->daysOff[] = $this->easter;
            $this->daysOff[] = $this->easterMonday;
            $this->daysOff[] = $this->pentecost;
            $this->daysOff[] = $this->corpusChristi;

        }

        $this->weekDay = date('N', $startDate);

        if(!($this->weekDay == 6 || $this->weekDay == 7 || in_array(date('m-d', $startDate), $this->daysOff))){
            $this->i++;
        }


        $startDate = strtotime('+1 day', $startDate);

    }

    return date('Y-m-d', $startDate);

}


public function sendingDate($sendingDate, $isAvaliable){

    $sendingDate = strtotime($sendingDate);

    $this->year = date('Y', $sendingDate);

    if($this->year !== $this->lastYear){

        $this->lastYear = $this->year;
        $this->easter = date('m-d', easter_date($this->year));
        $this->date = strtotime($this->year.'-'.$this->easter);
        $this->easterMonday = date('m-d', strtotime('+1 day', $this->date));
        $this->pentecost =date('m-d', strtotime('+49 days', $this->date));
        $this->corpusChristi = date('m-d', strtotime('+60 days', $this->date));

        $this->daysOff[] = $this->easter;
        $this->daysOff[] = $this->easterMonday;
        $this->daysOff[] = $this->pentecost;
        $this->daysOff[] = $this->corpusChristi;

    }


    $this->weekDay = date('N', $sendingDate);
    if($this->weekDay == 6){

        $sendingDate = strtotime('+2 days', $sendingDate);

    }else if($this->weekDay == 7 || in_array(date('m-d', $sendingDate), $this->daysOff)){

        $sendingDate = strtotime('+1 days', $sendingDate);

    }

    if($isAvaliable == true){

        return date('Y-m-d', $sendingDate);

    }else{

        $sendingDate = strtotime('+1 days', $sendingDate);
        $this->weekDay = date('N', $sendingDate);
        if($this->weekDay == 6 || date('12-25')){

            $sendingDate = strtotime('+2 days', $sendingDate);

        }

        if($this->weekDay == 7 || in_array(date('m-d', $sendingDate), $this->daysOff)){

            $sendingDate = strtotime('+1 days', $sendingDate);

        }

        return date('Y-m-d', $sendingDate);

    }

}


}


//Example
$days = new Dates;
echo 'Data dostawy towaru: '.$days->deliveryDate(date('2019-04-18'), 5);
echo'<br>';
echo 'Wysyłka dnia: '.$days->sendingDate(date('2019-12-24'), false);



?>