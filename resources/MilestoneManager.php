<?php

/**
* Milestone manager calculates scheduled dates and tracks all 
* student milestones.
*/
class MilestoneManager
{
    
    function __construct()
    {
        # code...
    }

    // get actual tested date from db
    // this can be made more modular if I pass in the milestone_id.
    function getSelectedStudentTestedDate($stuId, $milestone) 
    {
        // $selectedStudentMilestones = new Milestone;
        $sql = "
            SELECT * FROM student_milestone, milestone 
            WHERE student_id = " . $stuId . "
            ";

            $results = db::execute($sql);

            $items = $results->fetch_assoc();
            while ($row = $results->fetch_assoc()) {
                if ($row['milestone_id'] == 1) {
                    $milestone->setTestedDate($items['date_completed']);
                    
                }       
            }
        return $milestone;
    }

    // get actual screened date from db
    function getSelectedStudentScreenedDate($stuId, $milestone) 
    {   
        $sql = "
            SELECT * FROM student_milestone, milestone 
            WHERE student_id = " . $stuId . "
            ";

            $results = db::execute($sql);

            $items = $results->fetch_assoc();
            while ($row = $results->fetch_assoc()) {
                if ($row['milestone_id'] == 2) {
                    $milestone->setScreenedDate($items['date_completed']);
                    
                }       
            }
        return $milestone;
    }

    // get actual report card date from db
    function getSelectedStudentReportCardDate($stuId, $milestone) 
    {
        $sql = "
            SELECT * FROM student_milestone, milestone 
            WHERE student_id = " . $stuId . "
            ";

            $results = db::execute($sql);

            $items = $results->fetch_assoc();
            while ($row = $results->fetch_assoc()) {
                if ($row['milestone_id'] == 3) {
                    $milestone->setReportCardDate($items['date_completed']);
                    
                }       
            }
        return $milestone;
    }

    //calculates schedules for 
    function getScheduledMilestoneDate ($stuId){
        date_default_timezone_set('UTC'); // set time zone
        //query db
        $sql = "
            SELECT m.milestone_id, m.milestone_name, m.schedule_days, m.schedule_type, s.student_id, s.begin_date
            FROM milestone as m, student as s
            WHERE s.student_id = \"" 
            . $stuId
            . "\"";

        $results = db::execute($sql);

        //loop results to calculate scheduled dates
        while ($row = $results->fetch_assoc()) {
            $beginDate = new DateTime($row['begin_date']);

            // check milestone schedule type - calendar based dates
            if ($row['schedule_type'] == 'calendar'){
                $msId = $row['milestone_id'];
                $scheduledDate = date_add($beginDate , date_interval_create_from_date_string("'" . $row['schedule_days'] . " days"));

                // call function to update database
                $this->setScheduledMilestoneDate($scheduledDate, $stuId, $msId);
            }

            // school day only based dates
            elseif ($row['schedule_type'] == 'school_days') {
                // get exclusion dates
                $exclusions = $this->checkExclusions();

                $msId = $row['milestone_id'];
                $scheduledDate = new DateTime;

                //extract timestamp from datetime object
                $t = $beginDate->getTimestamp();

                for ($i=0; $i < $row['schedule_days']; $i++) {
                    // one day forward
                    $addDay = 86400;

                    // what is the next day?
                    $nextDay = date('w', ($t + $addDay)); //is weekday?
                    $nextDate = date($t + $addDay);       //timestamp of date

                    // subtract weekends
                    if($nextDay == 0 || $nextDay == 6) {
                        $i--;
                    }

                    //subtract exlusions
                    // if ($nextDate == $exclusions['date']) {
                    //     $i--;
                    // }
                    // update timestamp
                    $t = $t + $addDay;
                }

                // update scheduledDate
                $scheduledDate->setTimestamp($t);

                // store in db
                $this->setScheduledMilestoneDate($scheduledDate, $stuId, $msId);
            }


        }
    }

    function addStudentToStudentMilestones($stuId, $msId) {
        $sql = "
            INSERT INTO student_milestone
                (student_id, milestone_id)
            VAlUES 
                ($stuId, $msId)
                ";

        db::execute($sql);
    }

    function setScheduledMilestoneDate ($schedDate, $stuId, $msId) {
        
        // update db 
        $sql = '
            UPDATE student_milestone set date_scheduled="' 
                . date_format($schedDate, "Y-m-d")
                . '"  
            WHERE student_id = "' 
                . $stuId .'" 
            AND milestone_id = "' 
                . $msId .
            '"';

        db::execute($sql);

    }

    function checkExclusions () {
        $excl = [];
        $sql = "
            SELECT date, name
            FROM exclusion_date
            ";
        $results = db::execute($sql);
        
        while ($row = $results->fetch_assoc()) {
            array_push($excl, $row);
        }

        return $excl;

    }

    function getAlerts () {
        $rightNow = new DateTime;
        $rightNow = $rightNow->format('Y-m-d');
        
        $sql = "
            SELECT sm.date_scheduled, 
                    s.student_id,
                    s.first_name,
                    s.last_name,
                    m.milestone_name,
                    m.milestone_id
            FROM student_milestone as sm,
                    student as s,
                    milestone as m 
            WHERE date_completed IS NULL
            AND s.student_id = sm.student_id
            AND m.milestone_id = sm.milestone_id
            ORDER by date_scheduled, s.student_id ASC          
            ";

        $results = db::execute($sql);
        $header = 0;    
        echo "<th>Urgent</th>";
        while ($row = $results->fetch_assoc()) {

            // check for past due milestones
            if ($row['date_scheduled'] < $rightNow) {
                echo "<tr class='urgent " 
                    . $row['student_id']
                    . "-"
                    . $row['milestone_id']
                    . "' id='"
                    . $row['student_id'] 
                    . "'><td>"
                    . $row['first_name'] 
                    . " " 
                    . $row['last_name'] 
                    . " needs " 
                    . $row['milestone_name'] 
                    . " <span class='done "
                    . $row['student_id']
                    . "-"
                    . $row['milestone_id']
                    . "' id='"
                    . $row['milestone_id']                    
                    . "'>done</span>"
                    . "</td></tr>";

            }

            // group all others
            else {
                // check if there's already a table header for this date
                if($header != $row['date_scheduled']) {
                    $header = $row['date_scheduled'];
                    echo "<tr><th>"
                        . $header 
                        . "</th></tr>";        // table header
                }

                echo "<tr class='"
                    . $row['student_id']
                    . "-"
                    . $row['milestone_id']
                    . "' id='"
                    . $row['student_id']
                    . "'><td>"
                    . $row['first_name'] 
                    . " "
                    . $row['last_name']
                    . " needs "
                    . $row['milestone_name']
                    . " by "
                    . $row['date_scheduled']
                    . " <span class='done "
                    . $row['student_id']
                    . "-"
                    . $row['milestone_id']
                    . "' id='"
                    . $row['milestone_id']
                    . "'>done</span></td></tr>";  

            }

        }

    }

    function updateMilestone($stuId, $msId, $dateComp) {
        echo "inside updateMilestone";
        $sql = "
            UPDATE student_milestone
            SET date_completed=\"" 
                . $dateComp 
                . "\"
            WHERE student_id=" 
                . $stuId
                ."
            AND milestone_id="
                .$msId
            ;

            db::execute($sql);
    }

}