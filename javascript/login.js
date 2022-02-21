
$("#submit").click(function (){

    var username = $("#userName").val();
    var password = $("#Password").val();

    $.ajax({
        type:"POST",
        url:"../Database/DBLogin.php",
        data: {
            username: username,
            password: password
        },
        cache: false,
        success: function (data){
            if(data=='false'){
                $("#usrpwinccorect").css('display','revert');
            }
            else {
                window.location.replace("home.php");
            }
        },
        error: function (xhr,status,error){
            console.log(xhr);
        }
    });


})