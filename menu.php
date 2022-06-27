<?php
session_start();
?>
<?php if(isset($_SESSION['user'])):?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="CSS/menu.css">
    <title>Document</title>
</head>
<body>
<?php include('nav.php')?>
<section class = "main">
    <div class = "inside">
        <div class = "inside2">
        <div class = "user">
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="banner-btn">
            <a href="check.php"><span></span> PLAY</a>
        </div>
        <div class="banner-btn">
            <a href="profile.php"><span></span> PROFILE</a>
        </div>
        <div class="banner-btn">
            <a href="log_out.php"><span></span> LOG-OUT</a>
        </div>
        <!-- fin buton -->
        </div>
    </div>
    </div>
</section>
</body>
</html>
<?php else :        header("location: index.php");
?>

<?php endif?>