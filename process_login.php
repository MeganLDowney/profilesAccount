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
      
      /*print_r($_FILES);
      print_r($_POST);*/ // testing
       
      // Check if the form has been submitted:
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            print_r($_POST); // testing
            echo $_POST['username'];
            echo $_POST['password'];

           
      
      
              $username = $_POST['username'];
              $password = $_POST['password'];
              $hash = password_hash($password, PASSWORD_DEFAULT); // hash the input password

              // query that uses the input username to grab the id and password from the username 
              $query_login = "SELECT user_id, password FROM USER WHERE username = '$username'";
              $result = @mysqli_query($connection, $query_login);
              $row = mysqli_fetch_assoc($result); // fetches the associative array
              echo $row['password'];
              // creating a variable for the password that matches the username they input
              $user_password = $row['password'];
              // variable for the id
              $user_id = $row['user_id'];
              
              // password verify takes both hashed passwords and checks to see if they match
              // if so it will start the sessions and log the user in and then redirect
              if (password_verify($password, $user_password)) { 
                session_start();
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $user_id;
                header('Location: account_page.php');
	          } else {
                echo "<p>Incorrect username and/or password!</p>";
                echo "<a class='login' href='login.html'>back to login</a>";
            }
      
            } // end of conditional statement
              ?>
        <!--<form id='login-form' action='process_login.php' method='POST'>
          <p class="uppercase member-login">Member Login</p>
          <section>
          <input type='text' placeholder='Username' id='user_name' name='user_name' required>
          </section>
          <section>
          <input type='text' placeholder='Password' id='password' name='password' required>
          </section>
          <input class='login' type='submit' value='login'>
          <p class="sign-up">Not a member? <a href="registration_form.php" class='uppercase sign-up-button'>sign up</a></p>
        </form>-->
    </main>
    <footer class="footer">
      <span class="footer-span">&copy Megan Louise Downey - 2023</span>
    </footer>
    </div>
    </body>
    </html>