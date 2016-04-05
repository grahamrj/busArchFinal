<?php
    $ds = DIRECTORY_SEPARATOR;
    require(dirname(__FILE__) . $ds . 'app' . $ds . 'core' . $ds . 'init.php');

    if ($auth->check()) {
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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="app/components/css/cs_styles.css" rel="stylesheet"/>
</head>

<body>

<!--  Navigation include from public root level 'components' -->
<?php include(dirname(__FILE__) . $ds . 'app' . $ds . 'components' . $ds . 'nav.php'); ?>

<div class="landing-main container">
    <div class="row">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1>Welcome!</h1>
                    <blockquote>
                        Stuff and stuff
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <!--       Sign Up Form         -->
                    <h1>Join Us!</h1>
                    <div class="row">
                        <form id="form-signup" class="form-horizontal" action="app/scripts/php/sign_up.php"
                              method="post">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Full Name:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="FName" name="FName" placeholder="First">
                                    <input type="text" id="LName" name="LName" placeholder="Last">
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Location:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="City" name="City" placeholder="City (Council Location)">
                                    <input type="text" id="State" name="State" placeholder="State" maxlength="2" min="2">
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Email:</label>
                                <div class="col-sm-10">
                                    <input type="email" id="EMail" name="EMail" placeholder="e.g. Johnny@Appleseed.com">
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Phone:</label>
                                <div class="col-sm-10">
                                    <input type="tel" id="Phone" name="Phone" placeholder="e.g. 555-555-5555">
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Login Info:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="UserName" name="UserName" placeholder="Username">
                                    <input type="password" id="AcctPass" name="AcctPass" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="UserRole" class="col-sm-2 control-label">Select User Role:</label>
                                <div class="col-sm-10">
                                    <select id="UserRole" name="UserRole">
                                        <option value="2">Administrator</option>
                                        <option value="3">Council Chair</option>
                                        <option value="4">Council Member (Standard)</option>
                                        <option value="5">Council Clerk</option>
                                        <option value="6">Public</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="AdminFlag" class="col-sm-2 control-label">Will this account need
                                    administrator privileges?</label>
                                <div class="col-sm-10">
                                    <select id="AdminFlag" name="AdminFlag">
                                        <option value="1">Yes, I'm important</option>
                                        <option value="0">Meh, Don't need it</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="CouncilID" class="col-sm-2 control-label">Council ID:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="CouncilID" name="CouncilID" min="10000" maxlength="5"
                                           placeholder="e.g. 10001">
                                    <button type="button" id="getCouncilCode">Find City Code</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                    <button type="reset" class="btn btn-danger">Clear Form</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--  JavaScript Sources -- jQuery MUST come first -> for bootstrap  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="app/scripts/event_handlers/global_event.js"></script>
</body>
</html>