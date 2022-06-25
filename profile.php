<?php
session_start();
$conn = mysqli_connect('localhost','root','','quiz') or die(mysqli_error($conn));
$userid = $_SESSION['userID'];
// $stmt = $conn->prepare("select *  FROM score where userID='".$userid."'");
$stmt = $conn->prepare("SELECT users.userID, users.fullName, types.names, score.score, score.typeID  
                        FROM ((users INNER JOIN score ON score.userID = users.userID) 
                        INNER JOIN types ON score.typeID = types.typeID) where users.userID = '".$userid."' ");
                        
$stmt->execute();
$result     = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="CSS/profile.css">
    <title>Document</title>
</head>
<body>
<?php include('nav.php')?>
<section class = "main">
    <div class = "inside">
        <div class = "inside2">
                <a href="menu.php" class = "back"><button><i class="fa-solid fa-caret-left"></i> Back</button></a>
                <h2>PROFILE</h2>
                <table>
  <tr>
    <th> Full Name</th>
    <th> Name Game</th>
    <th> Score</th>
  </tr>
  <?php
    while($row = $result->fetch_assoc()):
  ?>
  <tr>
    <td><?php echo $row['fullName'];?></td>
    <td><?php echo $row['names'];?></td>
    <td><?php echo $row['score'];?></td>
  </tr> 
  <?php endwhile; ?>
</table>

        </div>
    </div>
    </div>
</section>
</body>
</html>