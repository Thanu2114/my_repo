<?php
session_start();

include("connection.php");

$invoice=false;

if($_SERVER["REQUEST_METHOD"] == "POST")
{  
    
    $cardno = $_POST['cardno'];
    $expiry=$_POST['expiry'];
    $cvv=$_POST['cvv'];
    $source=$_POST['sd'];
    $notb=$_POST['notb'];
    $cost=$_POST['cost'];
    $total=$_POST['total'];
    $sd=$_POST['sd'];

    
   if(isset($_SESSION['user_id']))
   {
    $uid =$_SESSION['user_id'];

   }
   
   if(isset($_SESSION['book_id']))
   {
    $bid =$_SESSION['book_id'];

   }
  $query=" INSERT INTO `payment` ( `cardno`, `expiry`, `cvv`, `notb`, `cost`, `total`, `user_id`, `book_id`, `destination`,`date`) VALUES ('$cardno', '$expiry', '$cvv', '$notb', '$cost', '$total', '$uid', '$bid', '$sd',  current_timestamp())";
  
   $result = mysqli_query($con, $query);
   if($result)
   {
        
        $payment="Select * from `payment` where user_id ='$uid' AND book_id ='$bid'";
        $sql=mysqli_query($con,$payment);
        $array=mysqli_fetch_assoc($sql);
        $payid=$array['id'];
        $bookid=$array['book_id'];
        $userid=$array['user_id'];
        $invoice=true;
        header("Location:/dbms/passengerticket.php");
   }
   else{
       $a=mysqli_error($result);
       echo"$a";
       echo"its not saved";
   }
   
}














?>








<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HOME</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  
  <link href="assets/css/style.css" rel="stylesheet">

 

<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');


* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    
    padding: 30px 10px
}

.card {
    max-width: 500px;
    margin: auto;
    color: black;
    border-radius: 20 px
}

p {
    margin: 0px
}

.container .h8 {
    font-size: 30px;
    font-weight: 800;
    text-align: center
}

.btn.btn-primary {
    width: 100%;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 15px;
    background-image: linear-gradient(to right, #77A1D3 0%, #79CBCA 51%, #77A1D3 100%);
    border: none;
    transition: 0.5s;
    background-size: 200% auto
}

.btn.btn.btn-primary:hover {
    background-position: right center;
    color: #fff;
    text-decoration: none
}

.btn.btn-primary:hover .fas.fa-arrow-right {
    transform: translate(15px);
    transition: transform 0.2s ease-in
}

.form-control {
    color: white;
    background-color: #223C60;
    border: 2px solid transparent;
    height: 60px;
    padding-left: 20px;
    vertical-align: middle
}

.form-control:focus {
    color: white;
    background-color: #0C4160;
    border: 2px solid #2d4dda;
    box-shadow: none
}

.text {
    font-size: 14px;
    font-weight: 600
}

::placeholder {
    font-size: 14px;
    font-weight: 600
}
.payment
{
    margin-top:95px;
}
.color{
    color:#fff;
}
.color a{
    color:#fff;
}
</style>
<script>
    function computeTicket() {
        var notb=document.getElementById('notb').value;
    
        var cost=document.getElementById('cost').value;
        var total=notb*cost;
        document.getElementById('total').value=total;
        

    }
   

   
</script>
</head>

<body>
    
        
        <!-- //     echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        //         <strong>Success!</strong> Your user id is '. $userid.'and book id is '. $bookid.'
        //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //             <span aria-hidden="true">&times;</span>
        //         </button>
        //     </div> ';
        //    header("Location:/dbms/passengerticket.php");
         -->

      }




 
  <!-- <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="index.html">Presento<span>.</span></a></h1>
      

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
         
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
       
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
</div>
</header> -->
<br>
<br>

<div class="payment">
    <form action="/dbms/payment.php" method ="post">
    <div class="container p-0">
    <div class="card px-4">
        <p class="h8 py-3">Payment Details</p>
        <div class="row gx-3">
        
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Card Number</p> 
                    <input class="form-control mb-3" type="text" placeholder="1234 5678 435678" name="cardno">
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Expiry</p> 
                    <input class="form-control mb-3" type="text" placeholder="MM/YYYY" name="expiry">
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">CVV/CVC</p> 
                    <input class="form-control mb-3 pt-2 " type="password" placeholder="***" name="cvv">
                </div>
            </div>
            <div class="col-12">
              <div class="d-flex flex-column">
                <select  class="form-control mb-3" name="sd" aria-label=".form-select-lg example"  id="source">
                <option selected>Select source and destination</option>
                <option >Begur-AMC</option>
                <option >AMC College-Begur</option>
                <option>Majestic-AMC</option>
                <option>AMC-Majestic</option>
              </select>
             </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Number of tickets bought</p> 
                    <input  class="form-control mb-3" type="number" placeholder="0" name="notb" onchange="computeTicket()" id="notb">
                </div>
            </div>
            
            
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Enter the cost of the ticket</p> 
                    <input  class="form-control mb-3" type="number" placeholder="0" name="cost" onchange="computeTicket()" id="cost">
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Total amount to be paid</p> 
                    <input  class="form-control mb-3" type="number" placeholder="0" name="total"  id="total">
                </div>
            </div>
            
            
            
            <div class="col-12">
            <button  type="submit" name="submit" class="btn btn-primary my-4">PAY NOW</button>
            </div>
           
        </div>
    </div>

   <!-- <div class="form-group pt-1 ">
                  
                  <button class="btn btn-primary btn-block color"><a href="/dbms/passengerticket.php">GET tickeTS</a></button>
                
    </div> -->
    </form>
    
    <p class ="text mb-1">Please refer the cost details page for respective destination <a href="#">click here</a></p>
</div>

    
</html>