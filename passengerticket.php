<?php
  include('connection.php');
 $invoice=false;
 $a=false;
 
  session_start();
  if(isset($_SESSION['user_id']))
   {
    $uid =$_SESSION['user_id'];
    $a=true;

   }
   
   if(isset($_SESSION['book_id']))
   {
    $bid =$_SESSION['book_id'];
    $a=true;
   }
  if($_SERVER["REQUEST_METHOD"] == "POST")

  { 
    
      $userid = $_POST["userid"];
      $bookid = $_POST["bookid"];
    
    
   
   
    $sql="select * from `payment` where user_id='$userid' AND book_id=$bookid";
    $result=mysqli_query($con,$sql);
    
     if($result)
     {
         
         $array=mysqli_fetch_assoc($result);
         $payid=$array['id'];
         $bookid=$array['book_id'];
         $userid=$array['user_id'];
         $source=$array['destination'];
         $date=$array['date'];
         $total=$array['total'];
         $invoice=true;
         

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

  <!-- =======================================================
  * Template Name: Presento - v3.7.0
  * Template URL: https://bootstrapmade.com/presento-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    .cont {
      margin-top: 173px;
    }
    .color {
        color:#fff;
    }
    .color a{
        color:#fff;
    }
    }
  </style>
</head>

<body>
<?php
if($a)
{
  
      echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your user id is '. $uid.'  and book id is '. $bid.'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div> ';
}

      if($invoice)
      {
        
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your user id is '. $userid.'ticket to '. $source.' of rupees '. $total.' on date '. $date.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> ';
            
      }


?>
 

  <div class="container">

    <div class="pt-5">
      <h1 class="text-center"> Enter User Details</h1>
      <div class="container">
        <div class="row">
          <div class="col-md-5 mx-auto">
            <div class="card card-body">
              <form id="submitForm" action="/dbms/passengerticket.php" method="post" data-parsley-validate=""
                data-parsley-errors-messages-disabled="true" novalidate="" _lpchecked="1">
                <input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">

                <div class="form-group required my-3">
                  <!-- <lSabel for="username"> Enter your email </lSabel> -->
                  <input type="text" class="form-control text-lowercase" id="userid" required="" name="userid"
                    placeholder="Enter your user_id" value="">
                </div>
                <div class="form-group required my-3">
                  <!-- <lSabel for="username"> Enter your email </lSabel> -->
                  <input type="text" class="form-control text-lowercase" id="bookid" required="" name="bookid"
                    placeholder="Enter your Book_id" value="">
                </div>

                <!-- <div class="form-group mt-4 mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="remember-me" name="remember-me"
                                    data-parsley-multiple="remember-me">
                                <label clss="custom-control-label" for="remember-me"> Remember me? </label>
                            </div>
                        </div> 
                        <p class="small-xl pt-3">
                        <span class="text-muted"> forgot possword? </span>
                        <a href="/dbms/recover.php"> Click here </a>
                    </p> -->
                <div class="form-group pt-1 ">
                  <button class="btn btn-primary btn-block" name="submit" type="submit">Get Ticket</button>
                  <button class="btn btn-primary btn-block color"><a href="/dbms/interface.php">Go back</a></button>
                </div>

              </form>
              <!-- <p class="small-xl pt-3 text-center">
                        <span class="text-muted"> forgot possword? </span>
                        <a href="/dbms/recover.php"> Click here </a>
                    </p> -->
              <!-- <p class="small-xl pt-3 text-center">
                        <span class="text-muted"> Not a member? </span>
                        <a href="/dbms/signup.php"> Signup </a>
                    </p> -->
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>


</body>

</html>