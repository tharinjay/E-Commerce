<?php
  session_start();
  require "database.php";

  if(isset($_POST["login_btn"])){
    $username = $_POST["txt_username"];
    $password = $_POST["txt_password"];

    //Designing SQL Query Format
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $con->query($sql);
    if($result->num_rows>0){
      while($row = $result->fetch_assoc()){
        $db_un = $row["Username"];
        $db_pw = $row["Password"];

        if($db_un == $username && $db_pw == $password){
            
            $_SESSION["user_id"] = $row["Uid"];
            $_SESSION["user_fname"] = $row["Fname"];

            echo "<script>alert('Login Successful');
            location.replace('mainpage.php');</script>";
            
        }else{
            echo "<script>alert('Login Failed');</script>";
        }
      }
    }else{
      echo "<script>alert('User not exist')</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login.css" />
    <title>Document</title>
  </head>
  <body>
    
    <div class="containerLogin">
      <div class="leftLogin">
        <img src="" alt="">
      </div>
      <div class="rightLogin">
        <div class="contentLogin">
          <h1>Welcome Back!!</h1>
          <img src="" alt="" id="img" />

          <form method="POST">
            <div class="name">
              <label for="name">
                Username:
                <br />
                <input type="text" name="txt_username" id="name" placeholder="Username" />
              </label>
            </div>
            <div class="passwordDiv">
              <label for="password">
                Password:
                <br />
                <input type="password" name="txt_password" id="password" placeholder="Password" />
              </label>
            </div>

            <div class="buttonsLogin">
              <input type="submit" value="Login" id="loginButton" name="login_btn"/>
              <input type="reset" value="Cancel" id="cancelButton" />
            </div>
          </form>
          Don't have an account? then
          <span id="SignupSpan"><a href="signup.php" id="signupButton">Sign up</a></span>
        </div>
      </div>
    </div>
  </body>
</html>
