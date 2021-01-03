<?php include 'settings.php'; //include settings ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login</title>
    <link rel="stylesheet" href="login-style.css" />
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
          <h1>Login</h1>
          <p>No Account? <a href="signup.php">Sign up</a></p>
        </div>
        <div class="box">


          <form class="form" action="includes/login.php" method="POST">


          <input name="login" type="email" class="username" placeholder="Username" required autofocus>
                <input name="password" type="password" class="password" placeholder="Password required">






                <input class="button" type="submit" name="submit" value="login">


          </form>
        </div>
      </div>
    </main>
  </body>

</html>
