<?php 

class Student {
    //properties
    private $student_id;
    private $first_name;
    private $last_name;
    private $date_of_birth;
    private $begin_date;
    private $milestones=[];
    private $exit_date;


    //constructor
    function __construct()
    {
        
    }

    //  getters & setters
    public function getStudentId() {
        return $this->student_id;
    } 

    public function setStudentId($value) {
        $this->student_id = $value;
    }

    public function getFirstName    () {
        return $this->first_name;
    } 

    public function setFirstName($value) {
        $this->first_name = $value;
    }

    public function getLastName() {
        return $this->last_name;
    } 

    public function setLastName($value) {
        $this->last_name = $value;
    }

    public function getDateOfBirth() {
        return $this->date_of_birth;
    } 

    public function setDateOfBirth($value) {
        $this->date_of_birth = $value;
    }

    public function getBeginDate() {
        return $this->begin_date;
    } 

    public function setBeginDate($value) {
        $this->begin_date = $value;
    }

    public function getMilestones() {
        return $this->milestones;
    } 

    public function setMilestones ($value) {
        $this->milestones = $value;
    }

    public function getExitDate() {
        return $this->exit_date;
    } 

    public function setExitDate($value) {
        $this->exit_date = $value;
    }


}