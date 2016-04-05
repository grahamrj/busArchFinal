<?php
    $ds = DIRECTORY_SEPARATOR;
    require_once(dirname(__FILE__) . $ds . 'core' . $ds . 'init.php');

    if(!($auth->check())){
        header('Location: ../');
    }
    
    define('COMP_DIR', dirname(__FILE__) . $ds . 'components' . $ds);
?>

<!DOCTYPE html>
<html>
<head>
    <!--  Meta tags -- MUST GO FIRST!  -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge"
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo ucfirst($auth->getUserInfo('usr_fName')) , 's Dashboard'; ?></title>

    <!--  Scripts and Links  -->
    <?php /** @noinspection PhpIncludeInspection */ include_once(COMP_DIR . 'head.php'); ?>

</head>

<body>
<!-- DEV COMMENT
     ...once upon a time, there was a very lazy web app template. This template was only kind-of a template...
     it did its job just fine and was accepted by more people than one would expect...despite the
     fact that it was hack-ee as .... .

       The end.
  -->
<div id="wrapper" class="container-fluid smooth-load">
    <?php include_once(COMP_DIR . 'nav.php'); ?>
    <?php include_once(COMP_DIR . 'nav-left.php'); ?>

    <!--  Dashboard Construction... Its coming along  -->
    <div id="main-content" class="col-md-10 col-xs-10 col-md-offset-2 col-xs-offset-2" data-content-level="0">
        <?php include_once(COMP_DIR . 'pages' . $ds . 'main_content.php'); ?>
        <div class="clearfix"></div>
    </div>
</div>

    <!--
      --  Include Scripts
      -->
    <?php /** @noinspection PhpIncludeInspection */ include(COMP_DIR . 'foot.php'); ?>
    <script>
        $(function () {

        });
    </script>
</body>
</html>
