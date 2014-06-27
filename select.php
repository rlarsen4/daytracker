<link rel="stylesheet" href="styles.css">
<?php

// Include Database Class
include('db.php');
include('db_credentials.php');

// Write SQL Statement
$active_students_sql = "
 	SELECT * FROM student WHERE exit_date IS NULL;     
	";

// Execute SQL Statement
$results = db::execute($active_students_sql);

echo "<table>
        <th>FirstName</th><th>Last Name</th><th>Pretest Date</th><th>Tested Date</th>";
    while ($row = $results->fetch_assoc()) { 
        echo "<tr>" 
            . "<td>"
            . $row['first_name'] 
            . "</td><td>" 
            . $row['last_name'] 
            . "</td><td>" 
            . $row['begin_date']
            . "</td><td>"
            . $row['tested_date']
            . "</td>";
    }
echo "</table>";