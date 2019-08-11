
<?php
include "..//..//mysql/dbconnect.php";

if(isset($_GET['postID'])) {
  $postID = $_GET['postID'];
  $query = "DELETE FROM posts WHERE postID = $postID";
  $result = mysqli_query($db, $query);
  if(!$result) {
    die("Query Failed.");
  }
  header('Location: ../index.php');
}
?>