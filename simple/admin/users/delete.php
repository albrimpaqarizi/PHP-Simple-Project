
<?php
include "..//..//mysql/dbconnect.php";

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM users WHERE id = $id";
  $result = mysqli_query($db, $query);
  if(!$result) {
    die("Query Failed.");
  }
  header('Location: ../index.php');
}
?>