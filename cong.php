<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="CSS/cong.css">
    <title>Document</title>
</head>
<body>
<?php include('nav.php')?>
<section class = "main">
    <div class = "inside">
        <div class = "inside2">
            <div class = "text">
            <?php 
                if ( $_SESSION['score'] > 5):
            ?>
            <h1>🎉🎉Congratulations <span><?php echo $_SESSION['user'];?></span>🎉🎉</h1>
            <div class = "paragraf">
                <p style = "display:inline;">Your Score in Game Of <p style = "display:inline;"><?php echo $_SESSION['typofcn'];?></p> Is : <span style = "color : #10b14198; font-size:20px;"><?php echo $_SESSION['score'];?></span> And Good Luck !</p>
            </div>
            <?php endif; ?>
            <?php 
                if ( $_SESSION['score'] < 5):
            ?>
            <h1>😭😭Sorry <span><?php echo $_SESSION['user'];?></span>😭😭</h1>
            <div class = "paragraf">
                <p style = "display:inline;">Your Score in Game Of <p style = "display:inline;"><?php echo $_SESSION['typofcn'];?></p> Is : <span style = "color : #10b14198; font-size:20px;"><?php echo $_SESSION['score'];?></span> And Good Luck !</p>
            </div>
            <?php endif; ?>
            <div class = "back">
                <a href="check.php"><button><i class="fa-solid fa-caret-left"></i> Back</button></a>
            </div> 
            </div>
        </div>
    </div>
</section>
</body>
</html>