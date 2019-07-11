<?php

    require_once '../util/db.php';
    $conn = new mysqli($hn, $un, $pw, $db);

    if($conn->error){
        die("<div class='flash-message'>$conn->error</div>");

    }

    class TLAuser{

        public $uID, $name, $company, $email;
        private $token;
        public function __construct($uID, $name, $company, $email, $token)
            {
                $this->uID = $uID;
                $this->name = $name;
                $this->company = $company;
                $this->email = $email;
                $this->token = $token;
            }
        public function insert()
            {
                $uID = $this->uID;
                $name = $this->name;
                $company = $this->company;
                $email = $this->email;
                $token = $this->token;

                $query = "INSERT into tlausers (uID, name, company, email, token) VALUES('$uID','$name','$company','$email','$token');";
                $result = $conn->query($query);

                if(!$result){
                    die(
                        "<div class='flash-message' style='position: relative;'>$conn->error</div>"
                    );
                }
            }
    }
    class truck{

        public $tID, $tComp, $tMake, $tModel, $tMile;
        public function __construct($tID, $tComp, $tMake, $tModel, $tMile){

            $this->tID = $tID;
            $this->tComp = $tComp;
            $this->tMake = $tMake;
            $this->tModel = $tModel;
            $this->tMile = $tMile;
        }
        public function insert(){

            global $conn;
            $tID = $this->tID;
            $tComp = $this->tComp;
            $tMake = $this->tMake;
            $tModel = $this->tModel;
            $tMile = $this->tMile;

            $query = "INSERT into trucks(tID, tComp, tMake, tModel, tMile) VALUES ('$tID', '$tComp','$tMake','$tModel','$tMile');";
            $result = $conn->query($query);

            if(!$result){
                die(
                    "<div class='flash-message' style='position: relative;'>$conn->error</div>"
                );
            }

        }
        public function select($where){
            
            echo $where;
            global $conn;
            $query = "SELECT * FROM user where $where";
            $result = $conn->query($query);
            if(!$result){
                die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
            }
            $data = $result->fetch_assoc();
            return $data;
        }
    }
    class truckView{

        public $trucks = array();
        public function selectAll(){

            global $events, $conn;
            $query = "Select * from trucks";
            $result = $conn->query($query);

            if (!$result) {
                die(
                    "<div class='flash-message' style='position: relative;'>$conn->error</div>"
                );
            }

            $rows = $result->num_rows;
            for ($j = 0; $j < $rows; $j++) {
                $result->data_seek($j);
                $row = $result->fetch_assoc();
                $truckv = new trucks($row['tID'], $row['tComp'], $row['tMake'], $row['tModel'],$row['tMile']);
                $truckView[] = $truckv;
            }
            return $truckView;
        }

        public function select($where){

            global $conn;
            $query = "Select * from trucks where $where ";
            $result = $conn->query($query);

            if (!$result) {
                die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
            }

            $data = $result->fetch_assoc();
            return $data;
        }

        public function filter($where){

            global $trucks, $conn;
            $query = "SELECT * FROM trucks where $where";
            $result = $conn->query($query);

            if (!$result) {
                die(
                    "<div class='flash-message' style='position: relative;'>$conn->error</div>"
                );
            }

            $rows = $result->num_rows;
            for ($j = 0; $j < $rows; $j++) {
                $result->data_seek($j);
                $row = $result->fetch_assoc();
                $truckv = new trucks($row['tID'], $row['tComp'], $row['tMake'], $row['tModel'],$row['tMile']);
                $truckview[] = $truckv;
            }
            return $truckview;
        }

        public function delete($where){

            global $conn;
            $query = "delete from trucks where $where ";
            $result = $conn->query($query);

            if (!$result) {
                die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
            }
        }

        public function update($tID, $tComp, $tMake, $tModel, $tMile){
            
            global $conn;
            $query = "UPDATE `trucks` SET `tID` = '$tID', `tComp` = '$tComp', `tMake` = '$tMake', `tModel` = '$tModel','tMile' = '$tMile'";
            $result = $conn->query($query);
            
            if (!$result) {
                die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
            }
        }
    }

    class UserView
    {
        public $users = array();
        public function select($where)
        {
            global $conn;
            $query = "Select * from TLAusers where $where ";
            $result = $conn->query($query);
            if (!$result) {
                die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
            }
            $data = $result->fetch_assoc();
            return $data;
        }
        public function delete($where)
        {
            global $conn;
            $query = "delete from TLAusers where $where";
            $result = $conn->query($query);
            if (!$result) {
                die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
            }
        }
        public function update($uID, $name, $company, $email, $token)
        {
            global $conn;
            $query = "UPDATE `TLAusers` SET `uID` = '$uID','name' = '$name', `company` = '$company', `email` = '$email', `token` = '$token'";
            $result = $conn->query($query);
            if (!$result) {
                die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
            }
        }
    }

    function sanitizeString($var){
        
        global $conn;
        $var=strip_tags($var);
        $var=htmlentities($var);
        $var=stripslashes($var);
        return $conn->real_escape_string($var);
    }
    
    function sanitizeMySQL($conn, $var){
        $var = sanitizeString($var);
        $var = $conn->real_escape_string($var);
        return $var;
    }
    
    function destroySession(){
        $_SESSION=array();
        if(session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');
        session_destroy();
    }

?>