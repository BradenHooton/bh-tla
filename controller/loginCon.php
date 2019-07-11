<?php


//HAVE NOT UPDATED!!!



require_once '../util/db.php';

    if (isset($_POST['UtahID'])) {
        require_once '../model/model.php';
        $UtahID = sanitizeMySQL($conn, $_POST['UtahID']);
        $password = sanitizeMySQL($conn, $_POST['pwd']);
        $salt1 = 'qm&h*';
        $salt2 = 'pg!@'; 
        $input_token = hash('ripemd128', "$salt1$password$salt2");
        $obj = new UserView();
        $tmp = $obj->select("UtahID = '$UtahID'");
        $db_UtahID = $tmp['UtahID'];
        $db_LastName = $tmp['LastName'];
        $db_username = $tmp['username'];
        $db_FirstName = $tmp['FirstName'];
        $db_CurrentYear = $tmp['CurrentYear'];
        $db_EmailAddress = $tmp['EmailAddress'];
        $db_token = $tmp['token'];
        $db_CurrentCompany = $tmp['CurrentCompany'];
        $db_PositionatCompany = $tmp['PositionatCompany'];
        $db_role = $tmp['role'];	
            
        if ($input_token == $db_token) {
            
            //$user = new User($username);
            
            session_start();
            $_SESSION['UtahID'] = $db_UtahID;
            $_SESSION['LastName'] = $db_LastName;
            $_SESSION['FirstName'] = $db_FirstName;
            $_SESSION['username'] = $db_username;
            $_SESSION['CurrentYear'] = $db_CurrentYear;
            $_SESSION['EmailAddress'] = $db_EmailAddress;
            $_SESSION['token'] = $db_token;
            $_SESSION['CurrentCompany'] = $db_CurrentCompany;
            $_SESSION['PositionatCompany'] = $db_PositionatCompany;
            $_SESSION['role'] = $tmp['role'];
            
            $message = "Successful Login";
            echo "script type='text/javascript'>alert('$message');/script>";
            header("Location: ../view/index.php?message=Successful");
            exit();
        } else {
            $message = "Login Failed: Please Verify you are using the correct credentials.";
            echo "script type='text/javascript'>alert('$message');window.location.href = 'loginform.php';</script>";
            exit();
}
}
?>