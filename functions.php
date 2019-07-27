<?php

session_start();

$link = mysqli_connect("shareddb-n.hosting.stackcp.net", "MyDatabase-3130377a12", "pass1234", "MyDatabase-3130377a12");


if(mysqli_connect_errno())
{
  echo "Error connecting to database";
  print_r(mysqli_connect_errno());
  exit();

}


if($_GET['function'] == "logout")
{
  session_unset();
}


function displayTweets($type)
{

  global $link;
  if($type == 'public')
  {
    $whereClause = "";
  }

  $query = "SELECT * FROM Tweets ".$whereClause."ORDER BY 'datetime' DESC LIMIT 10";

  $result = mysqli_query($link,$query);

  if(mysqli_num_rows($result) == 0){
    echo "No tweets available to display!";
  }
  else{
    while ($row = mysqli_fetch_assoc($result))
    {
      $userquery = "SELECT * FROM users WHERE id = '".mysqli_real_escape_string($link,$row['userid'])."'LIMIT 1";
      $userresult = mysqli_query($link,$userquery);
      $user = mysqli_fetch_assoc($userresult);

      echo "<div class='tweet'> <p>".$user['email']." <span class='time'>".time_since(time() - strtotime($row['datetime']))." ago </span> : </p>";

      echo "<p>".$row['tweet']."</p>";
      echo "<p> follow </p> </div>";
    }
  }

}

function displaySearch()
{
  echo '
    <form class = "form-inline">
    <div class = "form-group">
    <input type = "text" class = "form-control" id = "search" placeholder = "Search">
    </div>
    <button type = "submit" class = "btn btn-primary">Search Tweets </button>
    </form>';

}

function displayTweetBox()
{
  if($_SESSION['id'] > 0) //if user is logged in
{
  echo '<form class = "form">
    <div class = "form-group">
    <textarea type = "text" class = "form-control" id = "tweetContent"></textarea>
    </div>
    <button type = "submit" class = "btn btn-primary">Post Tweet</button>
    </form>';
}
}

function time_since($since) {
    $chunks = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hour'),
        array(60 , 'minute'),
        array(1 , 'second')
    );

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }


    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    return $print;
}

?>
