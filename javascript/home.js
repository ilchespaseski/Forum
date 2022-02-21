$(document).ready(function (){

    var $pagination = $('#pagination'),
        totalRecords = 0,
        records = [],
        displayRecords = [],
        recPerPage = 10,
        page = 1,
        totalPages = 0;
    $.ajax({
        url: "../Database/Gettopics.php",
        async: true,
        dataType: 'json',
        success: function (data) {
            records = data;
            console.log(records);
            totalRecords = records.length;
            totalPages = Math.ceil(totalRecords / recPerPage);
            apply_pagination()
        }
    });

    function generate_table() {
        var tr;
        $('#container').html('');
        for (var i = 0; i < displayRecords.length; i++) {
            tr = $('<tr/>');
            tr.append('<td><button id="tpcbtn" value="' + displayRecords[i].topicname + '" >' + displayRecords[i].topicname +
                '</button></td>');
            tr.append('</button></td><td>' + displayRecords[i].author + '</td><td>');
            tr.append('<button class="btn btn-danger " id="delete-btn" value="' + displayRecords[i].id + '">Delete</button></td></tr>');
            $('#container').append(tr);
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
/*
    $.ajax({
        async:false,
        type:"GET",
        url:"../Database/Gettopics.php",
        success: function (data){

            var obj = jQuery.parseJSON(data);
            obj.forEach(element => $("#container").append(
                '<tr class="container"><td><button id="tpcbtn" value="'+ element.topicname +'" >' + element.topicname +
                '</button></td><td>'+element.author+'</td><td>' +
                '<button class="btn btn-danger " id="delete-btn" value="'+ element.id +'">Delete</button></td></tr>'));
        },

        error: function (xhr, status, error){
            console.error(xhr);
        }
    });
*/
    $('#container').on('click', '#tpcbtn', function(){
        var topicname = $(this).val();
        sessionStorage.setItem("topicname", topicname);
        window.location.replace("posts.php");

    })

    $('#container').on('click', '#delete-btn', function(){
        tpcid = $(this).val();
        $.ajax({
            type:"POST",
            url:"../Database/DBDeletetopic.php",
            data:{
                tpcid:tpcid
            },
            success: function (data){
                location.reload();
            },
            error: function (xhr, status, error){
                console.error(xhr);
            }

        });
    });

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


    $("#addtopic").click(function () {
        tpcname = $("#topic-name").val();
        if(tpcname===""){
            $("#emptytpcname").css('display','revert');
        }else {
        $.ajax({
            type:"POST",
            url:"../Database/DBCreatetopic.php",
            data: {
                tpcname: tpcname
            },
            cache: false,
            success: function (data){
                location.reload();
            },
            error: function (xhr, status, error){
                console.error(xhr);
            }

        });
        }
    });
    })
$("#tpcbtn").click(function () {
    console.log("btn")
});