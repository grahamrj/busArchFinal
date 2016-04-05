<?php
    /**
     *
     */

    $ds = DIRECTORY_SEPARATOR;
    require_once(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . 'core' . $ds . 'init.php');

    if (isset($_GET['method']) === true && isset($_GET['city_search'])) {
        if ($_GET['method'] === 'fetch') {

            echo $commRT->getCouncilID($_GET['city_search']);

        } else if($_GET['method'] === 'throw') {

        }
    } else {
        echo 'This is how you get ants';
    }