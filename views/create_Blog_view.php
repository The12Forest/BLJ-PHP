<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
    }

?>

<link rel="stylesheet" href="css/create_Blog.css">




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
                <label for="text">Blog</label>
                <textarea
                    id="text"
                    name="text"
                    placeholder="Content"
                    maxlength="2000"
                    rows="6"
                    ></textarea>
            </div>

            <button type="submit" class="login-btn" id="Button_Login">Submit</button>

        </form>
    </div>
</div>