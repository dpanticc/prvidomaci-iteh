<?php
require "../dbBroker.php";
require "../model/reprezentacija.php";

if(isset($_POST['TeamID'])){
    
    $status = Reprezentacija::deleteById($_POST['TeamID'], $conn);
    if($status){
        echo 'Success';
    }else{
        echo 'Failed';
    }
}
?>