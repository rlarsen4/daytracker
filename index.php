<?php   
error_reporting(E_ALL);
    ini_set('display_errors', 'on');

include_once('resources/MainController.php');

$mainController = new MainController();

$path = $_SERVER['REQUEST_URI'];



if($path == "/daytracker/index.php"){
  $mainController->defaultAction();
}
elseif($path == "/daytracker/index.php/detail"){
  echo "Show detail";
}
elseif($path == "/daytracker/index.php/milestone"){
  $mainController->milestoneCompletedAction();
}

elseif($path == "/daytracker/index.php/newStudent") {
    $mainController->newStudentAction();
}

elseif($path == "/daytracker/index.php/add_edit") {
    $mainController->findStudentAction();
}
else
{
  $mainController->defaultAction();
}

