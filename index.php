<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>Document</title>
</head>
<body>
    <?php include('nav.php');?>
    <section class = "main">
    <div class = "enter1" id = "enter1">
    <div class ="enter2" id = "enter2"> 
    <div class = "lock_div">
        <!-- <i class="fa-solid fa-lock lock"></i> -->
        <p class = "pa">Please Register For Pling, And Good Luck !</p>
    </div>
    
        <div class = "all_span"><span class = "span1" id = "span1" onclick = "singIn()">Sign_in</span> <a href="eroorup.php"><span class = "span2" id = "span2" onclick = "singUp()">Sign_up</span></a></div>
    <div class = "all_input" id = "all_input">
        <form action="server.php" method = "POST">
            <input type="email" id = "email" name = "email" placeholder = "Enter Your E-mail" class = "inputlogin" require>
            <input type="password" id = "password" name = "password" placeholder = "Enter Your Password" class = "inputlogin" require style = "margin-bottom: 10px;">
            <?php 
                if ( isset($_SESSION['submit']))
                {
                    if ( $_SESSION['submit'] == true)
                    {
                    echo "<span style = 'color : red; margin-left:55px;'>This Email Or Password Not Exist !</span>";
                    }
                }
            ?>
            <input type="submit" id = "submit" name = "submit" class = "inputlogin btn btn4">
        </form>
    </div>
    <!-- <div class = "all_input2" id = "all_input2">
        <form action="index.php">
            <input type="text" id = "name" class = "inputlogin" placeholder = "Enter Your Full Name" required>
            <input type="number" id = "phone" class = "inputlogin" placeholder = "Enter Your Phone" required>
            <input type="email" id = "email2" name = "email2" placeholder = "Enter Your E-mail" class = "inputlogin" required>
            <input type="password" id = "password2" name = "password2" placeholder = "Enter Your Password" class = "inputlogin" required>
            <input type="submit" id = "submit2" name = "submit2" class = "inputlogin btn btn4" value = "sing_up">
        </form>
    </div> -->
    </div>
        </div>
    </section>
    <?php 
    $_SESSION['submit'] = false;
    ?>
    <script src="JS/main.js"></script>
</body>
</html>