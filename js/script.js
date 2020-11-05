$(document).ready(function () {
    $(document).on('click','#submit_btn',function () {
        var name = $('#name').val();
        var comment = $('#comment').val();
        $.ajax({
            type: "POST",
            url: "server.php",
            data:{
                'save': 1,
                'name': name,
                'comment': comment
            },
            success: function (response) {
                $('#name').val('');
                $('#comment').val('');
                $('#display_area').append(response);
                console.log(response);
            }
        });
    });

    $(document).on('click','.delete',function () {
        var id = $(this).data('id');
        var clicked_btn = $(this);
        $.ajax({
            type:"POST",
            url: "server.php",
            data: {
                'delete': 1,
                'id': id
            },
            success: function (response) {
                console.log(response);
                clicked_btn.parent().remove();
            }
        });
    });

    var edit_id;
    var edit_comment;
    $(document).on('click','.edit',function () {
        edit_id = $(this).data('id');
        edit_comment = $(this).parent();
        var name = $(this).siblings('.display_name').text();
        var comment = $(this).siblings('.comment_text').text();
        $('#name').val(name);
        $('#comment').val(comment);
        $('#submit_btn').hide();
        $('#update_btn').show();
    });

    $(document).on('click','#update_btn',function () {
        var id = edit_id;
        var name = $('#name').val();
        var comment = $('#comment').val();
       $.ajax({
           type: "POST",
           url: "server.php",
           data:{
               'update':1,
               'id':id,
               'name':name,
               'comment':comment
           },
           success:function (response) {
               edit_comment.replaceWith(response);
               $('#name').val('');
               $('#comment').val('');
           }
       });
    });
})