<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="style/login.css" />
        <title>Login form</title>
        <?php session_start(); ?>
    </head>
    
    <body>
        <div class="main">
            <div class="loginwrapper">
                <div class="innerwrapper">
                    <div class="titleheader">
                        <h1>AskLocal</h1>
                    </div>

                    <div class="imgcontainer">
                        <img src="images/Logo.jpg" alt="Logo">
                    </div>

                    <form class="login" action="index.php" method="POST">
                        <input type="text" placeholder="Username" id="username" name="username"> 
                        <input type="password" placeholder="Password" id="password"> 

                        <input id="signinbutton" type="submit" label="Sign In" value="Sign In">

                        <a href="#" class="forgot">Forgot Password?</a>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
