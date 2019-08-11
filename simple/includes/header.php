

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WebSite</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"
    />

  </head>
 
  <body>
    
 <header>
      <div class="top-nav container">
        <div class="login-logout">

         <!-- login user -->
          <?php  if (!isset($_SESSION['email'])) : ?>
            <a class="btn" href="..//../simple/login.php">Log In</a>
          <?php endif ?>

         <!-- logged in user information -->
          <?php  if (isset($_SESSION['email'])) : ?>
            <a href="index.php?logout='1'" class="btn" >Log out</a> 
      	    <p >Welcome <span><?php echo $_SESSION['email']; ?></span></p>
          <?php endif ?>
        </div>

        <form class="form-inline">
          <input
            class="input-form"
            type="search"
            placeholder="Search"
            aria-label="Search"
          />
          <button class="btn" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>

      <nav class="navbar navbar-lg container">

        <a class="navbar-brand" href="#">Simple</a>
        <button class="navbar-toggler" type="button">
            <a href="javascript:void(0);" class="navbar-icon" onclick="navCollapse()"> <i class="fas fa-bars"></i></a>
        </button>
        
        <div class="collapse nav-collapse" >
          <ul class="navbar-nav" id="nvv">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
              <span class="triangle-up"></span>
            </li>
            <li class="nav-item"><a class="nav-link" href="product.php">Product</a></li>
            <li class="nav-item"><a class="nav-link" href="blog.php"  >Blog</a></li>
            <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
          </ul>
        </div>
      </nav>
    </header>