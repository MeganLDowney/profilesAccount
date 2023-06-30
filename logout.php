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
          <a href="registration_form.php">Create Profile</a></div>
      </nav></div>
    </header>

    <main>
        <?php
        session_start();
        // I had to separate the session clearing and destroying from header() because
        // it wasn't redirecting if all 3 were called together. Thus the reason for
        // the GET redirect...
    $_SESSION = []; // Clear the variables
    session_destroy(); // Destroy the session
    if(isset($_GET['redirect'])) {
        
    header("Location: https://megan.webdevstudent.me/week13/login.html");

    }
    ?>
    </main>
    <footer class="footer">
      <span class="footer-span">&copy Megan Louise Downey - 2023</span>
    </footer>
    </div>
    </body>
    </html>