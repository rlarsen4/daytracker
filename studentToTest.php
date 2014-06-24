<?php

// Include Database Class
include('db.php');
include('db_credentials.php');
// include('Student.php');

// Write SQL Statement
$sql = "
    SELECT * FROM studentTbl WHERE exitDate IS NULL;     
    ";

// Execute SQL Statement
$results = db::execute($sql);

echo "<table>"
     . "<tr>" 
     . "<td>First Name</td>"
     . "<td>Last Name</td>"
     . "<td>Begin Date</td>"
     . "<td>Expected Test Date</td>"
     . "<td>Tested Date</td>";
    while ($row = $results->fetch_assoc()) {
        // $aStudent = new Student($row);
        // echo $aStudent; 
        $studentID = $row['studentID'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        // $beginDate = new date(Y-m-j);
        $beginDate = $row['beginDate'];
        // $expectedTestDate = $beginDate + 10;
        $testedDate = $row['testedDate'];
        $expectedScreenDate = 10;
        $screenedDate = $row['screenedDate'];
        $reportCardDate = $row['reportCardDate'];
        echo "<tr>" 
            . "<td>"
            . $firstName
            . "</td><td>" 
            . $lastName 
            . "</td><td>" 
            . $beginDate
            . "</td><td>" 
            . $expectedTestDate
            . "</td><td>"
            . $testedDate
            . "</td>";
    }
echo "</table>";