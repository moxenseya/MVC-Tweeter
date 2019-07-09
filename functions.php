<?php

$link = mysqli_connect("shareddb-n.hosting.stackcp.net", "MyDatabase-3130377a12", "pass1234", "MyDatabase-3130377a12");


if(mysqli_connect_errno())
{
  echo "Error connecting to database";
  print_r(mysqli_connect_errno());
exit();

}

 ?>
