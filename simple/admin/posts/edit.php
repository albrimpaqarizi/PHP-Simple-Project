<?php

session_start();

 include "..//..//mysql/dbconnect.php";

 
if  (isset($_GET['postID'])) {
   $post_id = $_GET['postID'];
   $query = "SELECT * FROM posts WHERE postID=$post_id";
   $result = mysqli_query($db, $query);
   if (mysqli_num_rows($result) == 1) {
     $row = mysqli_fetch_array($result);
     $title = $row['title'];
     $description = $row['description'];
   }
 }


if (isset($_POST['update'])) {
   $post_id = $_GET['postID'];
   $title = $_POST['title'];
   $description = $_POST['description'];

   if (empty($title)) { array_push($errors, "Title is required"); }
   if (empty($description)) { array_push($errors, "Description is required"); }

   if (count($errors) == 0) {
      $query = "UPDATE posts set title = '$title', description = '$description' WHERE postID=$post_id";
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
       <h2>Update your post</h2><hr/>
       <?php include_once('..//..//includes/errors.php'); ?>
       <form class="form-inline-create" action="" method="POST" onsubmit="return create_edit_Post()">
     
           <div class="input-group">
              <label for="title">Title</label>
              <div class="input-form-group">
                <input type="text" class="input-form" name="title" value="<?php echo $title; ?>" id="title" />
                <span class="error" id="msg-title"></span>
              </div>
           </div>

           <div class="input-group">
              <label for="description">Description</label>
              <div class="input-form-group">
                <input class="input-form" name="description" type="text" id="description" value="<?php echo $description; ?>" />
                <span class="error" id="msg-description"></span>
              </div>
           </div>

           <div class="input-group">
              <label for="image">Image</label>
              <div class="input-form-group">
                <input type="file" class="input-form" name="file" />
              </div>
           </div>
            
           <div class="input-group-posts">
              <button class="btn" type="submit" name="update">update</button>
           </div>
       </form>
   </div>
</div>

<script type="text/javascript" src="../assets/js/validation.js"></script>

<?php include("../includes/footer.php"); ?>


