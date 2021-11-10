<?php

session_start();
include "db_connection.php";
if(isset($_POST['name']) && isset($_POST['password']))
{
  function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $name = validate($_POST['name']);
  $password = validate($_POST['password']);

  if(empty($name))
  {
      header("Location: index.php?error= Name is required");
      exit();
  }
  else if(empty($password))
  {
    header("Location: index.php?error=Password is required");
    exit();
  }
  else {
    $password = md5($password);
    $sql = "SELECT * FROM Users WHERE name='$name' AND password='$password'";
    $result = mysqli_query($connection,$sql);
    if(mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if($row['name'] === $name && $row['password'] === $password)
      {
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("Location: home.php");
        exit();
      }
      else {
        header("Location: index.php?error=Incorrect Username or Password");
        exit();
      }
    }
    else {
      header("Location: index.php?error=Incorrect Username or Password");
      exit();
    }
  }
}
else {
  header("Location: index.php");
  exit();
}
