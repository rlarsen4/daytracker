
<?php 
/*student_manager.php connects to database and runs queries
    to build data model.
*/
class StudentManager
{
    
    function __construct()
    {
        # code...
    }

    public function getAlerts()
    {
        $alerts;
        $sql = "
            SELECT s.student_id, s.first_name, s.last_name, sm.scheduled_date
            FROM student as s
            ";

    }
    public function getActiveStudents()
    {        
        $sql = "
            SELECT * FROM student WHERE exit_date IS NULL AND admin_id = 1
            ";
        $results = db::execute($sql);

        $items = $results->fetch_assoc();

        return $results;
        // while ($row = $results->fetch_assoc()) {
        // print_r($row);
        // echo "<br>";       
        // }
    }
    public function getSelectedStudent($stuId) 
    {
        $sql = "
             SELECT s.student_id, first_name, last_name, date_of_birth, begin_date,
                    date_completed, exit_date 
             FROM student as s, student_milestone
             WHERE s.student_id =  $stuId  
             ";
    

        $results = db::execute($sql);

        $items = $results->fetch_assoc();

        $selectedStudent = new Student;
        
        $selectedStudent->setStudentId($stuId);        
        $selectedStudent->setFirstName($items['first_name']);
        $selectedStudent->setLastName($items['last_name']);
        $selectedStudent->setDateOfBirth($items['date_of_birth']);
        $selectedStudent->setBeginDate($items['begin_date']);
        $selectedStudent->setExitDate($items['exit_date']);

        $selectedStudentMilestones = new Milestone();
        $aMilestoneManager = new MilestoneManager();
        
        $aMilestoneManager->getSelectedStudentTestedDate($stuId, $selectedStudentMilestones);
        $aMilestoneManager->getSelectedStudentScreenedDate($stuId, $selectedStudentMilestones);
        $aMilestoneManager->getSelectedStudentReportCardDate($stuId, $selectedStudentMilestones);
        
        echo ('&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&');
        print_r($selectedStudentMilestones);
        echo ('&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&');

        $selectedStudent->setMilestones($selectedStudentMilestones);
        
        // $selectedStudent = json_encode($selectedStudent);
        // print_r($selectedStudent);

        return ($selectedStudent);
    }

    public function createNewStudent($first_name, $last_name, 
                    $date_of_birth, $begin_date) {

        $sql = "
            INSERT into student (first_name, last_name, date_of_birth, begin_date)
            VALUES ('"
                . $first_name
                . "', '"
                . $last_name
                . "', '"
                . $date_of_birth
                . "', '"
                . $begin_date
                . "')
            ";

            $results = db::execute($sql);

            $newStudentId = $results->insert_id;

            return($newStudentId);
    }
    
    public function buildStudentSelect () {
        $roster = $this->getActiveStudents();
        echo "<option>";        
        while ($row = $roster->fetch_assoc()) {
            echo "<option value='"
                . $row['student_id']
                . "'>"
                . $row['first_name']
                . " "
                . $row['last_name']
                . "</option>";
        }
    }

}

?>
