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
                This is a danger alert—check it out!
            </div>
        </div>
        <form class="form-main" action="" method="post">
            <div id="inp1">
                <label for="full_name">Name</label>
                <input type="text" id="full_name" name="full_name" class="input-group input_box" required>
            </div>
            <div id="inp2">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="input-group input_box" required>
            </div>
            <div id="inp3">
                <label for="full_name">Enter password</label>
                <input type="text" id="password" name="password" class="input-group input_box" required>
            </div>
            <input class="btn btn-primary l-btn" type="submit" name ="submit" value="Register"> <br> <br>
        </form>
        <a><button type="button" class="btn btn-success btn-middle" onclick="location.href='login.php'">Already account login</button>
        <a href="upi://pay?pn=Coffee to Abhinandan mohanty &amp;pa=ambaniji@jio&amp;cu=INR"><img id="coffee" src="coffee.png" alt="buy me a coffee"></a>
    </div>
</body>
<script src="bootstrap.js"></script>
<script src="script.js"></script>
</html>


<?php

if(isset($_SESSION['id']) and isset($_SESSION['name'])){
    header("location : area.php");
}

if(isset($_POST['submit'])){
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    include 'database.php';
    $conn = new PDO($db_name , $username, $password) or die("connection error");
    $sql = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $sql->bindParam(1,$email,PDO::PARAM_STR);
    $sql->execute();
    $result = $sql->fetchAll();
    $sql = null;
    if($result){
        echo'<script>view_alert();</script>';
        die();
    }
    $pass = md5($password);
    $sql = $conn->prepare("INSERT INTO USER (name, email, password) VALUES (?, ?, ?)");
    $sql->bindParam(1,$name,PDO::PARAM_STR);
    $sql->bindParam(2,$email,PDO::PARAM_STR);
    $sql->bindParam(3,$pass,PDO::PARAM_STR);
    $sql->execute(); $sql = null;

    $sql = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $sql->bindParam(1,$email,PDO::PARAM_STR);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row){

    }
    echo $row['id'];
    session_start();
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    header("location:area.php");
}
?>