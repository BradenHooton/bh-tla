<?php

    require_once '../util/db.php';
    $conn = new mysqli($hn, $un, $pw, $db);
        if($conn->error){
            die("$conn->error");
        }

    if(isset($_POST['uID'])){

        $tID = $_POST['tID'];
        $tComp = $_POST['tComp'];
        $tMake = $_POST['tMake'];
        $tModel = $_POST['tModel'];
        $tMile = $_POST['tMile'];

        $query = "DELETE FROM trucks WHERE $tID = 'tID';";
        $result = $conn->query($query);
        if(!$result){
            "<div class='flash-message' style='position: relative;'>$conn->error</div>";
        }else{
            echo "<script type='text/javascript'>alert('deleted successfully!')</script>";
        }
    }

?>