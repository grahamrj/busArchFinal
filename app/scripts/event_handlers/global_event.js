/**
 * Created by ericl_000 on 3/28/2016.
 */

$(function () {

    function fetchCouncilID() {
        var xhr;


        // Declare active_users 'fetchUsers' function.  Check if xhr object is ready; If not, abort.  If xhr ready,
        // set xhr = jquery ajax request, and append content to emptied '.user_active' container.
        var getCityCode = function () {

            if (xhr && xhr.readyState != 4) {
                jxhr.abort();
            }

            xhr = $.ajax({
                url: 'app/scripts/ajax_handlers/fetch_council_id.php',
                data: { method: 'fetch', city_search: $('#City').val().toString() },
                dataType: 'json',
                cache: false,
                success: function (data) {
                    $('#CouncilID').val( data.city_id );
                    //alert("Your city council id is " + data.city_id);
                }
            });
        };
        getCityCode();
    }


    // EVENTS

    $('body').on('click','#getCouncilCode', function () {
        fetchCouncilID();
    });
});
