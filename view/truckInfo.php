<?PHP

    require_once '../view/navbar.php';

?>
<HTML>
    <HEAD> 
    </HEAD>
    <BODY>
        <h2 style="text-align:center;">Add a Truck</h2>
        <form style="text-align:center; font-family: 'Montserrat', sans-serif;" method="post" action="truckInfo.php">
           Truck ID<br>
            <input type="number" name="tID" placeholder="Truck ID" required><br><br>-->
            Company<br>
            <input type="text" name="tComp" placeholder="Company" required><br><br>
            Truck Make<br>
            <input type="text" name="tMake" placeholder="Make" required><br><br>
            Model<br>
            <input type="text" name="tModel" placeholder="Model" required><br><br>
            Mileage<br>
            <input type="number" name="tMile" placeholder="Mileage" required><br><br>
            <input type="submit" name="rsvp_submit" value="Add Truck"><br>
        </form>
        <br>
        <br>
    </BODY>
</HTML>

<?php
    require_once '../model/model.php';
    require_once '../controller/truckaddCon.php';

    //I don't even fucking know
    /*
    $obj = new truck();

    $tID = $_GET['tID'];
    $truck = $obj->select("tID = $tID");

    session_start();
    $_SESSION['truck'] = $truck;*/


    require_once '../controller/truckInfoCon.php';
    // Create connection
    require_once '../util/db.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    // Check connection
    /*
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } */
    //Query to pull data from DB
    $sql = "SELECT tID, tComp, tMake, tModel, tMile FROM trucks";
    $result = $conn->query($sql);
    //Check if data is present in table
    if ($result->num_rows > 0) {
        //format table and add header
        echo "<table width='100%'>\n";
        echo '<tr>'."\n";
        echo "<th>Truck ID</th>\n". "<th>Company</th>\n"."<th>Make</th>\n"."<th>Model</th>\n". "<th>Mileage</td>\n";
        // output data of each row
        while($row = $result->fetch_assoc()) {
        //Build Table for fetch_assoc data
            echo '<tr>'."\n";
            echo "<td>{$row['tID']}</td>\n". "<td>{$row['tComp']}</td>\n". "<td>{$row['tMake']}</td>\n". "<td>{$row['tModel']}</td>\n". "<td>{$row['tMile']}</td>\n";
            echo '</tr>'."\n";
        }
    } else {
        //Tell user that DB is empty
        echo "0 results";
    }
    $conn->close();
?>
