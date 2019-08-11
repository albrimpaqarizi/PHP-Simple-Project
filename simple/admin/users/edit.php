
<?php

session_start();

 include "..//..//mysql/dbconnect.php";


if  (isset($_GET['id'])) {
   $user_id = $_GET['id'];
   $query = "SELECT * FROM users WHERE id=$user_id";
   $result = mysqli_query($db, $query);
   if (mysqli_num_rows($result) == 1) {
     $row = mysqli_fetch_array($result);
     $firstname = $row['firstname'];
     $lastname = $row['lastname'];
     $bday = $row['bday'];
     $gender = $row['gender'];
     $email = $row['email'];
     $rolet = $row['rolet'];
   }
 }


if (isset($_POST['update'])) {
   $user_id = $_GET['id'];
   $firstname = $row['firstname'];
   $lastname = $row['lastname'];
   $bday = $row['bday'];
   $gender = $row['gender'];
   $email = $row['email'];
   $rolet = $_POST['rolet'];

   if (empty($rolet)) { array_push($errors, "Role is required"); }
   
   if (count($errors) == 0) {
   $query = "UPDATE users set 
       firstname = '$firstname', lastname = '$lastname' ,
       bday = '$bday', gender = '$gender',
       email = '$email', rolet = '$rolet' WHERE id=$user_id";
  
   mysqli_query($db, $query);
   header('Location: ../index.php');
   }
 }

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit</title>
<link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
<link  rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"/>
      <script src="../assets/js/dropdown.js"></script>
</head>
<body>

<?php include("../sidebar.php"); ?>

<?php include("../includes/navbar.php"); ?>

<div class="main">
   <div class="container">
       <h2>Update user</h2><hr/>
       <?php include('..//..//includes/errors.php'); ?>
       <form class="form-inline-create"  action="" method="POST" onsubmit="return editUser()">

           <div class="input-group-user">
              <label for="firstname">Firstname</label>
              <div class="input-form-group">
                <input class="input-form" type="text" name="firstname" value="<?php echo $firstname; ?>" disabled />
              </div>
           </div>

           <div class="input-group-user">
              <label for="lastname">Lastname</label>
              <div class="input-form-group">
                 <input class="input-form" type="text" name="lastname" value="<?php echo $lastname; ?>" disabled/>
              </div>
           </div>

           <div class="input-group-user">
              <label for="bday">Birthday</label>
              <div class="input-form-group">
                 <input class="input-form" type="date" name="bday" value="<?php echo $bday; ?>" disabled/>
               </div>
           </div>

           <div class="input-group-user">
              <label for="email">Email</label>
              <div class="input-form-group">
                <input class="input-form" type="email" name="email" value="<?php echo $email; ?>" disabled/>
               </div>
           </div>

           <div class="input-group-user">
              <label>Please select gender</label>
              <div class="input-form-group">
              <label for="male" class="gender">
                 <input type="radio" name="gender" value="<?php echo $gender; ?>" id="male" disabled/> Male 
               </label>
              <label for="female"  class="gender">
                 <input type="radio" name="gender" value="<?php echo $gender; ?>" id="female" disabled/> Female
               </label>
               </div>
           </div>

           <div class="input-group-user">
              <label for="email">Please select role</label>
              <div class="input-form-group">
              <select class="input-form" name="rolet" value="<?php echo $rolet; ?>" id="role">
                <option value="">Select...</option>
                <option value="admin">Admin</option>
                <option value="guest">Guest</option>
             </select>
             <span class="error" id="msg-role"></span><br/>
             <?php include_once('..//..//includes/errors.php'); ?>
             </div>
           </div>

           
            
           <div class="input-group-btn">
              <button class="btn" type="submit" name="update">Update</button>
           </div>
       </form>
   </div>
</div>

<script type="text/javascript" src="../assets/js/validation.js"></script>


<?php include("../includes/footer.php"); ?>
