<?php

    require_once '../view/navbar.php';
    require_once '../util/db.php';
    require_once '../controller/conSignUp.php';

?>

<HTML>
    <HEAD>
        <TITLE>Sign Up</TITLE>
    </HEAD>
    <BODY>
        <br>
        <div>
            <form style="text-align:center; font-family: 'Montserrat', sans-serif;" autocomplete ="off" method='post' action='../view/signup.php'>
                Name:<br>
                <input type='text' name='name' placeholder='Name'><br><br>
                Company<br>
                <input type='text' name='company' placeholder='company'><br><br>
                Email Address:<br>
                <input type='text' name='email' placeholder='Email Address'><br><br>
                Password:<br>
                <input type='password' name='pwd' placeholder='Password'><br><br>
                <input type='submit' value='Signup'>
            </form>
		</div>

    </BODY>
</HTML>