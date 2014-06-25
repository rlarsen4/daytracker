<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>DayTracker</title>
     <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="content">
        <div class="includeheader">
            <?php include("header.php"); ?>
        </div>    
        <div class="dashboard">
            <div class="alerts inactive">
                <?php include("alerts.php"); ?>
            </div>
            <div class="add_edit ">
                <?php include("add_edit.php"); ?>
            </div>
            <div class="reports">
                <?php include("reports.php"); ?>
            </div>
            <div class="calendar">
                <?php include("calendar.php"); ?>
            </div>
        </div>
        <div class="nav">
             <?php include("nav.php"); ?>
        </div>
    </div>
</body>
</html>