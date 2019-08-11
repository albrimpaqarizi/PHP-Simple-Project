<?php 
  include ("./mysql/dbconnect.php");

  $per_page = 3; 
  $page = 1;
  $prev = $page - 1;                
  $next = $page + 1;  
 
  if (isset($_GET['page'])) 
  {
   $page = intval($_GET['page']); 

   if($page < 1) $page = 1;
 }
 
  $start_from = ($page - 1) * $per_page; 
 
  $current_items = mysqli_query($db, "SELECT * FROM posts LIMIT $start_from, $per_page");
  $total_pages_sql = "SELECT COUNT(*) FROM posts";
  $result = mysqli_query($db,$total_pages_sql);
  $total_rows = mysqli_fetch_array($result)[0];
  $total_pages = ceil($total_rows / $per_page);

?>


    
  <?php include("./includes/header.php"); ?>

    <section class="container portofolio-container">
        <h3>portofolio
            <span> Praesent lacinia purus in metus molestiesuscipit</span>
        </h3>

         <div class="main-portofolio">
           <div class="main-portofolio-1 ">
              <div  class="title-categories-portofolio">
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

           <div class="main-portofolio-2 ">
           
              <div class="post-portofolio">
          <?php   if( mysqli_num_rows($current_items) > 0) { ?>

              <?php while ($item = mysqli_fetch_assoc($current_items)) { ?>

                  <div class="responsive-post ">
                      <a  href="./posts.php?postID=<?php echo $item['postID']?>">
                      <?php  $image = $item['imagee']; $image_src = "./admin/uploads/".$image; ?>
                        <img src='<?php echo $image_src;  ?>'  width="600" height="400"  class="img-thumb-post">
                      </a>
                      <div class="desc">
                          <h4><?php echo $item['title']; ?> <br> <p><?php echo $item['description']; ?></p></h4> 
                      </div>
                    </div>
                    <?php } ?>
                  <?php } ?>
                  
              </div>

                  <?php   echo "<ul class='pagination' >";
                     echo "<li><a href='?page=".($page-1)."' ><i class='fas fa-angle-left'> </i></a></li>";

                     for ($i=1; $i<=$total_pages; $i++) {  
                     echo "<li><a href='?page=".$i."'>".$i."</a></li>";
                     };  
                     
                     if($page < $i - 1)
                     {
                     echo "<li><a href='?page=".($page+1)."' ><i class='fas fa-angle-right'> </i></a></li>";
                     }
                     else
                      {
                     echo "<li><a  href='#'><i class='fas fa-angle-right'> </i></a></li>";
                     }
                  echo "</ul>";  ?>
            </div>
          </div>
       </section>

       <?php include("./includes/footer.php");?>
