<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body style="background-color: #f5f2ea !important">

    <nav class=" container navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="#">My Forum</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                <form class="d-flex">
                    <a href="register.php" class="btn btn-outline-danger" type="submit">Sign upp</a>
                </form>
            </div>
        </div>
    </nav>
    <div class="container login-cont ">

        <form class="login  bg-light mx-auto align-middle ">
            <h2 class="text-center h2 login-header" style="font-weight: 700">Login</h2>
            <h5 class="h5 text-center">Hey, Enter your details to get sign in <br> to your account</h5>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input class="form-control" id="userName" aria-describedby="emailHelp" placeholder="Username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" placeholder="Password" class="form-control" id="Password">
            </div>
            <div class="usrpwwrong" id="usrpwinccorect">*Incorrect username or password</div>
            <div><a class="btn btn-success" id="submit">Sign in</a></div>
            <p style="font-weight: 50">Don't have an account? <a style="font-weight: bold; color:black;"
                    href="register.php">Reguest Now</a></p>


        </form>

    </div>
    <script src="../javascript/login.js" type="text/javascript"></script>
</body>

</html