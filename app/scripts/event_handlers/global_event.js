/**
 * Created by ericl_000 on 3/28/2016.
 */

$(function () {
    var $trgt;
    $("body").on("click",".route-link", function() {
        $trgt = "components/" + $(this).attr('data-route');
        $('#main-content').empty();
        $('#main-content').load($trgt);
    });
});