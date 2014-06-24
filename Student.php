<?php 
    class Student {
        //properties
        private $studentId;
        private $firstName;
        private $lastName;
        private $dateOfBirth;
        private $beginDate;
        private $expectedTestDate;
        private $testedDate;
        private $expectedScreenDate;
        private $screenedDate;
        private $reportCardDate;
        private $exitDate;
        
        // constructors & methods
        function __construct($record) {
            $this->$studentId = $record['studentId'];
        }
    }
 ?>