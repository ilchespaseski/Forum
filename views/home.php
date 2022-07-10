<?php
session_start();
if(!isset($_SESSION["iflogedin"]) || $_SESSION["iflogedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<header>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../javascript/home.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <script src="../jquery.twbsPagination.js"></script>
    <script src="../jquery.twbsPagination.min.js"></script>
    <script src="../twbs-pagination.jquery.json"></script>
</header>

<body>
<div>
    <div class="home-header ">
<span class="d-flex flex-row-reverse">
          <span><a class="btn btn-danger p-2" id="logout">Logout</a></span>

<?php

    echo '<span class="output h4 p-2" id="username"> ' . $_SESSION['user'] . '</span>';

?>
    </span>
    </div>

    <div class="topic-section container">
        <div class="row topic-info">
            <span class="h5 col-10">Topics of all users</span>
            <a class="btn btn-success col-2" id="createnewtopic" href="#ex1" rel="modal:open">Add a new topic</a>
        </div>


            <div id="container" class="row">

            </div>


    </div>

    <div id="ex1" class="modal">
        <div class="mx-auto align-middle">
            <div class="text-center h2 login-header">Creating a new Topic</div>
            <div class="mb-3">
                <label  class="form-label">Topic name</label>
                <input  placeholder="Enter topic name" autocomplete="off" class="form-control" id="topic-name">
                <div class="usrpwwrong" id="emptytpcname">*Please fill the topic name</div>
            </div>
            <a class="btn btn-success mx-auto align-middle" id="addtopic">Add Topic</a>
            <a href="#" rel="modal:close" class="btn btn-danger">Close</a>

        </div>
    </div>

    <div id="pager" class="d-flex justify-content-center">
        <ul id="pagination" class="pagination text-center mb-3"></ul>
    </div>

</div>
</body>

</html>