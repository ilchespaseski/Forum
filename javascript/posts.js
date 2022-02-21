$(document).ready(function (){
    topicname = sessionStorage.getItem("topicname");
    console.log(topicname);


    var $pagination = $('#pagination'),
        totalRecords = 0,
        records = [],
        displayRecords = [],
        recPerPage = 10,
        page = 1,
        totalPages = 0;
    $.ajax({
        url: "../Database/Getposts.php",
        async: true,
        dataType: 'json',
        type:'POST',
        data: {
            topicname: topicname
        },
        success: function (data) {
            records = data;
            console.log(records);
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
    /*
    $.ajax({
        async: false,
        type:"POST",
        url:"../Database/Getposts.php",
        data:{
            topicname: topicname
        },
        success: function (data){
             obj = jQuery.parseJSON(data);
            obj.forEach(element => $("#post-container").append(
                '<tr class="container"><td><button id="tpcbtn" type="button" ' +
                'value="'+ element.body +'" >' + element.body +
                '</button></td><td>'+element.author+'</td><td>')    );

            $("#post-header").append('<span class="h5 col-10"> Name of topic: '+topicname+'</span>'+'<a class="btn btn-success col-2" ' +
                'id="createnewtopic" href="#ex1" rel="modal:open">Add a new post</a>');

        },

        error: function (xhr, status, error){
            console.error(xhr);
        }
    });


*/



    $("#addpost").click(function () {
        post = $("#post").val();
        $.ajax({
            type:"POST",
            url:"../Database/DBCreatepost.php",
            data:{
                post: post,
                topicname: topicname
            },
            success: function (data){
                console.log(data);
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
        url:"../Database/DBLogout.php",
        success: function (data){
            location.reload();
        },
        error: function (xhr, status, error){
            console.error(xhr);
        }

    });
});
});