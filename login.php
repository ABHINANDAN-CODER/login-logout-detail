<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="profile.png" alt="" srcset="">
        </div>
        <div class="greet">
            <p class="text_greet">Something exciting for you :)</p><br>
        </div>
        <div id="alerts">
            <div class="alert alert-danger" id="alert-view" role="alert">
                
            </div>
        </div>
        <form class="form-main" action="" method="post">
            <div id="inp2">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="input-group input_box" required>
            </div>
            <div id="inp3">
                <label for="full_name">Enter password</label>
                <input type="text" id="full_name" name="password" class="input-group input_box" required>
            </div>
            <input class="btn btn-primary l-btn" type="submit" name="submit" value="login"> <br> <br>
        </form>
        <button type="button" class="btn btn-success btn-middle" onclick="location.href='/'">New user register</button>
        <a href="upi://pay?pn=Coffee to Abhinandan mohanty &amp;pa=ambaniji@jio&amp;cu=INR"><img id="coffee" src="coffee.png" alt="buy me a coffee"></a>
    </div>
</body>
<script src="bootstrap.js"></script>
<script src="script.js"></script>
</html>


<?php
session_start();
if(isset($_SESSION['id']) and isset($_SESSION['name'])){
    header("location:area.php");
}

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    include 'database.php';
    $conn = new PDO($db_name , $username, $passw) or die("connection error");
    $sql = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $sql->bindParam(1,$email,PDO::PARAM_STR);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    $sql = null;
    foreach($result as $row){

    }
    $pass = md5($password);

    print_r($row);


    if(($row['email']==$email) and ($row['password']==$pass)){
        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        header("location:area.php");
        
    }
    else{
        echo "<script>view_alert2();</script>";
    }

}

?>