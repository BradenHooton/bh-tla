<?php

    require_once '../model/model.php';
    require_once '../util/db.php';

    $conn = new mysqli($hn, $un, $pw, $db);
        if($conn->error){
            die("$conn->error");
        }

    if (isset($_POST['tID'])){
        $tID = $_POST['tID'];
        $tComp = $_POST['tComp'];
        $tMake = $_POST['tMake'];
        $tModel = $_POST['tModel'];
        $tMile = $_POST['tMile'];

        //Took out tID
        $query = "INSERT into trucks (tID, tComp, tMake, tModel, tMile) VALUES ('$tID','$tComp', '$tMake','$tModel','$tMile');";
        $result = $conn->query($query);
        if (!$result){
            die(
                "<div class = 'flash-message' style='position: relative;'>$conn->error</div>"
            );
        }

    }
/*  V1. Not sure what is going on in this snippet
    $obj = new TruckView();

    $tID = $_GET['tID'];
    $truck = $obj->select("EventID = $tID");

    session_start();
    $_SESSION['truck'] = $Truck;
*/
?>