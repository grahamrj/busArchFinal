<!-- *******************************************************************************************************************
  -- *******************************************************************************************************************
  --        MAIN NAV BAR
  --
  -- *******************************************************************************************************************
  -- *******************************************************************************************************************
  -->


<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Council Solutions</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>

<!--            <form class="navbar-form navbar-left" role="search">-->
<!--                <div class="form-group">-->
<!--                    <input type="text" class="form-control" placeholder="Search">-->
<!--                </div>-->
<!--                <button type="submit" class="btn btn-default">Submit</button>-->
<!--            </form>-->


                <!--     NAV-RIGHT-SIDE - Display either login or user info      -->
                <ul class="nav navbar-nav navbar-right">


                    <!--   BEGIN IF/ELSE:   Check $auth (required file variable have global scope) to see if user session is set.
                      --   If session is set - display user instead of login options
                      --   If session is NOT set - display login options   -->
                    <?php if ($auth->check()): ?>
                        <li class="dropdown cd-drop">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><?php echo $auth->getUserInfo('usr_userName'); ?></b></a>
                            <ul id="login-dp" class="dropdown-menu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <!--    Display user first and last name with username in parentheses     -->
                                            <b>Welcome <?php echo ucfirst($auth->getUserInfo('usr_fName')), " ",  ucfirst($auth->getUserInfo('usr_lName')), "! <br>(<i>", $auth->getUserInfo('usr_userName'), "</i>)"; ?></b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="scripts/php/sign_out.php">Sign Out</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>


                    <!--   BEGIN ELSE   -->
                    <?php else: ?>
                    <li><p class="navbar-text">Already have an account?</p></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">


                                        <!--         Login Form  ---  Path is for CouncilSolutions dir index.php         -->
                                        <form class="form"  method="post" action="app/scripts/php/sign_in.php" id="login-nav">
                                            <div class="form-group">
                                                <label for="usr_userName">Username:</label>
                                                <input type="text" class="form-control"  name="usr_userName" placeholder="User Name">
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="usr_passwd">Password:</label>
                                                <input type="password" class="form-control" name="usr_passwd" placeholder="Password">
                                                <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                                            </div>
                                            <input type="submit" value="submit">
                                        </form>

                                    </div>
                                    <div class="bottom text-center">
                                        New here ? <a href="#join-us"><b>Join Us</b></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <?php endif ?> <!-- END NAV LOGIN IF/ELSE -->
                </ul>
        </div>
    </div>
</nav>