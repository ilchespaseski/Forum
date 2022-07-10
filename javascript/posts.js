$(document).ready(function (){
    topicname = sessionStorage.getItem("topicname");


    var $pagination = $('#pagination'),
        totalRecords = 0,
        records = [],
        displayRecords = [],
        recPerPage = 10,
        page = 1,
        totalPages = 0;
    $.ajax({
        url: "../Database/Autoload.php",
        async: true,
        dataType: 'json',
        type:'POST',
        data: {
            topicname: topicname,
            query: 'GetPosts'
        },
        success: function (data) {
            records = data;
            totalRecords = records.length;
            totalPages = Math.ceil(totalRecords / recPerPage);
            if(totalRecords>0) {
                apply_pagination()
            }
            $("#post-header").append('<span class="h5 col-10"> Name of topic: '+topicname+'</span>'+'<a class="btn btn-success col-2" ' +
                'id="createnewtopic" href="#ex1" rel="modal:open">Add a new post</a>');
        },
        error: function (xhr, status, error){
            console.error(xhr);
        }

    });

    function generate_table() {
        var tr;
        $('#post-container').html('');
        for (var i = 0; i < displayRecords.length; i++) {
            tr = $('<tr/>');
            tr.append('<tr class="container"><td><button id="tpcbtn" type="button" ' +
            'value="'+ displayRecords[i].body +'" >' + displayRecords[i].body +
            '</button></td>');
            tr.append('<td>'+displayRecords[i].author+'</td>');
            $('#post-container').append(tr);
        }
    }

    function apply_pagination() {
        $pagination.twbsPagination({
            totalPages: totalPages,
            visiblePages: 6,
            onPageClick: function (event, page) {
                displayRecordsIndex = Math.max(page - 1, 0) * recPerPage;
                endRec = (displayRecordsIndex) + recPerPage;

                displayRecords = records.slice(displayRecordsIndex, endRec);
                generate_table();
            }
        });
    }
    let obj;



    $("#addpost").click(function () {
        post = $("#post").val();
        $.ajax({
            type:"POST",
            url:"../Database/Autoload.php",
            data:{
                post: post,
                topicname: topicname,
                query: 'CreatePost'
            },
            success: function (data){
                location.reload()
                },
            error: function (xhr, status, error){
                console.error(xhr);
            }

        });
    })
$("#logout").click(function (){

    $.ajax({
        type:"POST",
        url:"../Database/Autoload.php",
        data: {
            query: 'Logout',
        },
        success: function (data){
            location.reload();
        },
        error: function (xhr, status, error){
            console.error(xhr);
        }

    });
});
});