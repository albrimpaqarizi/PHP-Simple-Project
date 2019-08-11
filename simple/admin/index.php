<?php 
  session_start(); 

 include "../mysql/dbconnect.php";

 if (!isset($_SESSION['email'])) {
	$_SESSION['msg'] = "You must log in first";
	header("location: login.php");
  }
  
   if (!isset($_SESSION['admin'])) {
	header("location: login.php");
	session_destroy();
  }

   

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['email']);
  	header("location: login.php");
  }


 if(isset($_GET['contactID'])) {
	$contactID = $_GET['contactID'];
	$query = "DELETE FROM contact WHERE contactID = $contactID";
	$result = mysqli_query($db, $query);
	if(!$result) {
	  die("Query Failed.");
	}
  }


?>



<?php include("./sidebar.php"); ?>

<?php include("./includes/navbar.php"); ?>

   <div class="main">
     <section class="container " >
           
        
        <?php  if (isset($_SESSION['email'])) : ?>
    	    <p class="login-logout">Welcome <span><?php echo $_SESSION['email']; ?></span></p>
        <?php endif ?>  
        

		<?php if (isset($_SESSION['success'])) : ?>
         <div class="error success" >
         	 <h4>
               <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
      	     </h4>
           </div>
         <?php endif ?>

	   <hr/>

       <div class="table-users">
	      <h2>Table Users</h2> 
	
          <?php $results = mysqli_query($db, "SELECT * FROM users"); ?>
 
          <table class="items">
	          <thead>
		          <tr>
			        <th>Firstname</th>
			        <th>Lastname</th>
		     	    <th>Birthday</th>
			        <th>Gender</th>
					<th>Email</th>
					<th>Role</th>
			        <th colspan="2">Option</th>
		          </tr>
	            </thead>
	
	           <?php while ($item = mysqli_fetch_array($results)) { ?>
		          <tr>
			       <td class="text-table"><?php echo $item['firstname']; ?></td>
			       <td class="text-table"><?php echo $item['lastname']; ?></td>
			       <td><?php echo $item['bday']; ?></td>
			       <td class="text-table"><?php echo $item['gender']; ?></td>
			       <td><?php echo $item['email']; ?></td>
			       <td class="text-table"><?php echo $item['rolet']; ?></td>
		           <td>
					   <a href="./users/edit.php?id=<?php echo $item['id']; ?>" class="btn edit-btn" >Edit</a>
					   <a href="./users/delete.php?id=<?php echo $item['id']; ?>" class="btn delete-btn">Delete</a>
					</td>
		          </tr>
	            <?php } ?>
            </table>
		</div>
		
		<hr class="hr"/>
		
        <div class="table-posts">
	      <h2>Table posts</h2> 
	
          <?php $results = mysqli_query($db, "SELECT * FROM posts"); ?>
 
          <table class="items">
	          <thead>
		          <tr>
			        <th>Title</th>
			        <th>Description</th>
					<th>Created</th>
			        <th colspan="2">Option</th>
		          </tr>
	            </thead>
	
				<?php while ($item = mysqli_fetch_array($results)) { ?>
		          <tr>
			       <td class="text-table"><?php echo $item['title']; ?></td>
			       <td class="cel-description"><?php echo $item['description']; ?></td>
				   <td class="text-table"><?php echo $item['created_at']; ?></td>
		           <td class="btn-action">
					   <a href="./posts/edit.php?postID=<?php echo $item['postID']?>"  class="btn edit-btn" >Edit</a>
					
					   <a href="../posts.php?postID=<?php echo $item['postID']; ?>" class="btn details-btn">Details</a>
					
					   <a href="./posts/delete.php?postID=<?php echo $item['postID']; ?>" class="btn delete-btn">Delete</a>
					</td>
		          </tr>
	            <?php } ?>
            </table>
        </div>

		<hr class="hr"/>

		<div class="table-contact">
	      <h2>Table contact message</h2> 
	
          <?php $results = mysqli_query($db, "SELECT * FROM contact"); ?>
 
          <table class="items">
	          <thead>
		          <tr>
			        <th class="cel-width">Fullname</th>
			        <th>Email</th>
		     	    <th class="cel-width">Country</th>
					<th>Comments</th>
			        <th colspan="2">Option</th>
		          </tr>
	            </thead>
	
	           <?php while ($item = mysqli_fetch_array($results)) { ?>
		          <tr>
			       <td class="text-table cel-width"><?php echo $item['fullname']; ?></td>
			       <td><?php echo $item['email']; ?></td>
			       <td class="text-table cel-width"><?php echo $item['country']; ?></td>
			       <td class="cel-comments"><?php echo $item['comments']; ?></td>
			       <td>
					   <a href="index.php?contactID=<?php echo $item['contactID']; ?>" class="btn delete-btn">Delete</a>
					</td>
		          </tr>
	            <?php } ?>
            </table>
        </div>
      </section>
   </div>

<?php include("./includes/footer.php"); ?>

