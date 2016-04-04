<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta about="Created by David Dietz | Eric Lorentzen | Graham Rico Johnson">
    <title>Packages</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"  />
    <style>
        <!--fixes firefox fieldset styling issues-->
        @-moz-document url-prefix() {
        fieldset { display: table-cell; }
        }
    </style>
</head>
<body>
<?php include 'nav.php'; ?>
    <div class="container" style="margin: 80px auto;">
        <div class="jumbotron">
            <h1>Packages</h1>
                <div class="table-responsive" data-pattern="priority-columns">
                    <table id='dynamicTable' class='table table-striped table-bordered' cellspacing='0' width='100%' style="font-size: 20px;">
                        <tr>
                            <th>Package Level</th>
                            <th>Implentation</th>
                            <th>Price</th>
                        </tr>
                        <tr>
                            <td>Basic</td>
                            <td>Just Download It and set it up yourself</td>
                            <td>$49.99/per month per account</td>
                        </tr>
                        <tr>
                            <td>Custom</td>
                            <td>We come in an set it all up</td>
                            <td>Starting at $5000</td>
                        </tr>
                    </table>
                </div><!--table-responsive class-->
        </div> <!--end of jumbotron-->
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dynamicTable').DataTable();
    } );
</script>
<script>
    //function provided by Joe Garrepy @ JoeGarrepy.com
    //function delRow()
    //    {
    //    var current = window.event.srcElement;
    //    //here we will delete the line
    //    while ( (current = current.parentElement)  && current.tagName !="TR");
    //        current.parentElement.removeChild(current);
    //    }
</script>
<script>
    $(function() {
        $('.table-responsive').responsiveTable({options});
    });
</script>
<script type='text/javascript'>
    function delete_user( id ){

        var answer = confirm('Are you sure?');
        if (answer){
            // if user clicked ok,
            // pass the id to delete.php and execute the delete query
         window.location = 'delete.php?id=' + id;
        }
    }
</script>
</body>
</html>
