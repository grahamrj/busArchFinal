/**
 * Created by ericl_000 on 3/29/2016.
 */
$(function () {


    //
    var incomingEvent = {
        voteActive: false
    };

    var docObject = {
        body: $('body'),
        prev_page: 'main_content.php'
    };

    var active_users = {
        user_group_array: []
    };




    function getAssocUsers(data) {
        var xhr, getTemp;

        getTemp = function () {
            if (xhr && xhr.readyState != 4) {
                xhr.abort();
            }

            xhr = $.ajax({
                url: 'scripts/ajax_handlers/CS_Ajax.php',
                dataType: 'json',
                data: {method: 'fetch'},
                success: function (data) {
                    $.each(data, function (i, v) {
                        var is_on = (data[i].active === "1") ? 1 : 0;
                        var content = '<div class="user-container">'
                            + '<div class="user-online">'
                            + '<div class="user-info">'
                            + '<p>' + data[i].fName + ' ' + data[i].lName + '</p>'
                            + '<a href="#">' + data[i].username + '</a>'
                            + '<p class=' + is_on + '>' + is_on + '</p>'
                            + '</div>'
                            + '</div>'
                            + '</div>';

                        // append is DOM manipulation... as a heads up.
                        $user_active.append(content);
                    });
                }
            });
        }
    }

    function hasTimer() {
        // for testing purposes
        return true;
    }

    function timer(user, limit, syncTime) {
        if (user == active_users.currentUser()) {
            // send an alert ... popup... something
        }

    }



    function votingListener()
    {
        var xhr;

       incomingEvent.polling = function () {

           if (xhr && xhr.readyState != 4) {
               xhr.abort();
           }

           xhr = $.ajax({
               url: 'scripts/ajax_handlers/CS_Ajax.php',
               dataType: 'json',
               data: {method: 'fetch'},
               cache: false,
               success: function (data) {
                   $user_active.empty();
                   $.each(data, function (i, v) {
                       var is_on = (data[i].IsActive === "1") ? "online" : "offline";
                       var content = '<div class="user-container">'
                           + '<div class="user-online">'
                           + '<div class="user-info">'
                           + '<p>' + data[i].FName + ' ' + data[i].LName + '</p>'
                           + '<a href="#">' + data[i].UserName + '</a>'
                           + '<p class=' + is_on + '>' + is_on + '</p>'
                           + '</div>'
                           + '</div>'
                           + '</div>';

                       // append is DOM manipulation... as a heads up.
                       $user_active.append(content);
                   });

                   // After jQuery $.each, append a clearfix... otherwise the '.user_active' container
                   // will collapse.  Cannot insert into document before, as it must be the last child
                   // of the container.
                   $user_active.append("<div class='clearfix'></div>");
               }
           });

       }
    }






    // Look for active user panel menu - if exists set interval and run ajax to populate
    // -- if not, don't do anything.  Hint getElementBy'XxX'() returns a node list.  To
    // check if an element with a specific ID or CLASS exists, check the length of the returned
    // list.
    function toggleFetchUsers(/*data*/) {
        var xhr, $user_active;

        //if (data == true) {

            // Declare active_users 'fetchUsers' function.  Check if xhr object is ready; If not, abort.  If xhr ready,
            // set xhr = jquery ajax request, and append content to emptied '.user_active' container.
            active_users.fetchUsers = function () {

                if (xhr && xhr.readyState != 4) {
                    xhr.abort();
                }

                $user_active = $(".user_active");

                xhr = $.ajax({
                    url: 'scripts/ajax_handlers/CS_Ajax.php',
                    dataType: 'json',
                    data: {method: 'fetch'},
                    cache: false,
                    success: function (data) {
                        $user_active.empty();
                        $.each(data, function (i, v) {
                            var is_on = (data[i].IsActive === "1") ? "online" : "offline";
                            var content = '<div class="col-md-3">'
                                + '<div class="thumbnail">'
                                + '<img src="' + getPicture(data[i]) + '"/>'
                                + '<div class="caption" style="text-align: center">'
                                + '<h3>' + data[i].FName + ' ' + data[i].LName + '</h3>'
                                + '<a href="#">' + data[i].UserName + '</a>'
                                + '<p class=' + is_on + '>' + is_on + '</p>'
                                + '<p><a href="#" class="btn btn-primary">Vote</a></p>'
                                + '</div>'
                                + '</div>'
                                + '</div>';

                            // append is DOM manipulation... as a heads up.
                            $user_active.append(content);
                        });

                        // After jQuery $.each, append a clearfix... otherwise the '.user_active' container
                        // will collapse.  Cannot insert into document before, as it must be the last child
                        // of the container.
                        $user_active.append("<div class='clearfix'></div>");
                    }
                });
            };
            // Set active user interval, passing fetch function and milliseconds to setInterval().
            // Since fetch function won't execute for x milliseconds, call function normally one time.
            //active_users.interval = setInterval(active_users.fetchUsers, 5000);
            active_users.fetchUsers();
        //} else {
        //    clearInterval(active_users.interval);
        //}
    }

    //Don't use this function as is. Instead grab from database
    function getPicture(data)
    {
        $picture = "images/";
        if(data.FName == "David")
        {
            $picture = $picture + "david.png";
        }
        else if (data.FName == "Eric")
        {
            $picture = $picture + "eric.png";
        }
        else if (data.FName == "Graham")
        {
            $picture = $picture + "graham.png";
        }
        else
        {
            $picture = $picture + "defaultPic.png";
        }
        return $picture;
    }

// **********************************************    EVENTS    *********************************************************

    // Fires every time a routing link is clicked.  Event either fires or halts ajax interval
    // Reevaluate for efficiency... could separate that ajax start/stop with delegate
    docObject.body.on("click", ".route-link", function () {
        var c_page = $(this).attr('data-route');

        if (c_page != docObject.prev_page) {
            var $trgt = "components/pages/" + $(this).attr('data-route');

            $('#main-content').empty().load($trgt, function () {
                if ($('.user_active').length >= 1) {
                    toggleFetchUsers(/*true*/);
                } else {
                    toggleFetchUsers(/*false*/);
                }
                docObject.prev_page = c_page;
            });
        }
    });



    // Alternate Ajax Event for users bar
    docObject.body.on('click', 'i.glyphicon-refresh', function () {
        toggleFetchUsers()
    });



// ************************************************ Run once on ready *****************************************************
    toggleFetchUsers(true);
    votingListener(true);
});