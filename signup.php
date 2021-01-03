<?php
  include_once 'includes/connect.php';
  $Fname = $username = $password = "";
  $name_err = $username_err = $password_err = "";


  if($_SERVER["REQUEST_METHOD"] == "POST"){
      // Validate BookTitle
      $input_name = ($_POST["Fname"]);
      if(empty($input_name)){
          $name_err = "Please enter Fullname.";
      }
       else{
          $Fname = $input_name;
      }

      // Validate AuthorName
      $input_username = ($_POST["username"]);
      if(empty($input_username)){
          $username_err = "Please enter an username.";
      } else{
          $username = $input_username;
      }

      // Validate ReleaseDate
      $input_password = ($_POST["password"]);
      if(empty($input_password)){
          $password_err = "Please enter the password.";
      } else{
          $password = md5($_POST['password']);
      }




      // Check input errors before inserting in database
      if(empty($Fname_err) && empty($username_err) && empty($password_err) ){
          // Prepare an insert statement
          $sql = "INSERT INTO users (name, login, password, role) VALUES (?, ?, ?, ?)";



          if($stmt = mysqli_prepare($conn, $sql)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "ssss", $param_Fname, $param_username, $param_password, $param_role);

              // Set parameters
              $param_Fname = $Fname;
              $param_username = $username;
              $param_password = $password;
              $param_role   = 0;




              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt)){

                  // Records created successfully. Redirect to landing page
                  header("location: index.php");
                  exit();
              } else{
                  echo "Something went wrong. Please try again later.";
              }
          }

          // Close statement
          mysqli_stmt_close($stmt);
      }

      // Close connection
      mysqli_close($link);
  }


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Signup</title>
    <link rel="stylesheet" href="signup-style.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Raleway:300,400,700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <main>
      <div class="background">
        <div class="container">
          <video
            class="videoPlayer"
            preload="auto"
            autoplay="true"
            loop="loop"
            muted=""
            volume="0"
          >
            <source src="wonder.mp4" type="video/mp4" />
          </video>
        </div>
        <div class="text">
          <h1>Signup</h1>
          <p>Have Account? <a href="index.php">Login</a></p>
        </div>
        <div class="box">
          <form class="form" method="post">
            <input
              type="text"
              name = "Fname"
              class="fullname"
              placeholder="Full Name"
              required
            />
            <input
              type="text"
              name="username"
              class="username"
              placeholder="Username"
              required
            />
            <input
              type="password"
              name="password"
              class="password"
              placeholder="Password"
              required
            />
            <input type="submit" class="button" value="Signup" />
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
