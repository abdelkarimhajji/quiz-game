<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style_up.css">
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>Document</title>
</head>
<body>
<?php include('nav.php')?>
    <section class = "main">
    <div class = "enter1" id = "enter1">
    <div class ="enter2" id = "enter2"> 
    <div class = "lock_div">
        <!-- <i class="fa-solid fa-lock lock"></i> -->
        <p class = "pa">Please Register For Pling, And Good Luck !</p>
    </div>
        <div class = "all_span"><a href="index.php"><span class = "span1">Sign_in</span></a> <span class = "span2">Sign_up</span></div>
    <div class = "all_input2" id = "all_input2">
    <form action="server.php" method = "POST">
        <input type="text" id = "name" class = "inputlogin" name = "fullName" placeholder = "Enter Your Full Name" required>
        <input type="number" id = "phone" class = "inputlogin"name = "phone"  placeholder = "Enter Your Phone" required>
        <input type="email" id = "email2" name = "email" placeholder = "Enter Your E-mail" class = "inputlogin" required style = "margin-bottom: 10px;">
        <?php
        if ( isset($_SESSION['validate']))
        {
            if($_SESSION['validate'] == true)
            {
                echo "<span style = 'color : red; margin-left:55px;'>This Email Is Arely Exist !</span>";
            }
            else
            {
                echo "";
            }
        }
        ?>
        <input type="password" id = "password2" name = "password" placeholder = "Enter Your Password" class = "inputlogin" required>
        <input type="submit" id = "submit2" name = "sign_up" class = "inputlogin btn btn4" value = "sing_up">
    </form>
    </div>
    </div>
        </div>
    </section>
    <?php
            $_SESSION['validate'] = false;
        ?>
    <!-- <script src="JS/main.js"></script> -->
</body>
</html>