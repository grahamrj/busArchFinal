<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv-"content-type" content-"text/html;>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta about="Created by David Dietz | Eric Lorentzen | Graham Rico Johnson">
        <title>Program 1</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"  />
    </head>
    <body>
    <?php include 'nav.php'; ?>
        <div class="container" style="margin: 80px auto;">
            <div class="jumbotron">
                <h1>FAQ</h1>
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id='dynamicTable' class='table table-striped table-bordered' cellspacing='0' width='100%' style="font-size: 20px;">
                            <tr>
                                <th>What does your product do?</th>
                                <th>Is my data/information secure?</th>
                                <th>Can the public use the program</th>
                            </tr>
                            <tr>
                                <td>Our application helps facilitate city council meetings</td>
                                <td>Yes we use state of the are encryption and make it a priority that your information is secure</td>
                                <td>Yes the public can access the application by signing up for a free account or using a default account. They will not have access to classified documents.</td>
                            </tr>
                        </table>
                    </div><!--table-responsive class-->
            </div> <!--end of jumbotron-->
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>