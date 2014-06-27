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
                <?php include 'nav.php'; ?>
            </nav>
            <main>
                <div class="dashboard">
                    <div class="alerts">
                        <table>
                            <th>
                                <?php 
                                    date_default_timezone_set('UTC');
                                    $today = getdate();
                                    echo $today['weekday'] . ", " . $today['month'] . " " . $today['mday'];
                                ?>
                            </th>
                            <?php 
                            while ($row = $results->fetch_assoc()) { 
                             ?>
                            <tr> 
                                <td>
                                    <a href="*">
                                        <?=$row['first_name']?>
                                        needs to be tested. 
                                        <input type="checkbox" name=>
                                    </a>
                                </td>
                            </tr>
                            <?php 
                            }
                            ?>
                            <th>
                                <?php 
                                    date_default_timezone_set('UTC');
                                    $today = getdate();
                                    echo $today['weekday'] . ", " . $today['month'] . " " . $today['mday'];
                                ?>
                            </th>                                
                        </table>

                    </div>
                </div>
            </main>
            
        </div>
        
    </div>
</body>
</html>
    