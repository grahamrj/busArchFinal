<?php
/**
 * Created By: "David Dietz"
 * Date: 3/26/2016
 * Time: 10:22 PM
 */

//If council meeting is in session and the agenda is approved then display the progress graph.
//call calculateProgress function that checks how much of the agenda is complete.
echo"<div class='h1'>Goal Progress</div>";
?>
<div class="progress" style="margin: 35px 20px 20px 20px; border: dotted #2b2b2b; border-width: thin; background-color: #c8e5bc">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
        40% Complete
    </div>
</div>
