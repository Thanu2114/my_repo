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
            background: url('/bus.jpg');
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

        .container {
            margin: 257px auto;
            justify-content: center;
        }
        .card2
        {
            padding-left: 55px;
        }
    </style>
</head>

<body>



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
                <button class="btn-danger"><a href="/dbms/index.php">Go back</a></button>
                <!-- <button class="btn-danger">Signup</button> -->
            </div>

        </div>
    </div>
</nav>


<div class="container d-flex align-items-center my-7 justify-content-center">

    <div class="card1">
        <div class="card" style="width: 18rem;">
           
            <div class="card-body">
                <h5 class="card-title">Conuctor</h5>
                <p class="card-text">Please login to check if the tickets are used or not</p>
                <a href="/dbms/conductorlogin.php" class="btn btn-primary">conductor login</a>
            </div>
        </div>
    </div>
    <div class="card2">
        <div class="card" style="width: 18rem;">
            
            <div class="card-body">
                <h5 class="card-title">Passenger</h5>
                <p class="card-text">Please login to book tickets.have a happy and safe journey</p>
                <a href="/dbms/signup.php" class="btn btn-primary">passenger login</a>
            </div>
        </div>
    </div>
</div>