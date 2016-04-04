<!DOCTYPE html >
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv-"content-type" content-"text/html;" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta about="Created by David Dietz | Eric Lorentzen | Graham Rico Johnson">
        <title>Services</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"  />
        <style>
            body, body.media {
                background: #111;
                overflow: auto !important;
            }
            div.col-sm-12.header-img {
                margin: 0;
                padding:0;
                /* image credit: url - http://citywallpaperhd.com/photo/21-wonderful-view-of-minneapolis-on-your-desktop.html */
                background: url("images/mpls_background.jpg");
                width: 100%;
                height: 600px;
            }
            .header-img {
                opacity: 1;
                margin: 0;

            }
            .jumbotron.trans-back{
                padding-top: 250px;
                text-align: center;
                background: rgba(0,0,0,.4);
                color: rgba(255,255,255,1);
                height:600px !important;
                width: 100%;
            }
            .jumbotron.trans-back h1 {
                font-size: 8em;
            }
            b.chaos{
                color: lightblue;
                font-size:1.1em;
            }
            div.container.diff {
                width: 100% !important;
                padding:0;
                margin:0;
            }
            div.container-fluid.main-wrap {
                /* image credit: url - http://raineugene.org/site/content/uploads/2014/12/cluster-mapping.jpg*/
                background: url("images/cluster-mapping.jpg");
                z-index: 1;
                /*position: fixed;*/
                width: 100%;
                margin: 0;
                padding: 0;
            }
            div.separate-none {
                content: "";
                background: #111;
                height: 80px;
                width: 100%;
            }
            div.separate {
                content: "";
                height: 200px;
                width: 100%;
            }
            .match-back {
                background: #111111;
                color: #eee;
                margin: 0;
                padding: 40px 40px 40px 40px;
            }
            .small {
                width: 20%;
            }
            .service-list{
                list-style: circle;
            }
            .service-list li {
                font-style: italic;

            }
            .row {
                margin: 0;
            }
            .body-content {
                width: 90%;
                margin-top: 50px;
            }
            .list-lg {
                font-size: 2em;
            }
            .right-image {
                height: 600px;
                width: 600px;
                border-radius: 300px;
                background: #444;
                overflow: hidden;
                text-align: center;
                float: right;

            }
            img {
                position: relative;
                right: 520px;
                bottom: 100px;
                zoom: .9;
            }
        </style>
    </head>
    <body>
    <?php include 'nav.php'; ?>
        <div class="container-fluid main-wrap">
            <div class="row">
                <div class="col-sm-12 header-img">
                    <div class="container diff">
                        <div class="jumbotron trans-back">
                            <h1>Our Services</h1>
                            <p><i>Council Solutions can bring order and efficiency to even the most <b class="chaos">chaotic</b> council meatings</i></p>
                        </div>
                    </div> <!--end of container class-->
                </div> <!--end of container class-->
            </div>
            <div class="row">
                <div class="separate-none"></div>
            </div>
            <div class="row">
                <div class="container-fluid body-content">
                    <div class="jumbotron match-back clearfix">
                        <h2>An Application Built For <i>Efficiency</i></h2>
                        <p><i>Our Application is built from the ground up to suit the needs of city-level legislative bodies.<br>
                                Developed with the oversite of expert parliamentarians, Council Solutions can bring efficiency to the key decision-makers,<br>
                            with features like:</i></p>
                        <ul class="service-list">
                            <li class="list-lg">Real-time polling</li>
                            <li class="list-lg">Minutes recording and export</li>
                            <li class="list-lg">Speaking Timers</li>
                            <li class="list-lg">Customized views for Chair, Admin, Counselors, and Clerks</li>
                            <li class="list-lg">In-App Motion and Agenda editing</li>
                            <li class="list-lg">Motion-specific document linking</li>
                        </ul>
<!--                        <div class="right-image">-->
<!--                <!--    image credit : url - http://datos.gob.es/sites/default/files/datos_abiertos_sectoriales.jpg    -->
<!--                            <img height="800" src="images/busness_technology.png" />-->
<!--                        </div>-->
                    </div>

                </div>
            </div>

        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>