$("#submit").click(function (){

    var username = $("#userName").val();
    var password = $("#password").val();
    var confirmpassword = $("#confirmpassword").val();

    function validateUserName(username) {
        var usernameRegex = /^[a-zA-Z0-9]/;
        return usernameRegex.test(username);
    }

    function validatePassword(password){
        var passwordRegex = /^[a-zA-Z0-9]+$/;
        return passwordRegex.test(password);

    }

    if(username == '' || password == '' || confirmpassword == '') {
        if(username == ''){
            $("#fillAlert").css("display","revert");
        }

        if(password=='') {
            $("#fillAlertPw").css("display","revert");
        }
        if(confirmpassword=='') {
            $("#fillAlertCnfPw").css("display","revert");
        }


    } else if(password !== confirmpassword )    {
        if(password !== confirmpassword) {
            $("#DidntMatchAlert").css("display", "revert");
        }
    } else if (validateUserName(username) === false){
        alert("Ne sodrzi soodvetni elementi");
    } else {
        $.ajax({
            type:"POST",
            url:"../Database/Autoload.php",
            data: {
                username: username,
                password: password,
                query: 'Register'
            },
            cache: true,
            success: function (data){
                location.replace("index.php");
            },
            error: function (xhr, status, error){
                console.error(xhr);
            }

        });
    }

})