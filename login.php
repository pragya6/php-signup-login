<?php
session_start();

if (isset($_SESSION["username"])) {
  header("location: welcome.php");
  exit;
}

require_once "configure.php";

$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty(trim($_POST["log_name"])) || empty(trim($_POST["log_pass"]))) {
    echo "<h2> Please!Fill in the details. </h2>";
  } else {
    $username = trim($_POST["log_name"]);
    $password = trim($_POST["log_pass"]);

    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;

    if (mysqli_stmt_execute($stmt)) {

      mysqli_stmt_store_result($stmt);
      if (mysqli_stmt_num_rows($stmt) == 1) {

        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
        if (mysqli_stmt_fetch($stmt)) {
          if(password_verify($password, $hashed_password)){
            
            //setting the session for user login status
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["id"] = $id;
            $_SESSION["isLoggedIn"] = true;

            header("location: welcome.php");

          }else{
            echo "<h1>Wrong Password!</h1>";
          }
        }
      }else{
        echo "No Such User Found!";
      }
    }else{
      echo "Something went wrong in execution!";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
}
