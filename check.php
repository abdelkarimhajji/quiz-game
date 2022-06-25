<?php
session_start();
$conn = mysqli_connect('localhost','root','','quiz') or die(mysqli_error($conn));
$stmt = $conn->prepare("select *  FROM types where 1");
$stmt->execute();
$result     = $stmt->get_result();

// $row_in     = $result->fetch_assoc();
// $array      = $row_in['email'];
$_SESSION['count'] = 0;
$_SESSION['ansewr'] = 0;
$_SESSION['score'] = 0;
$_SESSION['validID'] = true;
// echo $_SESSION['userID'];
// echo $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="CSS/check.css">
    <title>Document</title>
</head>
<body>
<?php include('nav.php')?>
<section class = "main">
    <div class = "inside">
    <div class = "choice">
        <p>Choose Your Ohoice ...</p>
         <div class = "back">
                <a href="menu.php"><button><i class="fa-solid fa-caret-left"></i> Back</button></a>
        </div> 
    </div>
        <div class = "inside2">
            <!-- first card -->
            <?php
            while($row = $result->fetch_assoc()):
            ?>
            <div class = "outInner">
                <div class = "inner">
                    <img src="IMG/<?php echo $row['img'];?>" alt="" srcset="">
                </div>
                <div class = "desc">
                    <p> <?php echo $row['desc'];?></p>
                </div>
                    <div class="banner-btn">
                        <a href="game.php?play=<?php echo $row['typeID'];?>"><span></span> PLAY</a>
                    </div>
            </div>
            <?php endwhile; ?>
            <!-- fin card -->
        </div>
    </div>
</section>
</body>
</html>