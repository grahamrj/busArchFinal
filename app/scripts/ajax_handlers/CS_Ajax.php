<?php
    /**
     *  Handler for fetching and displaying council members -- active or not
     *
     *  Data is echoed from this handler and used by $.ajax.success() method
     *  within ../event_handlers/dashboard_events.js
     */

    $ds = DIRECTORY_SEPARATOR;
    require_once(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . 'core' . $ds . 'init.php');

    if (isset($_GET['method']) === true) {
        $result = $db->table('useracct')->getCouncilMembers($auth->getUserInfo('CouncilID'));
        echo $result;
    } else {
        echo 'This is how you get ants';
    }