<?php 
    $POST_Succesfull = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_COOKIE["username"];
        $password = $_COOKIE["passwd"];

        $title = htmlspecialchars($_POST['title'] ?? '');
        $content = htmlspecialchars($_POST['content'] ?? '');
        // $content = $_POST['content'] ?? '';  // to allow Cross site scripting

        if (login($username, $password)) {
            $topic = "Default";
            if (post($title, $content, $username, $topic)) {
                $POST_Succesfull = true;
            }
        }
    }
?>

<link rel="stylesheet" href="css/create_Blog.css">


<?php if (!$POST_Succesfull) {?>

<div class="login-container">
    <div class="login-box">
        <h1>Create a Blog</h1>


        <form method="POST" action="create_Blog">
            <div class="form-group">
                <label for="title">Title</label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    placeholder="Enter the title for your Blog." 
                    required
                >
            </div>
            <div class="form-group">
                <label for="content">Blog</label>
                <textarea
                    id="content"
                    name="content"
                    placeholder="Content"
                    maxlength="2000"
                    rows="9"
                    ></textarea>
            </div>

            <button type="submit" class="login-btn" id="Button_Login">Submit</button>

        </form>
    </div>
</div>

<?php } else {?>

    <meta http-equiv="refresh" content="0; url=blogs">

<?php } ?>