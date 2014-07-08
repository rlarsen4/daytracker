<?php

/**/  
include_once("db/db.php");
include_once("db/db_credentials.php");
include_once('resources/Student.php');
include_once('resources/Milestone.php');
include_once('resources/StudentManager.php');
include_once('resources/MilestoneManager.php');

class MainController {
    public function defaultAction() {

        //abstract all of this into a method, somewhere...
        $aStudent = new Student();
        $aMilestone = new Milestone();

        $aStudentManager = new StudentManager();
        $aMilestoneManager = new MilestoneManager();
        $currStudent = 3;

        // get student's milestone completion date(s) 
        $aMilestoneManager->getSelectedStudentTestedDate($currStudent, $aMilestone);
        $aMilestoneManager->getSelectedStudentScreenedDate($currStudent, $aMilestone);
        $aMilestoneManager->getSelectedStudentReportCardDate($currStudent, $aMilestone);

        // set info for current student
        $aStudent = ($aStudentManager->getSelectedStudent($currStudent));
        // enter milestones into student
        $aStudent->setMilestones($aMilestone);      
        // end of that method, probably


        // move to new student somewhere
        $aMilestoneManager->getScheduledMilestoneDate(4);


        include 'homeview.php'; //html view
    }

    public function milestoneCompletedAction(){
        // Validate input parameters
        $stuId = $_POST['student_id'];
        $msId = $_POST['milestone_id'];
        $dateComp = $_POST['date_completed'];
        // if valid

        if (!is_numeric($stuId)) {
            echo "error";
        }
            // call manager
            $aMilestoneManager = new MilestoneManager();
            $aMilestoneManager->updateMilestone($stuId, $msId, $dateComp);

            // If everything is ok

                // Prepare View Data..

                // Include the right view

                // Return a 200
            http_response_code(200);

            $aMilestoneManager->getAlerts();
            // Else
                // Return proper HTTP Error Code with message

        // Else
            // Return proper HTTP Error Code with message

    }

    public function newStudentAction (){
        $aStudentManager = new Student;
        $aMilestone = new Milestone;
        $aStudentManager = new StudentManager;
        $aMilestoneManager = new MilestoneManager;

        
        $f_name = $_POST['first_name'];

        $last_name = $_POST['last_name'];
        $date_of_birth = $_POST['date_of_birth'];
        $begin_date = $_POST['begin_date'];

        print_r($_POST);

        $currStudentId = $aStudentManager->createNewStudent($f_name, $last_name, $date_of_birth, $begin_date);
        // adds new student to student_milestones table
        $aMilestoneManager->addStudentToStudentMilestones($currStudentId, 1);
        $aMilestoneManager->addStudentToStudentMilestones($currStudentId, 2);
        $aMilestoneManager->addStudentToStudentMilestones($currStudentId, 3);

        // set info for current student
        $aStudent = ($aStudentManager->getSelectedStudent($currStudentId));
        
        $aMilestoneManager->getScheduledMilestoneDate($currStudentId);

        // enter milestones into student
        $aStudent->setMilestones($aMilestone); 

        // print_r($aStudent);
        // print_r($aMilestone);

        // $aMilestoneManager->getScheduledMilestoneDate(7);

    }

    public function findStudentAction() {
        $aStudent = new Student;
        $aStudentManager = new StudentManager;

        $stuId = $_POST['student_id'];
        
        $currStudent = $aStudentManager->getSelectedStudent($stuId);

        // $arrayStudent = [
        //     $first_name = $currStudent->getFirstName(),
        //     $last_name =  $currStudent->getLastName(),
        //     $date_of_birth =  $currStudent->getDateOfBirth(),
        //     $begin_date = $currStudent->getBeginDate(),            
            
        //     $exit_date = $currStudent->getExitDate()
        //     ];
        print_r($currStudent);
            // ->getMilestones());
        
        // foreach ($milestones as $milestone) {
            // echo $milestone . "!!!";
        // }

        // $jStudent = json_encode($arrayStudent);
        // echo(json_last_error());
        print_r( $jStudent);
    }
}