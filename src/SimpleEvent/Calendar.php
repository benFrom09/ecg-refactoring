<?php
declare(strict_types=1);
namespace SimpleEvent;

use PDO;
use DateTime;
use SimpleEvent\EventManager;

class Calendar
{
    private $months = ["Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"];
    private $days = ["Lun.","Mar.","Mer.","Jeu.","Ven.","Sam.","Dim."];
    private $month;
    private $year;
    protected $events;
    protected $pdo;
    const _BASE_URI = "/index.php";

     /**
     * Calendar constructor
     *
     * @param PDO $pdo
     * @param integer $month month between 1 and 12
     * @param integer $year
     */
    public function __construct(PDO $pdo,?int $month = null,?int $year = null)
    {
        if($month === null || $month < 1 || $month > 12) {
            $month = intval(date('m'));
        }
        if($year === null) {
            $year = intval(date('Y'));
        }
        if($year < 1970) {
            $year = intval(date('Y'));
        }
        $this->month = $month;
        $this->year = $year;
        $this->pdo = $pdo;
    }


     /**
     * return the month to string
     *
     * @return string
     */
    public function toString():string {
        return $this->months[$this->month - 1] . " " . $this->year;
    }

    /**
     * get the first day of a month
     *
     * @param integer|null $month
     * @param integer|null $year
     * @return void
     */
    public function getStartingDay(?int $month = null,?int $year = null) {
        $month = $month ?? $this->month;
        $year =$year ?? $this->year;
        return new DateTime("{$year}-{$month}-01");
    }

    /**
     * get the number of weeks of a month
     *
     * @param integer|null $month
     * @param integer|null $year
     * @return integer
     */
    public function getWeeks(?int $month = null,?int $year = null):int {
        $month = $month ?? $this->month;
        $year =$year ?? $this->year;
        
        $days_in_month =  $this->getTotalDays();
        $number_of_weeks = ($days_in_month % 7 == 0 ? 0 : 1) + intval($days_in_month / 7) ;
        $end = date('N',strtotime($year . '-' . $month . '-' . $days_in_month));
        $start = date('N',strtotime($year . '-' . $month . '-' . '01'));
        if($end < $start) {
            $number_of_weeks++;
        }
        return $number_of_weeks;
    }

    /**
     * get total days number in a month
     *
     * @param integer|null $month
     * @param integer|null $year
     * @return string
     */
    public function getTotalDays(?int $month = null,?int $year = null):string {
        $month = $month ?? $this->month;
        $year =$year ?? $this->year;
       return  date('t',strtotime($year . '-' . $month . '-' . '01'));
    }


    public function getDays():array {
        return $this->days;
    }

     public function getMonth() {
        return $this->month;
    }

     public function getYear() {
        return $this->year;
    }

    /**
     * instanciate Events::class 
     *
     * @return Events
     */
    public function getEvents():EventManager {
        return new EventManager($this->pdo);
    }

      /**
     * set the start day of screen to be displayed
     *
     * @return DateTime
     */
    public function setStartDayOfScreen():DateTime {
        $firstday = $this->getStartingDay();
        return  $firstday->format('N') === "1" ? $firstday : (clone $firstday)->modify('last monday');
    }
    /**
     * set the last day of screen to be displayed
     *
     * @return DateTime
     */
    public function setEndDayOfScreen():DateTime {
        return (clone $this->setStartDayOfScreen())->modify('+' . (6 + 7 * ($this->getWeeks() - 1)) . 'days');
    }

        /**
     * check if day is in month
     *
     * @param \DateTime $date
     * @return boolean
     */
    public function isInMonth(\DateTime $date):bool {
        return $this->getStartingDay()->format('Y-m') === $date->format('Y-m');
    }
    /**
     * get next month
     *
     * @return Calendar
     */
    public function next():Calendar {
        $year = $this->year;
        $month = $this->month + 1;
        if($month > 12) {
            $month = 1;
            $year += 1;
        }
        return new Calendar($this->pdo,$month,$year);
    }
    /**
     * get previuos month
     *
     * @return Calendar
     */
    public function previous():Calendar {
        $year = $this->year;
        $month = $this->month - 1;
        if($month < 1) {
            $month = 12;
            $year -= 1;
        }
        return new Calendar($this->pdo,$month,$year);
    }
}
    