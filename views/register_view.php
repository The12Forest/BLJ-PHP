<link rel="stylesheet" href="css/register.css">

<?php 

// require "function/user_management.php"; //Eigene Bibliothek für register() und user()
// Already set in header.php

$register_Failed = false;
$if_POST = false;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $if_POST = true;
    $username = $_POST['username'] ?? '';
    $name = $_POST['name'] ?? '';
    $password = hash("sha256", $_POST['password'] ?? '');
    $password2 = hash("sha256", $_POST['password2'] ?? '');
    $remember = isset($_POST['remember']) ? true : false;

    if ($password === $password2) {
        if ($username == '' || $name == '' || $password == '' || $password2 == '') {
            $register_Failed = true;
        } else {
            $register_Failed = !register($name, $username, $password);
        }
        
        if ($remember && !$register_Failed) {
            setcookie("passwd", $password, time() + (30 * 24 * 60 * 60), "/");
            setcookie("username", $username, time() + (30 * 24 * 60 * 60), "/");
            setcookie("remember", "true", time() + (30 * 24 * 60 * 60), "/");
        }
    } else {
        $register_Failed = true;
    }


} else {
    if (isset($_COOKIE['remember'])) { 

        $username = $_COOKIE["username"];
        $password = $_COOKIE["passwd"];
        
        $register_Failed = !login($username, $password);

    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" || $register_Failed) {
?>

    <div class="register-container">
        <div class="register-box">
            <h1>Register</h1>

            <?php if ($register_Failed) :?>
                <div class="div_Register-failed">
                    <p>Register failed!</p>
                    <p>Username already taken or passwords don't match.</p>    
                </div>
            <?php endif;?>


            <form method="POST" action="register">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        placeholder="Enter your legal name" 
                        <?php if ($if_POST) {echo "value="; echo $_POST['name'] ?? '';} ?>
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        placeholder="Enter your username" 
                        <?php if ($if_POST) {echo "value="; echo $_POST['username'] ?? '';} ?>
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

                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        id="password2" 
                        name="password2" 
                        placeholder="Renter your password" 
                        required
                    >
                </div>

                <div class="form-group checkbox">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>

                <button type="submit" class="register-btn" id="Button_Register">Register</button>
            </form>

            <div class="register-footer">
                <p>Already have an account? <a href="register">register here</a></p>
                <p><a href="forgot-password">Forgot your password?</a></p>
            </div>
        </div>
    </div>

<?php } else { ?>
    <meta http-equiv="refresh" content="0; url=create_Blog">
<?php }?>
