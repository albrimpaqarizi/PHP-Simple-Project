<?php
session_start();

 include "..//..//mysql/dbconnect.php";


if (isset($_POST['create-post'])) {
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $desc = mysqli_real_escape_string($db, $_POST['description']);
  $today = date("Y-m-d H:i:s");  

   if (empty($title)) { array_push($errors, "Title is required"); }
   if (empty($desc)) { array_push($errors, "Description is required"); }

  $name = $_FILES['file']['name'];
  $target_dir = "../uploads/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  if (count($errors) == 0) {

    // Check extension
     if( in_array($imageFileType,$extensions_arr) ){

       $query = "INSERT INTO posts ( title, description, imagee, created_at ) 
  		   	  VALUES('$title', '$desc', '".$name."' , '".$today."' )";
       $results = mysqli_query($db, $query);
  
     
       // Upload file
       move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
     }
     header('location: ../index.php');
  }
};
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




<?php include("../sidebar.php"); ?>

<?php include("../includes/navbar.php"); ?>

<div class="main">
   <div class="container">
       <h2>Create new post</h2><hr/>
       <?php include('..//..//includes/errors.php'); ?>
       <form class="form-inline-create" action="" method="POST" enctype="multipart/form-data" onsubmit="return create_edit_Post()">

           <div class="input-group">
              <label for="tt">Title</label>
              <div class="input-form-group">
                 <input type="text" class="input-form" name="title" id="title" />
                 <span class="error" id="msg-title"></span>
              </div>
           </div>

           <div class="input-group">
              <label for="desc">Description</label>
              <div class="input-form-group">
              <input class="input-form" name="description" id="description" type="text" />
                <span class="error" id="msg-description"></span>
              </div>
           </div>

           <div class="input-group">
              <label for="image">Image</label>
              <div class="input-form-group">
                <input type="file" class="input-form" name="file" id="file" />
                <span class="error" id="msg-file"></span>
              </div>
           </div>
            
           <div class="input-group-posts">
              <button class="btn" type="submit" name="create-post">Create</button>
           </div>
       </form>
   </div>
</div>

<script>
   function create_edit_Post(){
 
 var title_val = document.getElementById('title').value;
 var desc_val = document.getElementById('description').value;
 var file_val = document.getElementById('file').value;


if( title_val == ""  ){
  title.style.border = "1px solid red";
  document.getElementById('msg-title').innerHTML = " *Please enter only alphanumeric values for your advertisement title";
  return false;
}

if( title_val.length < 5 || title.length > 50 ){
   title.style.border = "1px solid red";
   document.getElementById('msg-title').innerHTML = " *Number of characters must be between 5 and 50";
   return false;
 }

if( desc_val == "" ){
  description.style.border = "1px solid red";
  document.getElementById('msg-description').innerHTML = " *Please enter a valid description";
  return false;
}

if( desc_val.length < 20 || desc_val.length > 400 ){
   description.style.border = "1px solid red";
   document.getElementById('msg-description').innerHTML = " *Number of characters must be between 20  and 400";
   return false;
 }


if( file_val == "" ){
  file.style.border = "1px solid red";
  document.getElementById('msg-file').innerHTML = " *Please enter a valid image";
  return false;
}

  return (true);
};

</script>



<?php include("../includes/footer.php"); ?>

