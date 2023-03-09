<?php 
  session_start();
  if(!isset($_SESSION['id']) or !isset($_SESSION['name'])){
    header("location : login.php");
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
        <div class="area-body">
            <section>
                  Hello <?php echo $_SESSION['name']; ?> &nbsp; <button type="button" class="btn btn-secondary" onclick="location.href='login.php'">logout</button> <br><br>
              </section>
              <section>
                  <button type="button" class="btn btn-primary" onclick="location.href='create.php'">Create New User</button>
              </section> <br><br>
              <section>
                  <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Reset</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                          </tr>
                        </tbody>
                      </table>
              </section>
              <a href="upi://pay?pn=Coffee to Abhinandan mohanty &amp;pa=ambaniji@jio&amp;cu=INR"><img id="coffee" src="coffee.png" alt="buy me a coffee"></a>
        </div>
    </div>
</body>
<script src="bootstrap.js"></script>
<script src="script.js"></script>
</html>