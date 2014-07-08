<?php 
/**
* This class defines student milestones and
* holds calculations for expected completion dates.
*/
class Milestone
{
    private $scheduled_test_date;
    private $scheduled_screen_date;
    private $scheduled_report_card_date;
    private $tested_date;
    private $screened_date;
    private $report_card_date;
    
    function __construct()
    {
        # code...
    }

    public function getScheduledTestDate() {
        return $this->scheduled_test_date;
    } 

    public function setScheduledTestDate ($value) {
        $this->scheduled_test_date = $value;
    }

    public function getScheduledScreenDate() {
        return $this->scheduled_screen_date;
    } 

    public function setScheduledScreenDate ($value) {
        $this->scheduled_screen_date = $value;
    }

    public function getScheduledReportCardDate() {
        return $this->scheduled_report_card_date;
    } 

    public function setScheduledReportCardDate ($value) {
        $this->scheduled_report_card_date = $value;
    }

    public function getTestedDate() {
        return $this->tested_date;
    } 

    public function setTestedDate ($value) {
        $this->tested_date = $value;
    }

    public function getScreenedDate() {
        return $this->screened_date;
    } 

    public function setScreenedDate ($value) {
        $this->screened_date = $value;
    }

    public function getReportCardDate() {
        return $this->report_card_date;
    } 

    public function setReportCardDate ($value) {
        $this->report_card_date = $value;
    }

}