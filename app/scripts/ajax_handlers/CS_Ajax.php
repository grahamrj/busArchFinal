<?php
    /**
     * Created by PhpStorm.
     * User: ericl_000
     * Date: 3/8/2016
     * Time: 2:57 PM
     */
    $ds = DIRECTORY_SEPARATOR;
require_once(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . 'core' . $ds . 'init.php');

if(isset($_GET['method'])===true) {
    $result = $db->getCouncilMembers($auth->getUserInfo('council_id'));
    echo $result;
}else{
    echo 'something is fucked';
}