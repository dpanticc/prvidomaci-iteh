<?php

require "../dbBroker.php";
require "../model/reprezentacija.php";

if (isset($_POST['teamID']) && isset($_POST['team']) && isset($_POST['group'])
    && isset($_POST['wins']) && isset($_POST['draws'])&& isset($_POST['losses'])) {
        $draws = $_POST['draws'];
        $wins = $_POST['wins'];
        $points = $wins*3 + $draws;
        $status = Reprezentacija::update($_POST['teamID'], $_POST['team'], $_POST['group'], $_POST['wins'], $_POST['draws'], $_POST['losses'],$points, $conn);
        if ($status) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => $status]);
        }
}