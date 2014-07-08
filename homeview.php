<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Day Tracker</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Syncopate:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="phone">
        <div class="content">
            <header>
                <?php include_once 'header.php'; ?>                
            </header>
            <nav>
                <?php include_once 'nav.php'; ?>
            </nav>
            <main>
                <div class="dashboard">
                    <div class="alerts ">
                        <?php include "alerts.php" ?>
                    </div>
                    <div class="add_edit inactive" id="add_edit">
                        <?php include "add_edit.php" ?>
                    </div>
                    <div class="reports inactive" id="reports">
                        <?php include "reports.php" ?>
                    </div>
                    <div class="calendar inactive" id="calendar">
                        <?php include "calendar.php" ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
<script src="/daytracker/js/jquery-1.11.1.min.js"></script>
<script src="/daytracker/js/main.js"></script>
<script src="../daytracker/bower_components/ReptileForms/dist/reptileforms.js"></script>
</body>
</html>
    