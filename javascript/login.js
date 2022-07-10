// Get the input field
var input = document.getElementById("Password");

input.addEventListener("keypress", function(event) {
    // If the user presses the "Enter" key on the keyboard
    if (event.key === "Enter") {
        Checking();
    }
});

function Checking(){
    var username = $("#userName").val();
    var password = $("#Password").val();

    $.ajax({
        type:"POST",
        url:"../Database/Autoload.php",
        data: {
            username: username,
            password: password,
            query:'Login'
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
}

$("#submit").click(function (){

   Checking();

})