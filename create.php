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
        <form class="form-main" action="" method="post">
            <div id="inp1">
                <label for="username">Choose Username</label>
                <input type="text" id="full_name" name="full_name" class="input-group input_box" required>
            </div>
            <div id="inp3">
                <label for="password">Enter password</label>
                <input type="password" id="password" name="password" class="input-group input_box" required>
            </div>
            <input class="btn btn-primary l-btn" type="submit" value="Create">
            <a href="upi://pay?pn=Coffee to Abhinandan mohanty &amp;pa=ambaniji@jio&amp;cu=INR"><img id="coffee" src="coffee.png" alt="buy me a coffee"></a>
        </form>
    </div>
</body>
<script src="bootstrap.js"></script>
<script src="script.js"></script>
</html>