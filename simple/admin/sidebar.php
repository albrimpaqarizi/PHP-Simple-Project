

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
<link  rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"/>
      <script src="./assets/js/dropdown.js"></script>
</head>
<body>



<div class="sidebar">
    <a href="../index.php" class="dashboard-title">Dashboard</a><hr>
  <ul>
    <li ><i class="icon fas fa-file"></i>
      <a href="../index.php" class="dropbtn">Simple </a>
   </li>
   <li class="dropdown"><i class="icon fas fa-user"></i>
      <a href="#" class="dropbtn">Users </a><i class="arrow fas fa-caret-down"></i>
      <div class="dropdown-content" >
       <a href="#">List</a>
       <a href="./users/create.php">Create</a>
      </div>
   </li>
   <li class="dropdown"><i class="icon fas fa-clone"></i>
      <a href="#" class="dropbtn">Posts </a><i class="arrow fas fa-caret-down"></i>
      <div class="dropdown-content" >
       <a href="#">List</a>
       <a href="./posts/create.php">Create</a>
      </div>
   </li>
   <li class="dropdown"><i class="icon fas fa-allergies"></i>
      <a href="#" class="dropbtn">another </a><i class="arrow fas fa-caret-down"></i>
      <div class="dropdown-content" >
       <a href="#">Link</a>
       <a href="#">Link</a>
       <a href="#">Link</a>
      </div>
   </li>
  </ul>
</div>


