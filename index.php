<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>DayTracker</title>
     <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="phone">
        <div class="content">
            <div class="includeheader">
                <?php include("header.php"); ?>
            </div>    
            <div class="nav">
                 <?php include("nav.php"); ?>
            </div>
            <div class="dashboard">
                <div class="alerts ">
                    <?php include("alerts.php"); ?>
                </div>
                <div class="add_edit inactive">
                    <?php include("add_edit.php"); ?>
                </div>
                <div class="reports inactive">
                    <?php include("reports.php"); ?>
                </div>
                <div class="calendar inactive">
                    <?php include("calendar.php"); ?>
                    <!--if super_user only-->
                    <?php include("calendar_admin.php"); ?>
                </div>
            </div>
        </div>
    </div>
    <script src="jquery-1.11.1.min.js"></script>
    <script src="jquery-ui-1.10.4.custom.min.js"></script>
</body>
</html>