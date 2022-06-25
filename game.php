<?php
session_start();
$conn = mysqli_connect('localhost','root','','quiz') or die(mysqli_error($conn));
if(isset($_GET['play']))
{
    
    if($_GET['play'] == 2 && $_SESSION['validID'] == true)
    {
        $_SESSION['validID'] = false;
        $_SESSION['count'] = 10;  
    }
    $_SESSION['count'] = $_SESSION['count'] + 1;
    $test = $_SESSION['count'];
    $_SESSION['type'] = $_GET['play'];
    $type = $_SESSION['type'];
    
    $stmt = $conn->prepare("select *  FROM quetions where typeID='".$type."' and quetionID ='".$test."'");
    $stmt->execute();
    $result     = $stmt->get_result();
    $row_in     = $result->fetch_assoc();
    $array      = $row_in['quetion'];
    $stmt = $conn->prepare("select *  FROM types where typeID='".$type."'");
    $stmt->execute();
    $result     = $stmt->get_result();
    $row_in_con     = $result->fetch_assoc();
    $_SESSION['typofcn'] = $row_in_con['names'];

    $stmt2 = $conn->prepare("select ansewr  FROM ansewrs where quetionID='".$test."'");
    $stmt2->execute();
    $result2     = $stmt2->get_result();

}
if (isset($_POST['check']))
    {
            $value = $_POST['check'];
            $stmt3 = $conn->prepare("select validate  FROM ansewrs where ansewr='".$value."'");
            $stmt3->execute();
            $result3     = $stmt3->get_result();
            $row_in3     = $result3->fetch_assoc();
            $array3      = $row_in3['validate'];
            if ($array3 == 1)
            {
                $_SESSION['score'] = $_SESSION['score'] + 1;
                $score = $_SESSION['score'];
            } 
}

$userID = $_SESSION['userID'];

if ($test == 11 && $type == 1)
{
    $score = $_SESSION['score'];
    $req = "INSERT INTO score (typeID,score,userID) values ('$type','$score','$userID')";
    $res = mysqli_query($conn, $req);
    header("location: cong.php");
}

if ($test == 21 && $type == 2)
{
    $score = $_SESSION['score'];
    $req = "INSERT INTO score (typeID,score,userID) values ('$type','$score','$userID')";
    $res = mysqli_query($conn, $req);
    header("location: cong.php");
}

$score = $_SESSION['score'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="CSS/game.css">
    <title>Document</title>
</head>
<body>
<?php include('nav.php')?>
<section class = "main">
    <div class = "inside">
        <div class = "inside2">
            <div class = "back_score">
                <div class = "back">
                <a href="server.php?test=<?php echo "1";?>"><button><i class="fa-solid fa-caret-left"></i> Back</button></a>
                </div>
                <div class = "score">
                    <p>SCORE : <?php echo $score;?></p>
                </div>
            </div>
            <!-- quetion -->
            <div class = "quetion">
            <?php if ($_GET['play'] == 1 || $_GET['play'] == 3):?>
                <div class = "photo">
                    <img src="IMG/<?php echo $array;?>" alt="">
                </div>
            <?php endif; ?>
            <?php if ($_GET['play'] == 2 ):?>
                <div class = "div_quetion">
                    <p class = "quetion"><?php echo $array;?></p>
                </div>
            <?php endif; ?>
            </div>
            <!-- ansewr -->
            <div class = "ansewr">
            <!--  -->
                <div class = "group_answer">
                    <form action="game.php?play=<?php echo $_GET['play']; ?>" method = "POST" >
                <?php
                while($row = $result2->fetch_assoc()):
                ?>
                    <div><label class = "container"><input type="radio" class="radio"  name="check" id = "checked1" value = "<?php echo $row['ansewr'];?>"  onclick = "checked1()"/><?php echo $row['ansewr'];?><span class="checkmark"></span></label></div>
                <?php endwhile; ?>
                <input type="submit" name = "test" class = "next" value = "NEXT">
                </div>
                </form>
            </div>
            <!-- fin   ansewr -->
        </div>
    </div>
</section>
<script src="JS/main.js"></script>
</body>
</html>