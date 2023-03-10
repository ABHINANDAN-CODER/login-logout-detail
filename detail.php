<?php
  session_start();
  if(!isset($_SESSION['id']) or !isset($_SESSION['name'])){
    header("location:login.php");
  }
  if(!isset($_SESSION['temp_lnid']) or !isset($_SESSION['temp_lnpass'])){
    header("location:area.php");
  }
?>

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
        <section style="text-align: center;">
                  Hello <?php echo $_SESSION['name']; ?> &nbsp; <button type="button" class="btn btn-secondary" onclick="location.href='logout.php'">logout</button> <br><br>
              </section>
              
             <section style=" margin-left:30%; ">
             <button type="button" class="btn btn-primary" onclick="location.href='area.php'">back</button>
             </section>

        <div class="detail.area">
            <p #connect>
                  First you have to connect with server, you can use this by using an any terminal / ssh connection. <br>
                  to do this open your <b>command promt /terminal</b> or any third pirty applications. 
                  <br> 
                  suggested : <b>Putty ssh</b> <br>
                  Then run below command on your cmd / terminal.
                  <pre>ssh <?php echo $_SESSION['temp_lnid'] ?>@personal-server.abhinandanmohanty.in
                  </pre>
            </p>
            <p>
                  If You are login for first time then it may ask for adding fingerprint you have to type yes then click enter.
            </p>
            <p>
                  then Enter your password, password will be hidden continue typing that you enter during server creation.
            </p>
            <h4> Your password :<?php echo $_SESSION['temp_lnpass'] ?> </h4>
            <h3 id="change-pass">How to change password using terminal</h3>
            <p>
                To change password fist login to your server (user account). <br>
                then type <span>passwd</span> then you have to enter current password and then repet password.
            </p>
            <pre>passwd
            </pre>
        </div>
        <a href="upi://pay?pn=Coffee to Abhinandan mohanty &amp;pa=ambaniji@jio&amp;cu=INR"><img id="coffee" src="coffee.png" alt="buy me a coffee"></a>
    </div>
</body>
<script src="bootstrap.js"></script>
<script src="script.js"></script>
</html>


<?php
unset($_SESSION['temp_lnid']);
unset($_SESSION['temp_lnpass']);

?>