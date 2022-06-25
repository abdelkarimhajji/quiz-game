    <?php
session_start();
$conn = mysqli_connect('localhost','root','','quiz') or die(mysqli_error($conn));
// sign_up
if (isset($_POST['sign_up']))
{   
    $fullName = $_POST['fullName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("select email  FROM users where email='".$email."'");
    $stmt->execute();
    $result     = $stmt->get_result();
    $row_in     = $result->fetch_assoc();
    $array      = $row_in['email'];

    if($array == $email){
        $_SESSION['validate'] = true;
        header("location: eroorup.php");
    }
    else{
    $req = "INSERT INTO users (fullName,phone,email,passwords) values ('$fullName','$phone','$email','$password')";
    $res = mysqli_query($conn, $req);
    $stmt = $conn->prepare("select * FROM users where email='".$email."'");
    $stmt->execute();
    $result     = $stmt->get_result();
    $row_in     = $result->fetch_assoc();
    $_SESSION['userID'] = $row_in['userID'];
    header("location: index.php");
    }
}

// sign_in

if(isset($_POST['submit'])){
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    // email
    $stmt       = $conn->prepare("select *  FROM users where email='".$email."'");
    $stmt->execute();
    $result     = $stmt->get_result();
    $row_in     = $result->fetch_assoc();
    $array      = $row_in['email'];
    $array2     = $row_in['passwords']; 
    $array3     = $row_in['fullName'];
    $array4     = $row_in['userID'];
    // password
    if( $password==$array2 && $email==$array){
        $_SESSION['user'] = $array3;
        $_SESSION['userID'] = $array4;
        $_SESSION['phone'] = $array5;
        header("location: menu.php");
    }
    else{
        $_SESSION['submit'] = true;
        header("location: index.php");
    }
}

if (isset($_GET['test']))
{
    // session_destroy();
    $_SESSION['score'] = 0;

    header("location: check.php");

}
// header("location: cong.php");
// play