

<?php
session_start();

 include "./mysql/dbconnect.php";


if (isset($_POST['send-msg'])) {
  
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $country = implode(',', $_POST['country']);
  $comments = mysqli_real_escape_string($db, $_POST['comments']);
   
  if (empty($fullname)) { array_push($errors, "Fullname is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($country)) { array_push($errors, "Country is required"); }
  if (empty($comments)) { array_push($errors, "Comments is required"); }
    
  if (count($errors) == 0) {
  
  	$query = "INSERT INTO contact (fullname, email, country, comments ) 
  			  VALUES('$fullname' ,'$email',' $country ' , '$comments')";
      $results = mysqli_query($db, $query);
        header('location: ./index.php');
  }
}  

?>



  <?php include("./includes/header.php"); ?>



    <section class="container  contact-container">
        <h3>Contact
            <span> Praesent lacinia purus in metus molestiesuscipit</span>
          </h3>
      <div class="main-contact">
         <div class="forma ">
           <p>
             Nulla facilisi. Etiam nec pretium turpis, ac viverra felis.Praesent nec vulputate libero, 
             ac tincidunt enim. Mauris volutpat, dui vel commodo dictum, tellus nibh volutpat lacus, non 
             congue arcu nisl id diam. Morbi in massa turpis. Praesent lacinia purus in metus molestie 
             suscipit. Nullam blandit augue libero, a sagittis elit vestibulum et.
            </p>

            <?php include('./includes/errors.php'); ?>
           <form class="form-inline" action="contact.php" method="POST" id="myform">
             
             <div class="input-group">
             <label for="fullname">Name</label><br>
             <input class="input-contact col-12 error" type="text" id="fullname" name="fullname" 
                  data-validation="length" 
		              data-validation-length="min3" 
                  data-validation-error-msg="The name has to contain at least 5 characters">
             </div>
            
             <div class="input-group">
               <label for="email">Email</label>
               <input class="input-contact col-12" type="email" id="email" name="email"
               data-validation="email">
             </div>

             <div class="input-group">
             <label >Please check your cuntry</label>
               <div class="input-contact col-12">
                   <input type="checkbox" id="albania"  name="country[]" value="albania" 
                    data-validation="checkbox_group" data-validation-qty="min1">Albania<br>

                   <input type="checkbox"  id="kosovo"  name="country[]" value="kosovo"
                   data-validation="checkbox_group" data-validation-qty="min1">Kosovo<br>
               </div>
             </div>
             
             <div class="input-group">
               <label id="comments">Comments</label>
               <textarea class="comments-area col-12" type="textarea" id="comments" name="comments"
               data-validation="length" data-validation-length="5-400"></textarea>
             </div>
             <button class="btn btn-send" type="submit" name="send-msg">Send</button>
           </form>

       </div>

         <div class="map">
           <div class="embed-responsive embed-responsive-4by3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d28658.29209660947!2d-80.126429!3d26.1221996!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1558449899574!5m2!1sen!2s"></iframe>
            </div>
            <p>
                Nulla facilisi. Etiam nec pretium turpis, ac viverra felis.Praesent nec vulputate libero, 
                ac tincidunt enim. Mauris volutpat, dui vel commodo dictum, tellus nibh volutpat lacus, non 
                congue arcu nisl id diam. Morbi in massa turpis. Praesent lacinia purus in metus molestie 
                suscipit. Nullam blandit augue libero, a sagittis elit vestibulum et.
               </p>
          </div> 
      </div>
    </section>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript"
     src="http://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script>
		$.validate({
      form : '#myform',
    });
	  </script>
     
    <?php include("./includes/footer.php");?>
    
