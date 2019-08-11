


<div class="main">
  <div class="navbar"> 
    <div class="search-container">
     <form class="form-inline">
      <input class="input-form" type="search" placeholder="Search" aria-label="Search" />
      <button class="btn" type="submit"><i class="fas fa-search"></i></button>
     </form>
    </div>

     <div class="dropdown1">
       <button class="dropbtn1" onclick="myFunction()">User profile
        <i class="fa fa-caret-down"></i>
       </button>
       <div class="dropdown-content2" id="myDrop">
         <a href="#"><i class="far fa-user-circle"></i> Profile</a>
         <a href="#"><i class="fas fa-tools"></i> Setting</a>

           <!-- logged in user information -->
    <?php  if (isset($_SESSION['email'])) : ?>
    	 <a href="index.php?logout='1'" style="color: red;"><i class="fas fa-sign-out-alt"></i> Logout</a>
    <?php endif ?>  

        </div>
     </div> 
  </div>
</div>

