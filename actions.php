<?php

include ("functions.php");

if($_GET['action']== "loginSignup"){
  $error = "";


  if(!$_POST['email'])
  {
    $error= "Email Address is Required. ";
  }


  else if(!$_POST['password'])
  {
    $error= "Password is Required. ";
  }

  else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
    $error= "Please enter a valid Email Address. ";
  }


  if($_POST['loginActive'] == "0"){

    $query = "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1 ";
    $result = mysqli_query($link,$query);
    if(mysqli_num_rows($result) > 0)
    {
      $error = "That email Address is already taken";

    }
    else {
      $query = "INSERT INTO users (email, password) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $_POST['password'])."')";

      if(mysqli_query($link,$query))
      {
// Password Hashing here
//$query = "UPDATE users SET password = '".md5(md5(mysqli_insert_id($link)) .$_POST['password'])."'WHERE id= ".mysqli_insert_id($link)."LIMIT 1";

$query = "UPDATE users SET password = '".password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12])."'WHERE email= '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";



mysqli_query($link,$query);

        echo "You have signed up successfully!";
      }

      else {
        $error = "Couldn't create user - Please try again later";
      }


    }

    if(error!= "")
    {
      echo $error;
      exit();
    }


  }
}



?>
