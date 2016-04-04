<?php
    $ds = DIRECTORY_SEPARATOR;
    require(dirname(__FILE__) . $ds . 'app' . $ds . 'core' . $ds . 'init.php');

    if($auth->check()){
        header("Location: app");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <!--  Meta tags -- MUST GO FIRST!  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Council Solutions</title>

    <!--  CSS Libraries: boostrap 3.3.6 |   -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"  />
    <link href="app/components/css/cs_styles.css" rel="stylesheet"/>
</head>

<body>

<!--  Navigation include from public root level 'components' -->
<?php include(dirname(__FILE__) . $ds . 'app' . $ds . 'components' . $ds . 'nav.php'); ?>



<!--  JavaScript Sources -- jQuery MUST come first -> for bootstrap  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>