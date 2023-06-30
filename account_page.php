<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <link href="css/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Sriracha&display=swap" rel="stylesheet">
    <title>Web Project 7: Login, Logout & Session Management</title>
  </head>
  <body>
    <header>
      <div class="header"><h1>PR0F1L3S<br><span class="littleh1">create	&#8226 connect</span></h1>
      <nav>
        <div class="nav">
          <a href="login.html">Login</a>
          <a href="list_users.php">Profile Archive</a>
          <a href="registration_form.php">Create Profile</a>
          <a href="account_page.php">My Account</a></div>
      </nav></div>
    </header>

    <main>
      <?php 
      require('connection.php');
      session_start();
      if (!isset($_SESSION['name'])) {
        echo "<h2>Please log in.</h2>";
        exit;
      }
      ?>
      <p><a href="logout.php?redirect=" class="logout">Logout</a></p>
      
      
    <?php
    


echo "<h2>Welcome, " .$_SESSION['name']. "!</h2>";

  // create a query and store it to the $query variable
// query is set up using the session data
$query_account_page = "SELECT * FROM USER WHERE username = '$_SESSION[name]'";
// open a database connection(use variable $connection from connection.php) and run the query
$result_account_page = mysqli_query($connection, $query_account_page);
while ($row = mysqli_fetch_assoc($result_account_page)) {
  $imageURL = 'uploads/'.$row["profile_img"];
  echo "<div class='card-account'>
  <img class='account-img' src=".$imageURL." alt='profile image'>
  <div class='info'>
    <h4><b>".$row['username']."</b></h4>
    <p>".$row['first_name']." ".$row['last_name']."</p>
    <p>".$row['location']."</p>
    <p>".$row['email_address']."</p>
    <p>Member since: ".$row['create_date']."</p>
    <p>Last login: ".$row['last_login']."</p>
  </div>
</div>";
}

  ?>
  
        
    </main>
    <footer class="footer">
      <span class="footer-span">&copy Megan Louise Downey - 2023</span>
    </footer>
    </div>
    </body>
    </html>