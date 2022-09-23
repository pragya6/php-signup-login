<?php 

require_once "configure.php";

$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(empty(trim($_POST["reg_name"]))){
    $username_err = "Username can not be empty!";
    echo $username_err;
  }else{
    $sql = "SELECT id FROM users WHERE username = ?"; //query
    $stmt = mysqli_prepare($conn, $sql); //prepare
    if($stmt){ //checking prepare statement
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      $param_username = trim($_POST["reg_name"]); //setting the value to bind
      if(mysqli_stmt_execute($stmt)){//executing the prepare
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1){ //checking if the entry exists
          $username_err = "Username is already taken!";
          echo $username_err;
        }else{
          $username = trim($_POST["reg_name"]);
        }
      }
    }else{
      echo "Something went wrong!";
    }
    mysqli_stmt_close($stmt);
  }

  //checking password validation
  if(empty(trim($_POST["reg_pass"]))){
    $password_err = "Password can not be empty!";
  }elseif(strlen(trim($_POST["reg_pass"])) < 8){
    $password_err = "Password should be of 8 characters atleast!";
  }else{
    $password = trim($_POST["reg_pass"]);
  }

  //inserting into the database
  if(empty($username_err) && empty($password_err)){
    $sql = "INSERT INTO users (username,password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if($stmt){
      mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

      $param_username = $username;
      $param_password = password_hash($password, PASSWORD_DEFAULT);

      if(mysqli_stmt_execute($stmt)){
        header("location: welcome.php");
      }else{
        echo "Something went wrong!";
      }
    }
    mysqli_stmt_close($stmt);
  }

  mysqli_close($conn);
}

?>