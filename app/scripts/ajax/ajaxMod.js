/**
 * Created by ericl_000 on 3/9/2016.
 */

(function getUsers() {

    //$('#dashboard-panels-users').click(function () {
    //        $(this).toggleClass('user-hover-active');
    //
    //        $(this).toggleClass('col-md-2');
    //        $(this).toggleClass('col-md-8');
    //        $('#user-group-wrapper').toggleClass('content-hide');
    //        $('#user-group-wrapper-base').toggleClass('content-hide');
    //});

    var active_users = {};
    active_users.fetchUsers = function () {

        var $user_active = $(".user_active");

        $.ajax({
            url: 'scripts/ajax_handlers/CS_Ajax.php',
            dataType: 'json',
            data: {method: 'fetch'},
            async: true,
            cache: false,
            success: function (data) {
                $user_active.empty();

                // for loop is technically faster than jquery $.each
                // for(i=0; i<data.length; i++){
                $.each(data, function (i, v) {
                    var is_on = (data[i].active === "1") ? "online" : "offline";
                    var content = '<div class="user-container">'
                        + '<div class="user-online">'
                        + '<div class="user-info">'
                        + '<p>' + data[i].fName + ' ' + data[i].lName + '</p>'
                        + '<a href="#">' + data[i].username + '</a>'
                        + '<p class=' + is_on + '>' + is_on + '</p>'
                        + '</div>'
                        + '</div>'
                        + '</div>';
                    $user_active.append(content);
                });
                $user_active.append("<div class='clearfix'></div>");
            }
        });
    };

    active_users.interval = setInterval(active_users.fetchUsers, 5000);
    active_users.fetchUsers();
});
