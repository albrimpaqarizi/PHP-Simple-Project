
<?php 
  include ("./mysql/dbconnect.php");

  if  (isset($_GET['postID'])) {
    $post_id = $_GET['postID'];
    $query = "SELECT * FROM posts WHERE postID=$post_id ";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $title = $row['title'];
      $description = $row['description'];
    }
  }
?>



  <?php include("./includes/header.php"); ?>

  <section class="container portofolio-container">
      <?php $results = mysqli_query($db, "SELECT * FROM posts"); ?>
        
         <div class="main-blog-1">
            <div class="title-blog" >
              <h2><?php echo $row['title']; ?> <br> <p>Posted by Admin in Category 1, Category 2</p></h2> 
              <a class="comments-blog"><i class="fas fa-comment-alt"></i></a>
            </div>
 
            <div class="blog-post responsive">
              <a  href="#">
              <?php  $image = $row['imagee']; $image_src = "./admin/uploads/".$image; ?>
                 <img src='<?php echo $image_src;  ?>' width="800" height="400" class="img-thumb">
                <div class="blog-post-date">
                  <h3>10</h3>
                  <p>may <br> 1019</p>
                </div>
              </a>
              <div class="desc">
                <p><?php echo $row['description']; ?></p> 
              </div>
            </div>
         </div>
        

         <div class="main-blog-2">
           <div  class="title-categories">
              <h2><i class="fas fa-bookmark"></i> categories</h2>
           </div>
           <ul class="sidebar-blog">
             <li><a href="#">Pellentesque aliquam</a></li><hr>
             <li><a href="#">volutpat bibendum</a></li><hr>
             <li><a href="#">Maecenas vitae</a></li><hr>
             <li><a href="#">consequat tempor</a></li><hr>
             <li><a href="#">volutpat bibendum</a></li><hr>
             <li><a href="#">Maecenas vitae</a></li><hr>
             <li><a href="#">volutpat bibendum</a></li><hr>
             <li><a href="#">Maecenas vitae</a></li><hr>
             <li><a href="#">odio ex congue est</a></li><hr>
             <li><a href="#">consequat tempor</a></li>
           </ul>
      </div>
     </section>


     <?php include("./includes/footer.php");?>


