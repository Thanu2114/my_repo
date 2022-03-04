<?php
session_start();

   
   include("connection.php");
   $booking=false;
  
 if(isset($_POST['submit']))
 { 
   
   $source=$_POST['source'];
   $destination=$_POST['destination'];
   
   if(isset($_SESSION['user_id']))
   {
    $uid =$_SESSION['user_id'];

   }
   $query="INSERT INTO `book` ( `source`, `destination`, `user_id`) VALUES ( '$source', '$destination','$uid')";
   
   $result=mysqli_query($con , $query);
   if($result)
   {
     echo"data saved";
     header("Location:/dbms/payment.php");
   }
   else{
     $a=mysqli_error($result);
     echo"$a";
   }
   $last_entry=mysqli_insert_id($con);
   

   $sql="Select * from `book` where user_id ='$uid' AND book_id ='$last_entry'";
   
   
   $result1=mysqli_query($con, $sql);
   
   
   $result2=mysqli_fetch_assoc($result1);
   $book_id=$result2['book_id'];
   $num = mysqli_num_rows($result1);
   if ($num == 1)
    {
        
             
                $booking = true;
                
               
                $_SESSION['book_id']=$book_id;
                
    }
  



   
   $book_id=$result2['book_id'];
  

   
  //  $=mysqli_error($result2);
  //  echo $result3;
  //  if($result)
  //  {
  //    echo"connection successfull";
  //  }
  //  else{
  //    echo"die";
  //  }
   
   

   

  //  $book_id=$result2['id'];
  //  $num=mysqli_num_rows($result);
  //  if($num==1)
  //  {
  //    $booking=true;
  //    session_start();
  //    $_SESSION['book_id']=$book_id;
  //  }
   
   
 
}


?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
    .color{
      color:white;
    }
    .color a{
      color: #fff;
    }
    .color a:hover{
      color:#fff;
    }

    </style>
  </head>
  <body>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  <!-- <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
      Bootstrap
    </a>
  </div>
</nav> -->
<html>

<head>
  <link href='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.16.0/codemirror.css' rel='stylesheet'>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.16.0/codemirror.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.16.0/mode/htmlmixed/htmlmixed.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.16.0/mode/javascript/javascript.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.16.0/mode/xml/xml.js'></script>

  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>HOME</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
  </head>

<body>

  <!-- <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="index.html">Presento<span>.</span></a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->

      <!-- <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li> -->
          <!---- <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>-->
          <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
          <!----  <li><a href="blog.html">Blog</a></li>-->
          <!--- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>-->
          <!-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav> -->

      <!-- <a href="/dbms/booking.php" class="get-started-btn scrollto">Book Tickets</a>

    </div>
  </header> -->
  <br>
  <br>
  <br>
  <br>
  <br>
<!-- <div class="container">
  <form action="/dbms/booking.php" method="post">
 <select class="form-select form-select-lg mb-3" name="source" aria-label=".form-select-lg example">
  <option selected>Open this select menu</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
 </select>

 <select class="form-select form-select-sm" name="destination" aria-label=".form-select-sm example">
  <option selected>Open this select menu</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
 </select>
 <button type="submit" name="submit" class="btn btn-primary">BOOK NOW</button>
 <button type="submit" name="submit" class="btn btn-success"><a href="/dbms/interface.php">GO BACK</a></button>

 </form>
</div> -->

<div style="background-color: #FFF; max-width: 800px; margin: auto; padding: 20px;">
  <div class="container-fluid">
    <form action="/dbms/booking.php" method="post" >
    <select class="form-select form-select-lg mb-3" name="source" aria-label=".form-select-lg example">
    <option selected>Select source</option>
    <option >Begur</option>
    <option >AMC College</option>
    <option >Majestic</option>
   </select>

    <select class="form-select form-select-lg mb-3" name="destination" aria-label=".form-select-sm example">
    <option selected>Select destination</option>
    <option>Begur</option>
    <option>AMC College</option>
    <option>Majestic</option>
    </select>
     <button type="submit" name="submit" class="btn btn-primary my-4">BOOK NOW</button>
     

    </form>
  </div>
</div> 

</html>