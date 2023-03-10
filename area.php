<?php 
  session_start();
  if(!isset($_SESSION['id']) or !isset($_SESSION['name'])){
    header("location:login.php");
}

if(isset($_POST['submit'])){
  $ln_user = $_POST['lnuser'];
  $ln_pass = $_POST['lnpass'];
  include 'database.php';
  $conn = new PDO($db_name , $username, $passw) or die("connection error");
  $sql = $conn->prepare("SELECT * FROM ln_data WHERE ln_user =?");
  $sql->bindParam(1,$ln_user,PDO::PARAM_STR);
  $sql->execute();
  $result = $sql->fetchAll();

  if($result){
    echo'<script>alert("User exist !");</script>';

  }
  elseif(($ln_user =='root')or(($ln_user == 'mysql'))){
    echo'<script>alert("You cant use this usernames !");</script>';
  }
  else{
    $sql = $sql = $conn->prepare("INSERT INTO ln_data (user_id, ln_user, ln_pass) VALUES (?,?,?)");
    $sql->bindParam(1,$_SESSION['id']);
    $sql->bindParam(2,$ln_user,PDO::PARAM_STR);
    $sql->bindParam(3,$ln_pass,PDO::PARAM_STR);
    $sql->execute();
    $json = "https://vps.abhinandanmohanty.in/create/".$ln_user."/".$ln_pass;
    $jsonfile = file_get_contents($json);
    $_SESSION['temp_lnid']=$ln_user;
    $_SESSION['temp_lnpass']=$ln_pass;
    header("location:detail.php");

  }

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
                  Hello <?php echo $_SESSION['name']; ?> &nbsp; <button type="button" class="btn btn-secondary" onclick="location.href='logout.php'">logout</button> <br><br>
              </section>
              <section>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Create new linux account</button>
                  
              </section> <br><br>



                     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="post">
                              <div class="form-group">
                                <label for="username" class="col-form-label">Username:</label>
                                <input type="text" class="form-control" id="username" name="lnuser" >
                              </div>
                              <div class="form-group">
                                <label for="lnpass" class="col-form-label">linux Password:</label>
                                <input type="text" class="form-control" id="message-text" name="lnpass"></input>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" name="submit" class="btn btn-primary">Send message</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
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
                          <?php
                          $i=1;
                          include 'database.php';
                          $conn = new PDO($db_name , $username, $passw) or die("connection error");
                          $sql = $conn->prepare("SELECT * FROM ln_data WHERE user_id =?");
                          $sql->bindParam(1,$_SESSION['id']);
                          $sql->execute();
                          $result = $sql->fetchAll(PDO::FETCH_ASSOC);

                          if($result){
                            foreach($result as $item){
                              echo "<tr>";
                              echo '<th scope="row">'.$i.'</th>';
                              echo '<td>'.$item['ln_user'].'</td>';
                              echo '<td>'.$item['ln_pass'].'</td>';
                              echo '<td>(coming soon)</td>';
                              echo "</tr>";
                              $i++;
  
                              
                            }
                          }
                          else{
                            echo "<h2>Create account to show here.</h2>";
                          }
                          ?>

                        </tbody>
                      </table>
              </section>
              <a href="upi://pay?pn=Coffee to Abhinandan mohanty &amp;pa=ambaniji@jio&amp;cu=INR"><img id="coffee" src="coffee.png" alt="buy me a coffee"></a>
        </div>
    </div>
</body>
<script src="bootstrap.js"></script>
<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>