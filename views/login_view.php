<link rel="stylesheet" href="css/login.css">

<?php 

// require "function/user_management.php"; //Eigene Bibliothek für login() und user()
// Already set in header.php

$login_Failed = true;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'] ?? '';
    $password = hash("sha256", $_POST['password'] ?? '');
    $remember = isset($_POST['remember']) ? true : false;

    $login_Failed = !login($username, $password);

    if (!$login_Failed) {
        // Cookies setzten wenn "Remember me" angehakt ist
        if ($remember) {
            setcookie("passwd", $password, time() + (30 * 24 * 60 * 60), "/");
            setcookie("username", $username, time() + (30 * 24 * 60 * 60), "/");
            setcookie("remember", "true", time() + (30 * 24 * 60 * 60), "/");
        } else {
            setcookie("passwd", $password, time() + (18 * 60 * 60), "/");
            setcookie("username", $username, time() + (18 * 60 * 60), "/");
            setcookie("remember", "true", time() + (18 * 60 * 60), "/");
        }
    }

} else {
    if (isset($_COOKIE['remember']) ? true : false) { 

        $username = $_COOKIE["username"];
        $password = $_COOKIE["passwd"];
        
        $login_Failed = !login($username, $password);

    }
}

if ($login_Failed || $_SERVER["REQUEST_METHOD"] == "GET") {
?>

    <div class="login-container">
        <div class="login-box">
            <h1>Login</h1>

            <?php if ($login_Failed && $_SERVER["REQUEST_METHOD"] != "GET") :?>
                <div class="div_Login-failed">
                    <p>Login failed!</p>
                    <p>Wrong Username or Password</p>    
                </div>
            <?php endif;?>


            <form method="POST" action="login">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        placeholder="Enter your username" 
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Enter your password" 
                        required
                    >
                </div>

                <div class="form-group checkbox">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>

                <button type="submit" class="login-btn" id="Button_Login">Login</button>
            </form>

            <div class="login-footer">
                <p>Don't have an account? <a href="register">Sign up here</a></p>
                <p><a href="forgot-password">Forgot your password?</a></p>
            </div>
        </div>
    </div>

<?php } else { ?>
    <meta http-equiv="refresh" content="0; url=create_Blog">
<?php }?>
<!-- <script src="JavaScript/login.js"></script> -->