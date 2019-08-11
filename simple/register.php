
<?php
session_start();

 include "./mysql/dbconnect.php";

// REGISTER USER
if (isset($_POST['register'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $bday = mysqli_real_escape_string($db, $_POST['bday']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);
  $rolet = 'guest';


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, "Firstname is required"); }
  if (empty($lastname)) { array_push($errors, "Lastname is required"); }
  if (empty($bday)) { array_push($errors, "Birthday is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if ($password != $cpassword) {
  array_push($errors, "The two passwords do not match");
  }

    // first check the database to make sure 
    // a user does not already exist with the same email
    $user_check_query = "SELECT * FROM users WHERE  email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { 
      if ($user['email'] === $email) {
        array_push($errors, "Email already exists");
      }
    }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password_hash = md5($password); 
  
  	$query = "INSERT INTO users (firstname, lastname, bday, gender, email ,rolet ,  password) 
  			  VALUES('$firstname', '$lastname' ,'$bday', '$gender' , '$email', '$rolet','$password_hash')";
      $results = mysqli_query($db, $query);
        $_SESSION['email'] = $email ;
        $_SESSION['success'] = "You are now logged in";
        header('location: ./index.php');
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
      crossorigin="anonymous"
    />

  </head>

  <body>



  <section class=" register-page">
      <div class="form" >
      <?php include('./includes/errors.php'); ?>
          <form class="form-inline" action="" method="post" onsubmit="return regUser()">
             <input class="input-form" type="text" name="firstname" placeholder="Firstname" id="firstname" >
             <p class="error" id="msg-firstname"></p>

             <input class="input-form" type="text" name="lastname" placeholder="Lastname" id="lastname" >
             <p class="error" id="msg-lastname"></p>

             <input class="input-form" type="date" name="bday" id="bday" > 
             <p class="error" id="msg-bday"></p>
             
             <div class="input-form">
                <label for="male" class="male">
                   <input type="radio" name="gender" value="male" id="male"> Male 
                 </label>
                <label for="female" class="female">
                   <input type="radio" name="gender" value="female" id="female"> Female
                </label>
             </div>
             <p class="error" id="msg-gender"></p>
            
             <input class="input-form" type="email" name="email" placeholder="ex: name@gmail.com" id="email" >
             <p class="error" id="msg-email"></p>

             <input class="input-form" type="password" name="password" placeholder="Password" id="password" >
             <p class="error" id="msg-password"></p>

             <input class="input-form" type="password" name="cpassword" placeholder="Confirm Password" id="cpassword" >
             <p class="error" id="msg-cpassword"></p>
             
             <button type="submit" name="register">Sign up</button>
             <p class="message">Already have an account? <a href="login.php">Sign In</a></p>
           </form>
             <a class="home" href="index.php">Back to Home</a>
         </div>
    </section>

    
     <script type="text/javascript" src="./assets/js/validation.js"></script>
    
    </body>
</html>
