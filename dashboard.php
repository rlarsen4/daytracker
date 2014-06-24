<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="header"></div>
<div class="main"> 

    <!-- alerts display here -->
    <legend>Alerts</legend>
    <div class="alerts">  
        <?php  
            include('studentToTest.php');
        ?>
    </div>
    <div class="controls">
        <button class="editCalendar">Edit no school days</button>
        <button class="addUpdateStudent">Add/Update</button>
        <button class="reports">Reports</button>
    </div>
</div>
    
</body>
</html>