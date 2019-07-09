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

if(error!= "") echo $error;


if($_POST["loginActive"] == "0"){


}
}



 ?>
