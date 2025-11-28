
<link rel="stylesheet" href="css/user_res.css">

<div class="message-container">
    <div class="error-box">
        <h1>Was not successfully executed!</h1>
        <p><?= $error?></p>
        <?php if(!isset($not_contact_Admin)) : ?>
            <a href="mailto:waldmanuel76@gmail.com">Please report this to the Admin.</a>
        <?php endif ?>
    </div>
</div>

<!-- <meta http-equiv="refresh" content="3; url=user"> -->