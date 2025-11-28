<?php 
    $POST_Succesfull = false;

    $username = $_COOKIE["username"];
    $password = $_COOKIE["passwd"];

    // $content = $_POST['content'] ?? '';  // to allow Cross site scripting

    if (login($username, $password)) {
        $user = get_USER($username);
    } else { ?> 
        <meta http-equiv="refresh" content="0; url=login">
    <?php }
?>

<link rel="stylesheet" href="css/user.css">


<div class="user-container">
    <div class="user-box">
        <h1>
            <?php 
                if (date('H') < 12) {
                    echo "Good morning, ";
                } elseif (date('H') < 17) {
                    echo "Good day, ";
                } else {
                    echo "Good evening, ";
                } 
                echo $user["Name"]
            ?>
        </h1>

        <form enctype="multipart/form-data" method="POST" action="user_picture">
            <div class="form-group">
                <label for="Change-Picture">Profile Picture</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="16777" />
                <input 
                    type="file" 
                    id="Change-Picture" 
                    name="Change-Picture" 
                    accept=".jpg,.png,.ico"
                    required
                >
            </div>
            <button type="submit" class="user-btn" id="Button_user">Change Profilepicture</button>
        </form>

        <form method="POST" action="user_username">
            <div class="form-group">
                <label for="Change-Username">Username</label>
                <input 
                    type="text" 
                    id="Change-Username" 
                    name="Change-Username" 
                    placeholder="New username" 
                    required
                >
            </div>
            <button type="submit" class="user-btn" id="Button_user">Change username</button>
        </form>

        <form method="POST" action="user_changepasswd">
            <div class="form-group">
                <label for="Change-Password">Password</label>
                
                <?php if (isset($error)) : ?>
                    <div class="change_Passwd_failed">
                        <p><?= $error?></p>
                    </div>
                <?php endif; ?>
                <input 
                    type="password" 
                    id="Change-Password" 
                    name="Change-Password" 
                    placeholder="New password" 
                    required
                >
                <input 
                    type="password" 
                    id="Change-Password2" 
                    name="Change-Password2" 
                    placeholder="Retipe the password" 
                    required
                >
            </div>
            <button type="submit" class="user-btn" id="Button_user">Change Password</button>
        </form>
        <form method="POST" action="logout">
            <button type="submit" class="user-btn" id="Button_user">Logout</button>
        </form>
    </div>
</div>
