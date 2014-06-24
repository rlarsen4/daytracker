<?php

// Include Database Class
include('db.php');
include('db_credentials.php');

// Write SQL Statement
$sql = "
 	SELECT * FROM studentTbl WHERE exitDate IS NULL;     
	";

// Execute SQL Statement
$results = db::execute($sql);

echo "<table>";
    while ($row = $results->fetch_assoc()) { 
        echo "<tr>" 
            . "<td>"
            . $row['firstName'] 
            . "</td><td>" 
            . $row['lastName'] 
            . "</td><td>" 
            . $row['beginDate']
            . "</td><td>"
            . $row['testedDate']
            . "</td>";
    }
echo "</table>";