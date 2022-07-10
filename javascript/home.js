$(document).ready(function (){

    var $pagination = $('#pagination'),
        totalRecords = 0,
        records = [],
        displayRecords = [],
        recPerPage = 12,
        page = 1,
        totalPages = 0;
    $.ajax({
        url: "../Database/Autoload.php",
        dataType: 'json',
        data: {
            query:'GetTopics'
        },
        type:'POST',
        success: function (data) {
            records = data;
            totalRecords = records.length;
            totalPages = Math.ceil(totalRecords / recPerPage);
            apply_pagination()
        }
    });

    function generate_table() {
        var tr;
        $('#container').html('');
        for (var i = 0; i < displayRecords.length; i++) {
            tr = $('<div class="col-md-4 col-xs-12 col-sm-8" style=\"margin-top:5px;\"/>');
            tr.append("<div class=\"card card-topic\"   style=\"width: 18rem\">\n" +
                "  <div class=\"card-body\">\n" +
                "    <h5 class=\"card-title\">Topic</h5>\n" +

                "    <button class=\"card-text tpcbtn\" id=\"tpcbtn\"  value=\"" + displayRecords[i].topicname +"\">"+displayRecords[i].topicname+"</button>\n" +
                "    <h6 class=\"card-subtitle mb-2 text-muted\"> Created by: "+displayRecords[i].author+"</h6>\n" +
                "<button class=\"btn btn-danger \" id=\"delete-btn\" value=\"" + displayRecords[i].id +" \">Delete</button>" +
                "<button class=\"btn btn-success\" id=\"tpcbtn\"  value=\"" + displayRecords[i].topicname +"\">See topic</button>" +
                "  </div>\n" +
                "</div>")
            $('#container').append(tr);
            /*
            tr.append('<td><button id="tpcbtn" value="' + displayRecords[i].topicname + '" >' + displayRecords[i].topicname +
                '</button></td>');
            tr.append('</button></td><td>' + displayRecords[i].author + '</td><td>');
            tr.append('<button class="btn btn-danger " id="delete-btn" value="' + displayRecords[i].id + '">Delete</button></td></tr>');
            $('#container').append(tr);*/
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
    $('#container').on('click', '#tpcbtn', function(){
        var topicname = $(this).val();
        sessionStorage.setItem("topicname", topicname);
        window.location.replace("posts.php");

    })

    $('#container').on('click', '#delete-btn', function(){
        tpcid = $(this).val();
        $.ajax({
            type:"POST",
            url:"../Database/Autoload.php",
            data:{
                tpcid:tpcid,
                query:'DeleteTopics'
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


    $("#addtopic").click(function () {
        tpcname = $("#topic-name").val();
        if(tpcname===""){
            $("#emptytpcname").css('display','revert');
        }else {
        $.ajax({
            type:"POST",
            url:"../Database/Autoload.php",
            data: {
                tpcname: tpcname,
                query: 'CreateTopic'
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
