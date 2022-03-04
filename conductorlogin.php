<?php


include("connection.php");
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
   
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    
     
    $sql = "select * from conductor where email='$email' AND password='$password'";
    // $sql = "Select * from users where email='$email'";
    $result = mysqli_query($con, $sql);
    $result2=mysqli_fetch_assoc($result);
    $user_id=$result2['id'];
    
    
    
    $num = mysqli_num_rows($result);


    if ($num == 1)
    {
        // while($row=mysqli_fetch_assoc($result))
    
            // if (password_verify($password, $row['password']))
             
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['user_id']=$user_id;
                
                header("Location:/dbms/conductorinterface.php");
    }        
     else
     {
                $showError = "Invalid Credentials";
    }
        
        
     
    // else{
    //     $showError = "Invalid Credentials";
    // }
}
    
?>











<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .btn-danger a {
            text-decoration: none;
            color: white;
        }

        .pass {
            margin: 13px;
        }

        .pass a {
            padding-left: 43px;
        }

        body {
            /* background: #28a745 !important; */
            background:url('/bus.jpg');
            font-family: 'Muli', sans-serif;
            background-size: cover;
        }

        h1 {
            color: #fff;
            padding-bottom: 2rem;
            font-weight: bold;
        }

        a {
            color: #333;
        }

        a:hover {
            color: #E8D426;
            text-decoration: none;
        }

        .form-control:focus {
            color: #000;
            background-color: #fff;
            border: 2px solid #E8D426;
            outline: 0;
            box-shadow: none;
        }

        .btn {
            background: #28a745;
            border: #E8D426;
        }

        .btn:hover {
            background: #28a745;
            border: #E8D426;
        }
    </style>
</head>

<body>
<?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>
 


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>
<nav class="navbar navbar-expand-lg navbar-light bg-secondary ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Vega</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="/dbms/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about.html">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/contact.html">Contact us</a>
                </li>

            </ul>

            <div class="mx-2">
                <button class="btn-danger"><a href="/dbms/interface.php">Go back</a></button>
                <!-- <button class="btn-danger">Signup</button> -->
            </div>

        </div>
    </div>
</nav>



<div class="pt-5">
    <h1 class="text-center"> Login</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card card-body">
                    <form id="submitForm" action="/dbms/conductorlogin.php" method="post" data-parsley-validate=""
                        data-parsley-errors-messages-disabled="true" novalidate="" _lpchecked="1">
                        <input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">
                        <div class="form-group required my-3">
                            <!-- <lSabel for="username"> Enter your name </lSabel> -->
                            <input type="email" class="form-control text-lowercase" id="email" required=""
                                name="email"  placeholder ="Enter your Email" value="">
                        </div>
                        <div class="form-group required my-3">
                            <!-- <lSabel for="username"> Enter your email </lSabel> -->
                            <input type="password" class="form-control text-lowercase" id="password" required=""
                                name="password"  placeholder ="Enter your password" value="">
                        </div>
                        
                        <div class="form-group mt-4 mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="remember-me" name="remember-me"
                                    data-parsley-multiple="remember-me">
                                <label clss="custom-control-label" for="remember-me"> Remember me? </label>
                            </div>
                        </div> 
                        <p class="small-xl pt-3">
                        <span class="text-muted"> forgot possword? </span>
                        <a href="/dbms/recover.php"> Click here </a>
                    </p>
                        <div class="form-group pt-1">
                            <button class="btn btn-primary btn-block" type="submit">Login</button>
                        </div>
                        
                    </form>
                    <!-- <p class="small-xl pt-3 text-center">
                        <span class="text-muted"> forgot possword? </span>
                        <a href="/dbms/recover.php"> Click here </a>
                    </p> -->
                    <p class="small-xl pt-3 text-center">
                        <span class="text-muted"> Not a member? </span>
                        <a href="/dbms/conductorsignup.php"> Signup </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


</html>