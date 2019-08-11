
<?php
session_start();

 include "..//..//mysql/dbconnect.php";

if (isset($_POST['create-user'])) {
  
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $bday = mysqli_real_escape_string($db, $_POST['bday']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $rolet = mysqli_real_escape_string($db, $_POST['rolet']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);
  

  if (empty($firstname)) { array_push($errors, "Firstname is required"); }
  if (empty($lastname)) { array_push($errors, "Lastname is required"); }
  if (empty($bday)) { array_push($errors, "Birthday is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($rolet)) { array_push($errors, "Role is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if ($password != $cpassword) {
	array_push($errors, "The two passwords do not match");
  }


    $user_check_query = "SELECT * FROM users WHERE  email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) {
      if ($user['email'] === $email) {
        array_push($errors, "Email already exists");
      }
    }

  
  if (count($errors) == 0) {
  	$password_hash = md5($password);
  
  	$query = "INSERT INTO users (firstname, lastname, bday, gender, email ,rolet ,  password) 
  			  VALUES('$firstname', '$lastname' ,'$bday', '$gender' , '$email', '$rolet','$password_hash')";
      $results = mysqli_query($db, $query);
        header('location: ../index.php');
  }
}  
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create</title>
<link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
<link  rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"/>
      <script src="../assets/js/dropdown.js"></script>

</head>
<body>

<?php include_once("../sidebar.php"); ?>

<?php include_once("../includes/navbar.php"); ?>

<div class="main">
   <div class="container">
       <h2>Create new user</h2><hr/>

       <?php include('..//..//includes/errors.php'); ?>
       <form class="form-inline-create"  action="create.php" method="POST" onsubmit="return createUser()">

           <div class="input-group-user">
              <label for="firstname">Firstname</label>
              <div class="input-form-group">
                <input class="input-form" type="text" name="firstname" id="firstname">
                <span class="error" id="msg-firstname"></span>
              </div>
           </div>

           <div class="input-group-user">
              <label for="lastname">Lastname</label>
              <div class="input-form-group">
                 <input class="input-form" type="text" name="lastname"  id="lastname">
                 <span class="error" id="msg-lastname"></span>
              </div>
           </div>

           <div class="input-group-user">
              <label for="bday">Birthday</label>
              <div class="input-form-group">
                <input class="input-form" type="date" name="bday"  id="bday">
                <span class="error" id="msg-bday"></span>
              </div>
           </div>

           <div class="input-group-user">
              <label for="email" id="emailLabel">Email</label>
              <div class="input-form-group">
                <input class="input-form" type="email" id="email"  name="email" placeholder="ex: myname@gmail.com">
                <span class="error" id="msg-email"></span>
              </div>
           </div>

           <div class="input-group-user">
              <label for="gender">Please select gender</label>
              <div class="input-form-group">
                <label for="male" class="gender" ><input type="radio" name="gender" value="male" id="male"> Male </label>
                <label for="female"  class="gender" ><input type="radio" name="gender" value="female" id="female"> Female</label>
                <br/><span class="error" id="msg-gender"></span>
              </div>
           </div>

           <div class="input-group-user">
              <label for="email">Please select role</label>
              <div class="input-form-group">
                <select class="input-form" name="rolet" id="role">
                  <option value="">Select...</option>
                  <option value="admin">Admin</option>
                  <option value="guest">Guest</option>
                </select>
                <span class="error" id="msg-role"></span>
              </div>
           </div>

           <div class="input-group-user">
              <label for="password">Password</label>
              <div class="input-form-group">
                <input class="input-form" type="password" name="password" id="password">
                <span class="error" id="msg-password"></span>
              </div>
           </div>

           <div class="input-group-user">
              <label for="cpassword">Confirm Password</label>
              <div class="input-form-group">
                <input class="input-form" type="password" name="cpassword" id="cpassword" >
                <span class="error" id="msg-cpassword"></span>
              </div>
           </div>
            
           <div class="input-group-btn">
              <button class="btn" type="submit" name="create-user">Create</button>
           </div>
       </form>
   </div>
</div>

<script type="text/javascript" src="../assets/js/validation.js"></script>

<?php include_once("../includes/footer.php"); ?>