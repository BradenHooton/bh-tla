<?php
    require_once '../view/navbar.php';
    require_once '../util/db.php';
    require_once '../controller/loginCon.php';
?>

<HTML>
    <HEAD>
        <TITLE>Login</TITLE>
    </HEAD>
    <BODY>
        <br>
        <div>
            <form style="text-align:center; font-family: 'Montserrat', sans-serif;" autocomplete ="off" method='post' action='login.php'>
                Email Address:<br>
                <input type='text' name='email' placeholder='Email Address'><br><br>
                Password:<br>
                <input type='password' name='pwd' placeholder='Password'><br><br>
                <input type='submit' value='Login'>
            </form>
		</div>

    </BODY>
</HTML>
