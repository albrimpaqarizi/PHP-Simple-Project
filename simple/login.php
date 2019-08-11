
<?php
session_start();

include "./mysql/dbconnect.php";

if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "Email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

    // user found
    if (mysqli_num_rows($results) == 1) { 
      
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['rolet'] == 'admin') {
        $_SESSION['rolet'] = $rolet;
        $_SESSION['email'] = $email;
				$_SESSION['success']  = "You are now logged in";
				header('location: ./admin/index.php');		  
      }
      else{
        $_SESSION['email'] = $email ;
				$_SESSION['success']  = "You are now logged in";

				header('location: ./index.php');
			}
    }
    else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WebSite</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/login-register.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"/>

  </head>

  <body>

    <section class=" login-page">
      <div class="form">
        <?php include('./includes/errors.php'); ?>
        <form class="form-inline" action="login.php" method="post" onsubmit="return loginUser()">
          <input class="input-form" type="email" name="email" id="email" placeholder="Email" />
          <p class="error" id="msg-email"></p>

          <input class="input-form" type="password" name="password" id="pass" placeholder="Password" />
          <p class="error" id="msg-password"></p>

          <button type="submit" name="login_user">Login</button>
          <p class="message">Not registered? <a href="register.php">Create an account</a></p>
         </form>
         <a class="home" href="index.php">Back to Home</a>
       </div>
    </section>
    
 <script src="./assets/js/validation.js" ></script>    

  </body>
</html>
