<?php

    if (isset($_POST['uID'])) {
        require_once '../model/model.php';
        $uID = sanitizeMySQL($conn, $_POST['uID']);
        $name = sanitizeMySQL($conn, $_POST['name']);
        $company = sanitizeMySQL($conn, $_POST['company']);
        $email = sanitizeMySQL($conn, $_POST['email']);
        
        // DB security. Hashes will be stored in DB. 
        $salt1 = 'qm&h*';
        $salt2 = 'pg!@';
        $pwd = sanitizeMySQL($conn, $_POST['pwd']);
        $token = hash('ripemd128', "$salt1$pwd$salt2");
        
        $user = new TLAuser($uID, $name, $company, $email, $token);
        $user->insert();
        $obj = new UserView();
        $tmp = $obj->select("uID = '$uID'");
        $uID = $tmp['uID'];
        session_start();
        $_SESSION['uID'] = $uID;
        $_SESSION['name'] = $name;
        $_SESSION['company'] = $company;
        $_SESSION['email'] = $email;
        $_SESSION['token'] = $token;

    header("Location: ../view/login.php");
    exit();
    }

?>