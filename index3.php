<?php 
error_reporting(E_ALL);
    ini_set('display_errors', 'on');

include("db.php");
include("db_credentials.php");

    // class Student {
    //     //properties
    //     private $first_name = "MO";
    //     private $last_name = "";
    //     private $date_of_birth = "";
    //     private $pretest_date = "";
    //     private $scheduled_test_date = "";
    //     private $tested_date = "";
    //     private $scheduled_screen_date = "";
    //     private $screened_date = "";
    //     private $scheduled_report_card_date = "";
    //     private $report_card_date = "";
    //     private $exit_date = "";

    //     //constructor
    //     // public function __construct($student_record)
    //     //  {
    //     //      print_r( $student_record );
    //     //      echo "<br>";
    //     //      echo this->$first_name;
    //     //      // self::$first_name = $student_record['first_name'];

    //     //  } 
    //     //getters & setters
    // };
// $aStudent = new Student($row);

   
   //     query student table
        $sql = "
            SELECT * FROM student, student_milestone 
            WHERE exit_date IS NULL 
            AND admin_id = 1
            AND student.student_id = student_milestone.student_id
            ";
        $results = db::execute($sql);

       // $items = $results->fetch_assoc();

        // while ($row = $results->fetch_assoc()) {
        // print_r($row);
        // echo "<br>";       
        // }
  include 'homeview.php';