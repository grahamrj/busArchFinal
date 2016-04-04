<!--  JavaScript Sources -- jQuery MUST come first -> for bootstrap  -->
<script src="https://code.jquery.com/jquery-1.12.2.min.js"
        integrity="sha256-lZFHibXzMHo3GGeehn1hudTAP3Sc0uKXBXAzHX1sjtk="
        crossorigin="anonymous"></script>

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"
        integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw="
        crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="startbootstrap/bower_components/metisMenu/dist/metisMenu.min.js"></script>
<script src="startbootstrap/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="startbootstrap/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="startbootstrap/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
<script src="startbootstrap/dist/js/sb-admin-2.js"></script>
<script src="scripts/event_handlers/dashboard_events.js"></script>
<script src="scripts/ajax/ajaxMod.js"></script>
<script src="scripts/event_handlers/global_event.js"></script>

<!-- Latest compiled and minified JavaScript -->
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>-->

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    });
</script>