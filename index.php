<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<!-- templatemo 417 grill -->
<!-- 
Grill Template 
http://www.templatemo.com/preview/templatemo_417_grill 
-->
    <head>
        <meta charset="utf-8">
        <title>ReadSabuy - Style chill chill!</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-social.css">
        
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/templatemo_style.css">
        <link rel="stylesheet" href="css/templatemo_misc.css">
        <link rel="stylesheet" href="css/flexslider.css">
        <link rel="stylesheet" href="css/testimonails-slider.css">
        <link rel="stylesheet" href="css/font-awesome-animation.css">
        <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
    </head>
    <body id="page-top" class="index">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

            
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#page-top">ReadSabuy</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="hidden">
                                <a href="index.html"></a>
                            </li>
                            <li class="page-scroll">
                                <a href="index.html">หน้าแรก</a>
                            </li>
                            <li class="page-scroll">
                                <a href="products.html">สินค้า</a>
                            </li>
                            <li class="page-scroll">
                                <a href="about-us.html">เกี่ยวกับ</a>
                            </li>
                            <li class="page-scroll">
                                <a href="contact-us.html">ติดต่อเรา</a>
                            </li>
							<li class="page-scroll"> 
                                <a id="signin-button" data-toggle="modal" data-target="#myModal">เข้าสู่ระบบ</a>
                            </li>
                            <li>
                                <div class="search-box">
                                    <form name="search_form" method="get" class="search_form">
                                        <input id="search" type="search" placeholder="search" onkeyup="showResult(this.value)" style="display:none"/>
                                        <div id="livesearch"></div>   
                                    </form>
                                </div>
                            </li>
                            <li>
                                <a  id="search-button"><i class="fa fa-lg fa-search"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>

            <div id="heading">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-content">
                                <h2>Quiz</h2>
                                <span>Home /<a href="AllQuiz.html">All Quiz</a>/ <a href="Game_v2.html">Quiz</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                require_once('libs/Facebook/FacebookSession.php');
                require_once('libs/Facebook/FacebookRequest.php');
                require_once('libs/Facebook/FacebookResponse.php');
                require_once('libs/Facebook/FacebookSDKException.php');
                require_once('libs/Facebook/FacebookRequestException.php');
                require_once('libs/Facebook/FacebookRedirectLoginHelper.php');
                require_once('libs/Facebook/FacebookAuthorizationException.php');
                require_once('libs/Facebook/GraphObject.php');
                require_once('libs/Facebook/GraphUser.php');
                require_once('libs/Facebook/GraphSessionInfo.php');
                require_once('libs/Facebook/Entities/AccessToken.php');
                require_once('libs/Facebook/HttpClients/FacebookCurl.php');
                require_once('libs/Facebook/HttpClients/FacebookHttpable.php');
                require_once('libs/Facebook/HttpClients/FacebookCurlHttpClient.php');

                use Facebook\FacebookSession;
                use Facebook\FacebookRequest;
                use Facebook\FacebookResponse;
                use Facebook\FacebookSDKException;
                use Facebook\FacebookRequestException;
                use Facebook\FacebookRedirectLoginHelper;
                use Facebook\FacebookAuthorizationException;
                use Facebook\GraphObject;
                use Facebook\GraphUser;
                use Facebook\GraphSessionInfo;
                use Facebook\FacebookCurl;
                use Facebook\FacebookHttpable;
                use Facebook\FacebookCurlHttpClient;

                //1.Stat Session
                session_start();
                //2.Use app id,secret and redirect url
                $app_id = '902328696492143';
                $app_secret = 'c37448d82de50ad02a269982f7a4df60';
                $redirect_url='http://readsabuy.esy.es/';
     
                //3.Initialize application, create helper object and get fb sess
                FacebookSession::setDefaultApplication($app_id,$app_secret);
                $helper = new FacebookRedirectLoginHelper($redirect_url);
                $sess = $helper->getSessionFromRedirect();

                //4. if fb sess exists echo name 
                if(isset($sess)){
                    //create request object,execute and capture response
                    $request = new FacebookRequest($sess, 'GET', '/me');
                    // from response get graph object
                    $response = $request->execute();
                    $graph = $response->getGraphObject(GraphUser::className());
                    // use graph object methods to get user details
                    $name= $graph->getName();
                    echo "hi $name";
                }else{
                    //else echo login
                    echo '<a href='.$helper->getLoginUrl().'>Login with facebook</a>';
                }
            ?>


            <div id="product-post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                                <h2>คุณกำลังลุ้นใครให้รักกัน</h2>                                
                                <button type="button" class="btn btn-primary" onclick="waitingDialog.show();setTimeout(function () {waitingDialog.hide();}, 3000);">Show dialog</button>
                                <img src="images/holdHand.jpg" alt="" style="padding-top:10px;" draggable="false">                                
                            </div>
                        </div>
                    </div>
                    <div id="contact-us">
                        <div class="container">
                            
                                <div class="row">
                                    
                                    <div class="col-md-2 col-md-offset-5">
                                        <a class="btn btn-block btn-social btn-facebook">
                                            <i class="fa fa-facebook"></i> เแชร์
                                        </a> 
                                    </div>;
                                </div>

                           
                        </div>
                    </div>   
                </div>
            </div>
			<footer>
                <div class="container">
                    <div class="top-footer">
                        <div class="row">                    
                            <div class="col-md-5">
                                <div class="social-bottom">
                                    <br><span>Follow us:</span>
                                    <ul>
                                        <li><a href="#" class="fa fa-facebook"></a></li>
                                        <li><a href="#" class="fa fa-twitter"></a></li>
                                        <li><a href="#" class="fa fa-rss"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-offset-2 col-md-5">
                                <div class="more-info">
                                    <br><h4 class="footer-title">More info</h4>
                                    <p>Sed dignissim, diam id molestie faucibus, purus nisl pretium quam, in pulvinar velit massa id elit.</p>
                                    <ul>
                                        <li><i class="fa fa-phone"></i>010-020-0340</li>
                                        <li><i class="fa fa-globe"></i>123 Dagon Studio, Yakin Street, Digital Estate</li>
                                        <li><i class="fa fa-envelope"></i><a href="#">info@company.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>             
                </div>
            </footer>
           
			<!-- Modal -->
            <div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">เข้าสู่ระบบ</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <input id="username" type="text" placeholder="Username or Email" style="margin-top:0;">
                                </div>
                                <div class="row">
                                    <input id="password" type="password" placeholder="Password" style="margin-top:5px;">
                                </div>
                                <div class="row">
                                    <div class="col-md-1 col-sm-1 col-xs-1" style="padding:0;">
                                        <input id="keepUser" type="checkbox"/>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-7" style="padding:0;">
                                        <label for="keepUser" class="labellogin">จำฉันไว้ในระบบ</label>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-4" style="padding:0;">
                                        <label class="labellogin">ลืมรหัสผ่าน</label>|<label class="labellogin">สมัครสมาชิก</label>
                                    </div>
                                </div>
                                <div class="row">                                    
                                    <button type="button" class="btn btn-primary btn-md btn-block">เข้าสู่ระบบ</button>                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-2 col-md-offset-5 col-sm-2 col-sm-offset-5 col-xs-2 col-xs-offset-5">
                                        <label style="margin-top: 5px;">Or</label>
                                    </div>
                                </div>
                                <div class="row">                                    
                                    <a class="btn btn-block btn-social btn-facebook">
                                        <i class="fa fa-facebook"></i> เข้าสู่ระบบด้วย Facebook
                                    </a>                                   
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>



            
        <script src="js/vendor/jquery-1.11.0.min.js"></script>    
        <script src="js/vendor/jquery.gmap3.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.js"></script>

        <script src="js/classie.js"></script>
        <script src="js/cbpAnimatedHeader.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/freelancer.js"></script>
        <script src="js/Waitingfordialog.js"></script>

    </body>
</html>