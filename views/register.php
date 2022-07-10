<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../javascript/register.js" type="text/javascript"></script>
</head>
<body style="background-color: #f5f2ea !important">
<div class="container">
    <div class="img"></div>
    <form class="login mx-auto align-middle">
        <div class="text-center h2 reg-header">Sign Up</div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="username" placeholder="Username" class="form-control" id="userName" name="userName" >
            <div class="fill-alert" id="fillAlert" href="index.php">*Please enter your username.</div>

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" placeholder="Password" class="form-control" id="password" name="password">
            <div class="fill-alert" id="fillAlertPw" href="index.php">*Please enter your password.</div>

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input type="password" placeholder="Confirm Password" class="form-control" id="confirmpassword" name="confirmpassword">
            <div class="fill-alert" id="fillAlertCnfPw" href="index.php">*Please confirm your password.</div>
            <div class="MatchAlert" id="DidntMatchAlert">*Password didn't match.</div>
            <div><a class="hav-acc" href="index.php">I already have account</a></div>
        </div>
        <a class="btn btn-danger" id="submit">Sign up </a>

    </form>
</div>

<script src="../javascript/register.js" rel="script"></script>
</body>
</html>