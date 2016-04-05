<div class="row">
    <div class="container" id="infoContainer">
        <div class="col-md-4">
            <div class="panel panel-primary"  id="infoPanel">
                <div class="panel-body">
                    <?php //add the progress graph here... calls display_progress_graph.php located in procedures
                    include('procedures/display_progress_graph.php');
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary" id="infoPanel">
                <div class="panel-body">
                    <?php //add Current Discussion/Motion... calls display_current_motion.php located in procedures
                    include("procedures/display_current_motion.php")
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary" id="infoPanel">
                <div class="panel-body">
                    <?php //add previous and next discussion... calls the display_past_upcoming_motion.php in procedures
                    include('procedures/display_past_upcoming_motion.php')
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>