<?php
session_start();

include_once("../set/setdb.php");
include_once("../set/verify_login.php");

if (isset($_SESSION["S_LOGIN"]) && !empty($_SESSION["S_LOGIN"])) {
	//echo "A";
	$array_s_login = $_SESSION["S_LOGIN"];
//var_dump($_SESSION);
	$errore = "";
	if (isset($line["error_msg"])) $errore = $line["error_msg"];
	
    if (Verify_Sess_Login($array_s_login, 1) && empty($errore)) {
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    
    <title>CanalBleu admin</title>
    <meta name="author" content="SuggeElson" />
    <meta name="description" content="Supr admin template - new premium responsive admin template. This template is designed to help you build the site administration without losing valuable time.Template contains all the important functions which must have one backend system.Build on great twitter boostrap framework" />
    <meta name="keywords" content="admin, admin template, admin theme, responsive, responsive admin, responsive admin template, responsive theme, themeforest, 960 grid system, grid, grid theme, liquid, masonry, jquery, administration, administration template, administration theme, mobile, touch , responsive layout, boostrap, twitter boostrap" />
    <meta name="application-name" content="Supr admin template" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Le styles -->
    <!-- Use new way for google web fonts 
    http://www.smashingmagazine.com/2012/07/11/avoiding-faux-weights-styles-google-web-fonts -->
    <!-- Headings -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' />  -->
    <!-- Text -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' /> --> 
    <!--[if lt IE 9]>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
    <![endif]-->

    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
    <link href="css/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css" />
    <link href="css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Plugin stylesheets -->
    <link href="plugins/qtip/jquery.qtip.css" rel="stylesheet" type="text/css" />
    <link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
    <link href="plugins/jpages/jPages.css" rel="stylesheet" type="text/css" />
    <link href="plugins/prettify/prettify.css" type="text/css" rel="stylesheet" />
    <link href="plugins/inputlimiter/jquery.inputlimiter.css" type="text/css" rel="stylesheet" />
    <link href="plugins/ibutton/jquery.ibutton.css" type="text/css" rel="stylesheet" />
    <link href="plugins/uniform/uniform.default.css" type="text/css" rel="stylesheet" />
    <link href="plugins/color-picker/color-picker.css" type="text/css" rel="stylesheet" />
    <link href="plugins/select/select2.css" type="text/css" rel="stylesheet" />
    <link href="plugins/validate/validate.css" type="text/css" rel="stylesheet" />
    <link href="plugins/pnotify/jquery.pnotify.default.css" type="text/css" rel="stylesheet" />
    <link href="plugins/pretty-photo/prettyPhoto.css" type="text/css" rel="stylesheet" />
    <link href="plugins/smartWizzard/smart_wizard.css" type="text/css" rel="stylesheet" />
    <link href="plugins/dataTables/jquery.dataTables.css" type="text/css" rel="stylesheet" />
    <link href="plugins/elfinder/elfinder.css" type="text/css" rel="stylesheet" />
    <link href="plugins/plupload/jquery.ui.plupload/css/jquery.ui.plupload.css" type="text/css" rel="stylesheet" />
    <link href="plugins/search/tipuesearch.css" type="text/css" rel="stylesheet" />

    <!-- Main stylesheets -->
    <link href="css/main.css" rel="stylesheet" type="text/css" /> 

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-57-precomposed.png" />
    
    <script type="text/javascript">
        //adding load class to body and hide page
        document.documentElement.className += 'loadstate';
    </script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
      
    <body>
    <!-- loading animation -->
    <div id="qLoverlay"></div>
    <div id="qLbar"></div>
    
    <div id="header">

        <div class="navbar">
            <div class="navbar-inner">
              <div class="container-fluid">
                <a class="brand" href="dashboard.php">CanalBleu.<span class="slogan">admin</span></a>
                <div class="nav-no-collapse">
                    <ul class="nav">
                        <li class="active"><a href="dashboard.html"><span class="icon16 icomoon-icon-screen"></span> Dashboard</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="icon16 icomoon-icon-cog"></span> Settings
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="menu">
                                    <ul>
                                        <li>                                                    
                                            <a href="#"><span class="icon16 iconic-icon-new-window"></span>Site config</a>
                                        </li>
                                        <li>                                                    
                                            <a href="#"><span class="icon16 icomoon-icon-wrench"></span>Plugins</a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="icon16 icomoon-icon-picture-2"></span>Themes</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="icon16 icomoon-icon-mail"></span>Messages <span class="notification">8</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="menu">
                                    <ul class="messages">    
                                        <li class="header"><strong>Messages</strong> (10) emails and (2) PM</li>
                                        <li>
                                           <span class="icon"><span class="icon16 icomoon-icon-user-2"></span></span>
                                            <span class="name"><a data-toggle="modal" href="#myModal1"><strong>Sammy Morerira</strong></a><span class="time">35 min ago</span></span>
                                            <span class="msg">I have question about new function ...</span>
                                        </li>
                                        <li>
                                           <span class="icon avatar"><img src="images/avatar.jpg" alt="" /></span>
                                            <span class="name"><a data-toggle="modal" href="#myModal1"><strong>George Michael</strong></a><span class="time">1 hour ago</span></span>
                                            <span class="msg">I need to meet you urgent please call me ...</span>
                                        </li>
                                        <li>
                                            <span class="icon"><span class="icon16 icomoon-icon-mail"></span></span>
                                            <span class="name"><a data-toggle="modal" href="#myModal1"><strong>Ivanovich</strong></a><span class="time">1 day ago</span></span>
                                            <span class="msg">I send you my suggestion, please look and ...</span>
                                        </li>
                                        <li class="view-all"><a href="#">View all messages <span class="icon16  icomoon-icon-arrow-right-7"></span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                  
                    <ul class="nav pull-right usernav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="icon16 icomoon-icon-bell"></span><span class="notification">3</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="menu">
                                    <ul class="notif">
                                        <li class="header"><strong>Notifications</strong> (3) items</li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><span class="icon16 icomoon-icon-user-2"></span></span>
                                                <span class="event">1 User is registred</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><span class="icon16 icomoon-icon-comments-4"></span></span>
                                                <span class="event">Jony add 1 comment</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><span class="icon16 icomoon-icon-new"></span></span>
                                                <span class="event">admin Julia added post with a long description</span>
                                            </a>
                                        </li>
                                        <li class="view-all"><a href="#">View all notifications <span class="icon16  icomoon-icon-arrow-right-7"></span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                                <img src="images/avatar.jpg" alt="" class="image" /> 
                                <span class="txt"><?php echo $_SESSION["S_LOGIN"]["email"];?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="menu">
                                    <ul>
                                        <li>
                                            <a href="#"><span class="icon16 icomoon-icon-user-3"></span>Edit profile</a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="icon16 icomoon-icon-comments-2"></span>Approve comments</a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="icon16 entypo-icon-contact"></span>Add user</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="../logout.php"><span class="icon16 icomoon-icon-exit"></span> Déconnexion</a></li>
                    </ul>
                </div><!-- /.nav-collapse -->
              </div>
            </div><!-- /navbar-inner -->
          </div><!-- /navbar --> 

    </div><!-- End #header -->

    <div id="wrapper">

        <!--Responsive navigation button-->  
        <div class="resBtn">
            <a href="#"><span class="icon16 minia-icon-list-3"></span></a>
        </div>
        
        <!--Sidebar collapse button-->  
        <div class="collapseBtn">
             <a href="#" class="tipR" title="Hide sidebar"><span class="icon12 minia-icon-layout"></span></a>
        </div>

        <!--Sidebar background-->
        <div id="sidebarbg"></div>
        <!--Sidebar content-->
        <div id="sidebar">

            <div class="shortcuts">
                <ul>
                    <li><a href="#" title="Support section" class="tip"><span class="icon24 wpzoom-support"></span></a></li>
                    <li><a href="#" title="Database backup" class="tip"><span class="icon24 icomoon-icon-database"></span></a></li>
                    <li><a href="#" title="Sales statistics" class="tip"><span class="icon24 iconic-icon-chart"></span></a></li>
                    <li><a href="#" title="Write post" class="tip"><span class="icon24 icomoon-icon-pencil"></span></a></li>
                </ul>
            </div><!-- End search -->            

            <div class="sidenav">

                <div class="sidebar-widget" style="margin: -1px 0 0 0;">
                    <h5 class="title" style="margin-bottom:0">Navigation</h5>
                </div><!-- End .sidenav-widget -->

                <div class="mainnav">
                    <ul>
                        <li><a href="charts.html"><span class="icon16 icomoon-icon-stats-up"></span>Charts</a></li>
                        <li>
                            <a href="#"><span class="icon16 minia-icon-list-4"></span>Forms</a>
                            <ul class="sub">
                                <li><a href="forms.html"><span class="icon16 icomoon-icon-paper"></span>Forms Stuff</a></li>
                                <li><a href="forms-validation.html"><span class="icon16 icomoon-icon-paper"></span>Validation</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="icon16 silk-icon-columns"></span>Tables</a>
                            <ul class="sub">
                                <li><a href="tables.html"><span class="icon16 icomoon-icon-arrow-right"></span>Static</a></li>
                                <li><a href="data-table.html"><span class="icon16 icomoon-icon-arrow-right"></span>Data table</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="icon16 brocco-icon-grid"></span>UI Elements</a>
                            <ul class="sub">
                                <li><a href="icons.html"><span class="icon16 icomoon-icon-rocket"></span>Icons</a></li>
                                <li><a href="buttons.html"><span class="icon16 icomoon-icon-paper"></span>Buttons</a></li>
                                <li><a href="elements.html"><span class="icon16 minia-icon-cog"></span>Elements</a></li>
                            </ul>
                        </li>
                        <li><a href="typo.html"><span class="icon16 icomoon-icon-font"></span>Typography</a></li>
                        <li><a href="grid.html"><span class="icon16 icomoon-icon-grid-view"></span>Grid</a></li>
                        <li><a href="calendar.html"><span class="icon16 brocco-icon-calendar"></span>Calendar</a></li>
                        <li>
                            <a href="widgets.html"><span class="icon16 icomoon-icon-cube"></span>Widgets<span class="notification green">30</span></a>
                        </li>
                        <li><a href="file.html"><span class="icon16 icomoon-icon-upload-2"></span>File Manager</a></li>
                        <li>
                            <a href="#"><span class="icon16 icomoon-icon-paper"></span>Error pages<span class="notification">6</span></a>
                            <ul class="sub">
                                <li><a href="403.html"><span class="icon16 icomoon-icon-paper"></span>Error 403</a></li>
                                <li><a href="404.html"><span class="icon16 icomoon-icon-paper"></span>Error 404</a></li>
                                <li><a href="405.html"><span class="icon16 icomoon-icon-paper"></span>Error 405</a></li>
                                <li><a href="500.html"><span class="icon16 icomoon-icon-paper"></span>Error 500</a></li>
                                <li><a href="503.html"><span class="icon16 icomoon-icon-paper"></span>Error 503</a></li>
                                <li><a href="offline.html"><span class="icon16 icomoon-icon-paper"></span>Offline page</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="icon16 iconic-icon-box"></span>Other pages<span class="notification blue">4</span></a>
                            <ul class="sub">
                                <li><a href="invoice.html"><span class="icon16 icomoon-icon-paper"></span>Invoice page</a></li>
                                <li><a href="profile.html"><span class="icon16 icomoon-icon-paper"></span>User profile</a></li>
                                <li><a href="search.html"><span class="icon16 wpzoom-search"></span>Search page</a></li>
                                <li><a href="email.html"><span class="icon16 icomoon-icon-mail"></span>Email page</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- End sidenav -->

            <div class="sidebar-widget">
                <h5 class="title">Monthly Bandwidth Transfer</h5>
                <div class="content">
                    <span class="icon16 iconic-icon-transfer left"></span>
                    <div class="progress progress-mini progress-danger left tip" title="87%">
                      <div class="bar" style="width: 87%;"></div>
                    </div>
                    <span class="percent">87%</span>
                    <div class="stat">19419.94 / 12000 MB</div>
                </div>

            </div><!-- End .sidenav-widget -->

            <div class="sidebar-widget">
                <h5 class="title">Disk Space Usage</h5>
                <div class="content">
                    <span class="icon16 icomoon-icon-cloud left"></span>
                    <div class="progress progress-mini progress-success left tip" title="16%">
                      <div class="bar" style="width: 16%;"></div>
                    </div>
                    <span class="percent">16%</span>
                    <div class="stat">304.44 / 8000 MB</div>
                </div>

            </div><!-- End .sidenav-widget -->

            <div class="sidebar-widget">
                <h5 class="title">Ad sense stats</h5>
                <div class="content">
                    
                    <div class="stats">
                        <div class="item">
                            <div class="head clearfix">
                                <div class="txt">Advert View</div>
                            </div>
                            <span class="icon16 icomoon-icon-eye left"></span>
                            <div class="number">21,501</div>
                            <div class="change">
                                <span class="icon24 icomoon-icon-arrow-up green"></span>
                                5%
                            </div>
                            <span id="stat1" class="spark"></span>
                        </div>
                        <div class="item">
                            <div class="head clearfix">
                                <div class="txt">Clicks</div>
                            </div>
                            <span class="icon16 entypo-icon-thumbs-up left"></span>
                            <div class="number">308</div>
                            <div class="change">
                                <span class="icon24 icomoon-icon-arrow-down red"></span>
                                8%
                            </div>
                            <span id="stat2" class="spark"></span>
                        </div>
                        <div class="item">
                            <div class="head clearfix">
                                <div class="txt">Page CTR</div>
                            </div>
                            <span class="icon16 icomoon-icon-heart left"></span>
                            <div class="number">4%</div>
                            <div class="change">
                                <span class="icon24 icomoon-icon-arrow-down red"></span>
                                1%
                            </div>
                            <span id="stat3" class="spark"></span>
                        </div>
                        <div class="item">
                            <div class="head clearfix">
                                <div class="txt">Earn money</div>
                            </div>
                            <span class="icon16 icomoon-icon-calculate left"></span>
                            <div class="number">$376</div>
                            <div class="change">
                                <span class="icon24 icomoon-icon-arrow-up green"></span>
                                26%
                            </div>
                            <span id="stat4" class="spark"></span>
                        </div>
                    </div>

                </div>

            </div><!-- End .sidenav-widget -->

            <div class="sidebar-widget">
                <h5 class="title">Right now</h5>
                <div class="content">
                    <div class="rightnow">
                        <ul class="unstyled">
                            <li><span class="number">34</span><span class="icon16 icomoon-icon-new"></span>Posts</li>
                            <li><span class="number">7</span><span class="icon16 icomoon-icon-paper"></span>Pages</li>
                            <li><span class="number">14</span><span class="icon16 brocco-icon-list"></span>Categories</li>
                            <li><span class="number">201</span><span class="icon16 icomoon-icon-tag"></span>Tags</li>
                        </ul>
                    </div>
                </div>

            </div><!-- End .sidenav-widget -->

        </div><!-- End #sidebar -->

        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Dashboard</h3>                    

                    <div class="resBtnSearch">
                        <a href="#"><span class="icon16 brocco-icon-search"></span></a>
                    </div>

                    <div class="search">

                        <form id="searchform" action="search.html" />
                            <input type="text" id="tipue_search_input" class="top-search" placeholder="Search here ..." />
                            <input type="submit" id="tipue_search_button" class="search-btn" value="" />
                        </form>
                
                    </div><!-- End search -->
                    
                    <ul class="breadcrumb">
                        <li>You are here:</li>
                        <li>
                            <a href="#" class="tip" title="back to dashboard">
                                <span class="icon16 icomoon-icon-screen"></span>
                            </a> 
                            <span class="divider">
                                <span class="icon16 icomoon-icon-arrow-right"></span>
                            </span>
                        </li>
                        <li class="active">Dashboard</li>
                    </ul>

                </div><!-- End .heading-->

                <!-- Build page from here: -->
                <div class="row-fluid">

                    <div class="span8">
                        <div class="centerContent">
                  
                            <ul class="bigBtnIcon">
                                <li>
                                    <a href="#" title="I`m with gradient" class="tipB">
                                        <span class="icon entypo-icon-users"></span>
                                        <span class="txt">Users</span>
                                        <span class="notification">5</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon icomoon-icon-support"></span>
                                        <span class="txt">Support tickets</span>
                                        <span class="notification blue">12</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="I`m with pattern" class="pattern tipB">
                                        <span class="icon icomoon-icon-comments-2"></span>
                                        <span class="txt">New Comments</span>
                                        <span class="notification green">23</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon icomoon-icon-basket"></span>
                                        <span class="txt">Orders</span>
                                        <span class="notification">+5</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon icomoon-icon-history"></span>
                                        <span class="txt">Backups</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon icomoon-icon-meter-fast"></span>
                                        <span class="txt">Site Usage</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- End .span8 -->

                    <div class="span4">
                        <div class="centerContent">
                            <div class="circle-stats">
                                
                                <div class="circular-item tipB" title="Site overload">
                                    <span class="icon icomoon-icon-fire"></span>
                                    <input type="text" value="62" class="redCircle" />
                                </div>

                                <div class="circular-item tipB" title="Site average load time">
                                    <span class="icon icomoon-icon-busy"></span>
                                    <input type="text" value="12" class="blueCircle" />
                                </div>

                                <div class="circular-item tipB" title="Target complete">
                                    <span class="icon iconic-icon-target"></span>
                                    <input type="text" value="94" class="greenCircle" />
                                </div>

                            </div>
                        </div>

                    </div><!-- End .span4 -->

                </div><!-- End .row-fluid -->

                <div class="row-fluid">

                    <div class="span8">

                        <div class="box chart gradient">

                            <div class="title">

                                <h4>
                                    <span class="icon16 icomoon-icon-bars"></span>
                                    <span>Visitors Chart</span>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="content" style="padding-bottom:0;">
                               <div class="visitors-chart" style="height: 230px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
                               <ul class="chartShortcuts">
                                    <li>
                                        <a href="#">
                                            <span class="head">Total Visits</span>
                                            <span class="number">509</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="head">Uniqiue Visits</span>
                                            <span class="number">309</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="head">External Visits</span>
                                            <span class="number">109</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="head">Impressions</span>
                                            <span class="number">325</span>
                                        </a>
                                    </li>
                                </ul>
                               
                            </div>

                        </div><!-- End .box -->

                    </div><!-- End .span8 -->

                    <div class="span4">

                        <div class="sparkStats">
                            <h4>389 people visited this site <a href="#" class="icon tip" title="Configure"><span class="icon16 iconic-icon-cog"></span></a></h4>
                            <ul class="unstyled">
                                <li><span class="sparkLine1 "></span> Visits: <span class="number">509</span></li>
                                <li>
                                    <span class="sparkLine2"></span>
                                    Unique Visitors: 
                                    <span class="number">389</span>
                                </li>
                                <li><span class="sparkLine3"></span> 
                                    Pageviews: 
                                    <span class="number">731</span>
                                </li>
                                <li><span class="sparkLine4"></span>
                                    Pages / Visit: 
                                    <span class="number">1.44</span>
                                </li>
                                <li><span class="sparkLine5"></span>
                                    Avg. Visit Duration: 
                                    <span class="number">00:01:21</span>
                                </li>
                                <li><span class="sparkLine6"></span>
                                    Bounce Rate: <span class="number">68.37%</span>
                                </li>
                                <li><span class="sparkLine7"></span>
                                    % New Visits: 
                                    <span class="number">76.23%</span>
                                </li>

                            </ul>
                            <div class="right" style="padding: 15px 0">
                                <a href="charts.html" class="btn btn-info">View full statistic <span class="icon16 icomoon-icon-arrow-right white"></span></a>
                            </div>
                        </div><!-- End .sparkStats -->
                        

                    </div><!-- End .span4 -->

                </div><!-- End .row-fluid -->

                <div class="row-fluid">

                    <div class="span4">

                        <div class="box gradient">

                            <div class="title">

                                <h4>
                                    <span class="icon16 icomoon-icon-pie"></span>
                                    <span>Visitors overview</span>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="content">
                               <div class="pieStats" style="height: 240px; width:100%;">

                                </div>
                            </div>

                        </div><!-- End .box -->

                     
                    </div><!-- End .span4 -->

                    <div class="span4">
                        <div class="box gradient">

                            <div class="title">

                                <h4>
                                    <span class="icon16 entypo-icon-thumbs-up"></span>
                                    <span>Vital Stats  <span class="label label-success"><span class="icomoon-icon-arrow-up white"></span>1268</span></span>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="content">
                              
                                <div class="vital-stats" style="padding-bottom:23px">
                                    <ul class="unstyled">
                                        <li>
                                            <span class="icomoon-icon-arrow-up green"></span> 81% Clicks
                                            <span class="pull-right strong">567</span>
                                            <div class="progress progress-striped ">
                                                <div class="bar" style="width: 81%;"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="icomoon-icon-arrow-up green"></span> 72% Uniquie Clicks
                                            <span class="pull-right strong">507</span>
                                            <div class="progress progress-success progress-striped ">
                                                <div class="bar" style="width: 72%;"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="icomoon-icon-arrow-down red"></span> 53% Impressions
                                            <span class="pull-right strong">457</span>
                                            <div class="progress progress-warning progress-striped ">
                                                <div class="bar" style="width: 53%;"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="icomoon-icon-arrow-up green"></span> 3% Online Users
                                            <span class="pull-right strong">8</span>
                                            <div class="progress progress-danger progress-striped ">
                                                <div class="bar" style="width: 3%;"></div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>

                            </div>

                        </div><!-- End .box -->  
                    </div><!-- End .span4 -->

                    <div class="span4">

                        <div class="reminder">
                            <h4>Things you need to do 
                                <a href="#" class="icon tip" title="Configure"><span class="icon16 iconic-icon-cog"></span></a>
                            </h4>
                            <ul>
                                <li class="clearfix">
                                    <div class="icon">
                                        <span class="icon32 icomoon-icon-basket gray"></span>
                                    </div>
                                    <span class="number">7</span> 
                                    <span class="txt">Pending Orders</span>
                                    <a class="btn btn-warning">go</a>
                                </li>
                                <li class="clearfix">
                                    <div class="icon">
                                        <span class="icon32 icomoon-icon-support red"></span>
                                    </div>
                                    <span class="number">3</span> 
                                    <span class="txt">Support Tickets </span>
                                    <a class="btn btn-warning">go</a>
                                </li>
                                <li class="clearfix">
                                    <div class="icon">
                                        <span class="icon32 icomoon-icon-new green"></span>
                                    </div>
                                    <span class="number">5</span> 
                                    <span class="txt">New Invoices </span>
                                    <a class="btn btn-warning">go</a>
                                </li>
                                <li class="clearfix">
                                    <div class="icon">
                                        <span class="icon32 icomoon-icon-comments-4 blue"></span>
                                    </div>
                                    <span class="number">13</span> 
                                    <span class="txt">Review Comments</span> 
                                    <a class="btn btn-warning">go</a>
                                </li>
                                <li class="clearfix">
                                    <div class="icon">
                                        <span class="icon32 icomoon-icon-cog dark"></span>
                                    </div>
                                    <span class="number">2</span> 
                                    <span class="txt">Settings to Change </span>
                                    <a class="btn btn-warning">go</a>
                                </li>                                   
                            </ul>
                        </div><!-- End .reminder -->

                    </div><!-- End .span4 -->

                </div><!-- End .row-fluid -->

                <div class="row-fluid">

                    <div class="span8">
                        <div class="box calendar gradient">

                            <div class="title">

                                <h4>
                                    <i class="icon16 brocco-icon-calendar"></i>
                                    <span>Calendar</span>
                                </h4>
                                <!-- <a href="#" class="minimize">Minimize</a> -->
                            </div>
                            <div class="content noPad"> 
                                <div id="calendar">
                                </div>
                            </div>

                        </div><!-- End .box -->  
                    </div><!-- End .span8 --> 

                    <div class="span4">

                        <div class="todo">
                            <h4>To Do List <a href="#" class="icon tip" title="Add task"><span class="icon16 icomoon-icon-plus-2"></span></a></h4>
                            <ul>
                                <li class="clearfix">
                                    <div class="txt">
                                        Fix some bugs
                                        <span class="by label">Admin</span>
                                        <span class="date badge badge-important">Today</span>
                                    </div>
                                    <div class="controls">
                                        <a href="#" title="Edit task" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                        <a href="#" title="Remove task" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="txt">
                                        Add post about birds
                                        <span class="by label">Julia</span>
                                        <span class="date badge badge-success">Tomorrow</span>
                                    </div>
                                    <div class="controls">
                                        <a href="#" title="Edit task" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                        <a href="#" title="Remove task" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="txt">
                                        Remove some items
                                        <span class="by label">Admin</span>
                                        <span class="date badge badge-success">Tomorrow</span>
                                    </div>
                                    <div class="controls">
                                        <a href="#" title="Edit task" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                        <a href="#" title="Remove task" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="txt">
                                        Staff party (don`t miss)
                                        <span class="by label">Admin</span>
                                        <span class="date badge badge-info">08.08.2012</span>
                                    </div>
                                    <div class="controls">
                                        <a href="#" title="Edit task" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                        <a href="#" title="Remove task" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="txt">
                                        Shedule backup
                                        <span class="by label">Steve</span>
                                        <span class="date badge badge-info">08.08.2012</span>
                                    </div>
                                    <div class="controls">
                                        <a href="#" title="Edit task" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                        <a href="#" title="Remove task" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div><!-- End .span4 -->

                    <div class="span4">

                        <div class="box gradient">
                            <div class="title">
                                <h4>
                                    <span class="icon16 silk-icon-chat"></span>
                                    <span>Messages layout</span>
                                </h4>
                            </div>
                            <div class="content noPad">

                                <ul class="messages">
                                    <li class="user clearfix">
                                        <a href="#" class="avatar">
                                            <img src="images/avatar2.jpeg" alt="" />
                                        </a>
                                        <div class="message">
                                            <div class="head clearfix">
                                                <span class="name"><strong>Lazar</strong> says:</span>
                                                <span class="time">25 seconds ago</span>
                                            </div>
                                            <p>
                                                Time to go i call you tomorrow.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="admin clearfix">
                                        <a href="#" class="avatar">
                                            <img src="images/avatar3.jpeg" alt="" />
                                        </a>
                                        <div class="message">
                                            <div class="head clearfix">
                                                <span class="name"><strong>Sugge</strong> says:</span>
                                                <span class="time">just now</span>
                                            </div>
                                            <p>
                                                OK, have a nice day.
                                            </p>
                                        </div>
                                    </li>

                                    <li class="sendMsg">
                                        <form class="form-horizontal" action="#" />
                                            <textarea class="elastic" id="textarea" rows="1" placeholder="Enter your message ..." style="width:98%;"></textarea>
                                            <button type="submit" class="btn btn-info marginT10">Send message</button>
                                        </form>
                                    </li>
                                    
                                </ul>

                            </div>

                        </div><!-- End .box -->


                    </div><!-- End .span4 -->

                </div><!-- End .row-fluid -->

                <div class="modal fade hide" id="myModal1">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span class="icon12 minia-icon-close"></span></button>
                        <h3>Chat layout</h3>
                    </div>
                    <div class="modal-body">
                        <ul class="messages">
                            <li class="user clearfix">
                                <a href="#" class="avatar">
                                    <img src="images/avatar2.jpeg" alt="" />
                                </a>
                                <div class="message">
                                    <div class="head clearfix">
                                        <span class="name"><strong>Lazar</strong> says:</span>
                                        <span class="time">25 seconds ago</span>
                                    </div>
                                    <p>
                                        Time to go i call you tomorrow.
                                    </p>
                                </div>
                            </li>
                            <li class="admin clearfix">
                                <a href="#" class="avatar">
                                    <img src="images/avatar3.jpeg" alt="" />
                                </a>
                                <div class="message">
                                    <div class="head clearfix">
                                        <span class="name"><strong>Sugge</strong> says:</span>
                                        <span class="time">just now</span>
                                    </div>
                                    <p>
                                        OK, have a nice day.
                                    </p>
                                </div>
                            </li>

                            <li class="sendMsg">
                                <form class="form-horizontal" action="#" />
                                    <textarea class="elastic" id="textarea1" rows="1" placeholder="Enter your message ..." style="width:98%;"></textarea>
                                    <button type="submit" class="btn btn-info marginT10">Send message</button>
                                </form>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn" data-dismiss="modal">Close</a>
                    </div>
                </div>
                
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->
    
    <!-- Le javascript
    ================================================== -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap/bootstrap.js"></script>  
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/jquery.mousewheel.js"></script>

    <!-- Load plugins -->
    <script type="text/javascript" src="plugins/qtip/jquery.qtip.min.js"></script>
    <script type="text/javascript" src="plugins/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="plugins/flot/jquery.flot.grow.js"></script>
    <script type="text/javascript" src="plugins/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="plugins/flot/jquery.flot.resize.js"></script>
    <script type="text/javascript" src="plugins/flot/jquery.flot.tooltip_0.4.4.js"></script>
    <script type="text/javascript" src="plugins/flot/jquery.flot.orderBars.js"></script>

    <script type="text/javascript" src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="plugins/knob/jquery.knob.js"></script>
    <script type="text/javascript" src="plugins/fullcalendar/fullcalendar.min.js"></script>
    <script type="text/javascript" src="plugins/prettify/prettify.js"></script>

    <script type="text/javascript" src="plugins/watermark/jquery.watermark.min.js"></script>
    <script type="text/javascript" src="plugins/elastic/jquery.elastic.js"></script>
    <script type="text/javascript" src="plugins/inputlimiter/jquery.inputlimiter.1.3.min.js"></script>
    <script type="text/javascript" src="plugins/maskedinput/jquery.maskedinput-1.3.min.js"></script>
    <script type="text/javascript" src="plugins/ibutton/jquery.ibutton.min.js"></script>
    <script type="text/javascript" src="plugins/uniform/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="plugins/stepper/ui.stepper.js"></script>
    <script type="text/javascript" src="plugins/color-picker/colorpicker.js"></script>
    <script type="text/javascript" src="plugins/timeentry/jquery.timeentry.min.js"></script>
    <script type="text/javascript" src="plugins/select/select2.min.js"></script>
    <script type="text/javascript" src="plugins/dualselect/jquery.dualListBox-1.3.min.js"></script>
    <script type="text/javascript" src="plugins/tiny_mce/jquery.tinymce.js"></script>
    <script type="text/javascript" src="plugins/validate/jquery.validate.min.js"></script>
    <script type="text/javascript" src="plugins/search/tipuesearch_set.js"></script>
    <script type="text/javascript" src="plugins/search/tipuesearch_data.js"></script><!-- JSON for searched results -->
    <script type="text/javascript" src="plugins/search/tipuesearch.js"></script>

    <script type="text/javascript" src="plugins/animated-progress-bar/jquery.progressbar.js"></script>
    <script type="text/javascript" src="plugins/pnotify/jquery.pnotify.min.js"></script>
    <script type="text/javascript" src="plugins/lazy-load/jquery.lazyload.min.js"></script>
    <script type="text/javascript" src="plugins/jpages/jPages.min.js"></script>
    <script type="text/javascript" src="plugins/pretty-photo/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="plugins/smartWizzard/jquery.smartWizard-2.0.min.js"></script>

    <script type="text/javascript" src="plugins/ios-fix/ios-orientationchange-fix.js"></script>

    <script type="text/javascript" src="plugins/dataTables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="plugins/elfinder/elfinder.min.js"></script>
    <script type="text/javascript" src="plugins/plupload/plupload.js"></script>
    <script type="text/javascript" src="plugins/plupload/plupload.html4.js"></script>
    <script type="text/javascript" src="plugins/plupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>

    <!-- Init plugins -->
    <script type="text/javascript" src="js/statistic.js"></script><!-- Control graphs ( chart, pies and etc) -->

    <!-- Important Place before main.js  -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
    <script type="text/javascript" src="plugins/touch-punch/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>


    </body>
</html>

<?php
	} else {
		header("Location: index.php");
		exit;
	}
		
} else {
	header("Location: index.php");
	exit;
}
?>