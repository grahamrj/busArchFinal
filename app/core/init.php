<?php
    /**
     *  init.php is required and built on every page
     *  Ajax will make resetting the time a little
     *  Interesting...ADVISE PLEASE
     */
    session_start();

    $app = dirname(__FILE__);

// Require class files -- Use absolute path, hence dirname(__FILE__) which is
// equivalent to __DIR__, but older, and will work on more servers -> in theory.
    require_once("${app}/classes/ErrorHandler.php");
    require_once("${app}/classes/Validator.php");
    require_once("${app}/classes/Hash.php");
    require_once("${app}/classes/Database.php");
    require_once("${app}/classes/Authorize.php");
    require_once("${app}/classes/CommCouncil.php");

// Instantiate classes
    $db = new Database;
    $eHandle = new ErrorHandler;
    $hash = new Hash;
    $auth = new Authorize($db, $hash);
    $commRT = new CommCouncil($db);

// Set current time to be used in evaluating session timeout/log off
    $now = time();

    if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
        if ($auth->check()) {
            $auth->signout();
        }

        // Do all the things-> unset the session, destroy it with fire, and from the ashes
        // begin anew...
        session_unset();
        session_destroy();
        session_start();
    }

// either new or old, it should live at most for x seconds
    $_SESSION['discard_after'] = $now + 0500;


