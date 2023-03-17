<?php

require "../dbBroker.php";
require "../model/reprezentacija.php";

if(isset($_POST['teamID'])) {
    $myArray = Reprezentacija::getById($_POST['teamID'], $conn);
    echo json_encode($myArray);
}
?>