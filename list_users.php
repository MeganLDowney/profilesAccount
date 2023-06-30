<html>
  <head>
    <link href="css/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Sriracha&display=swap" rel="stylesheet">
    <title>Web Project 7: Login, Logout & Session Management</title>
  </head>
  <body id="body-registration">
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
        echo "<h2 class='center'>List of PR0F1L3S Users:</h2>";

// create a query and store it to the $query variable
$query = "SELECT * FROM USER WHERE status = 'A'";
// open a database connection(use variable $connection from connection.php) and run the query
$result = mysqli_query($connection, $query);
echo "<div class='container'>";
while ($row = mysqli_fetch_assoc($result)) {
  $imageURL = 'uploads/'.$row["profile_img"];
  echo "<div class='card'>
  <img class='profile-img' src=".$imageURL." alt='profile image'>
  <div class='info'>
    <h4><b>".$row['username']."</b></h4>
    <p>".$row['first_name']." ".$row['last_name']."</p>
    <p>".$row['location']."</p>
  </div>
</div>";
}
echo"</div>";
