<?php

class Reprezentacija
{
    public $teamID;
    public $team;
    public $group;
    public $wins;
    public $draws;
    public $losses;
    public $points;

    public function __construct($teamID = null, $team = null, $group = null, $wins = null, $draws = null, $losses = null, $points = null)
    {
        $this->teamID = $teamID;
        $this->team = $team;
        $this->group = $group;
        $this->wins = $wins;
        $this->draws = $draws;
        $this->losses = $losses;
        $this->points = $points;
    }

    public static function getAll(mysqli $conn)
    {
        $q = "SELECT * FROM reprezentacije";
        return $conn->query($q);
    }
    public static function deleteById($teamID, mysqli $conn)
    {
        $q = "DELETE FROM reprezentacije WHERE TeamID=$teamID";
        return $conn->query($q);
    }

    public static function add($team, $group, $wins, $draws, $losses, $points,mysqli $conn)
    {

        $q = "INSERT INTO reprezentacije(Team, `Group`, Wins, Draws, Losses, Points) values('$team', '$group', '$wins', 
         '$draws', '$losses', '$points')";
        return $conn->query($q);
    }


    public static function update($teamID, $team, $group, $wins, $draws, $losses, $points, mysqli $conn)
    {
        $q = "UPDATE reprezentacije SET Team='$team', `Group`='$group', Wins=$wins, Draws=$draws, Losses=$losses, Points=$points WHERE TeamID=$teamID";
        return $conn->query($q);
    }
    public static function getById($teamID, mysqli $conn)
    {
        $q = "SELECT * FROM reprezentacije WHERE teamID=$teamID";
        $row = array();
        if ($result = $conn->query($q)) {

            $row = $result->fetch_assoc();

        }
        return $row;
    }

    public static function getLast(mysqli $conn)
    {
        $q = "SELECT * FROM reprezentacije ORDER BY teamID DESC LIMIT 1";
        return $conn->query($q);
    }
}