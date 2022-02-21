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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
<form class="login mx-auto align-middle">
    <div class="text-center h2 login-header">Sign In</div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="email" placeholder="Username" class="form-control" id="userName" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" placeholder="Password" class="form-control" id="Password">
    </div>
    <div class="usrpwwrong" id="usrpwinccorect">*Incorrect username or password</div>
    <a class="btn btn-success" id="submit">Sign in</a>
   <a href="register.php" class="btn btn-danger">Sign up </a>

</form>
</div>
<script src="../javascript/login.js" type="text/javascript"></script>
</body>
</html
