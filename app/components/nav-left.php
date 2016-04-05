<!--
  --        LEFT ALIGNED NAV BAR (sidebar menu)
  --
  -->


<div id="sidebar" class="col-md-2 col-xs-2 primary" style="left: 0; bottom: 0; top: 50px;">
    <div class="container-fluid" style="height: 150px;">
        <div class="row">
            <div class="col-sm-12">
                <div
                    style="height: 100px; width: 100px; margin: 0 auto; border: solid thin white; background: #eee; border-radius: 100%;"></div>
                <p style="text-align: center; padding: 5px 5px 5px 5px; color: #fff;"><?php echo ucfirst($auth->getUserInfo('FName')) . ' ' . ucfirst($auth->getUserInfo('LName')); ?></p>
            </div>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item"><a class="route-link" data-route-level="0" data-route="main_content.php">Main</a>
        </li>
        <li class="list-group-item"><a class="route-link" data-route-level="1" data-route="/">Sign Up</a></li>
        <li class="list-group-item"><a class="route-link" data-route-level="1" data-route="Test.php">Test</a></li>
        <li class="list-group-item"><a class="route-link" data-route-level="1" data-route="About.php">About</a></li>
        <li class="list-group-item"><a class="route-link" data-route-level="1" data-route="Services.php">Services</a></li>
        <li class="list-group-item"><a class="route-link" data-route-level="1" data-route="Packages.php">Packages</a></li>
        <li class="list-group-item"><a class="route-link" data-route-level="1" data-route="FAQ.php">FAQ</a></li>
    </ul>

    <div id="side-user-view">

    </div>

    <div id="sidebar-logout" class="container-fluid">
        <div class="row">
            <a class="sidebar-btn" href="scripts/php/sign_out.php">
                <div class="col-sm-12">
                    <span class="glyphicon glyphicon-log-out sidebar-btn-txt"></span>
                    <div class="sidebar-btn-txt">Log Out</div>
                </div>
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
