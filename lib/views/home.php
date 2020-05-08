<h1>Home page</h1>

<h2>Art company</h2>

<p><?php echo $message ?></p>

<?php

if(!empty($list)){
    echo "<h2>Users</h2>";
    foreach($list As $user){
      $fname = htmlspecialchars($user['fname'],ENT_QUOTES, 'UTF-8');
      echo "<li>{$fname}</li>";
    }
  }
  else{
    echo "<h2>Players list is empty</h2>";
}
  ?>


