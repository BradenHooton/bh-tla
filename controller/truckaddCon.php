<?php

require_once '../util/db.php';
$conn = new mysqli($hn, $un, $pw, $db);
    if($conn->error){
        die("$conn->error");
    }

if(isset($_POST['tID'])){

    $tID = $_POST['tID'];
    $tComp = $_POST['tComp'];
    $tMake = $_POST['tMake'];
    $tModel = $_POST['tModel'];
    $tMile = $_POST['tMile'];

    $query = "INSERT INTO trucks(tID, tComp, tMake, tModel, tMile) VALUES ('$tID','$tComp','$tMake','$tModel','$tMile');";
    $result = $conn->query($query);
    if(!$result){
        "<div class='flash-message' style='position: relative;'>$conn->error</div>";
    }else{
        echo "<script type='text/javascript'>alert('deleted successfully!')</script>";
    }
}

?>