<?php 
session_start();

include_once("../set/setdb.php");
include_once("../set/verify_login.php");

if (isset($_SESSION["S_LOGIN"]) && !empty($_SESSION["S_LOGIN"])) {
	//echo "A";
	$array_s_login = $_SESSION["S_LOGIN"];
//var_dump($_SESSION);exit;
	$errore = "";
	if (isset($line["error_msg"])) $errore = $line["error_msg"];
	
    if (Verify_Sess_Login($array_s_login, 1) && empty($errore)) {
		header("Location: dashboard.php");
		exit;
	}
}
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
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="css/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css" />
    <link href="css/icons.css" rel="stylesheet" type="text/css" />
    <link href="plugins/uniform/uniform.default.css" type="text/css" rel="stylesheet" />

    <!-- Main stylesheets -->
    <link href="css/main.css" rel="stylesheet" type="text/css" /> 

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
        <link type="text/css" href="css/ie.css" rel="stylesheet" />
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-57-precomposed.png" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
      
    <body class="loginPage">

    <div class="container-fluid">

        <div id="header">

            <div class="row-fluid">

                <div class="navbar">
                    <div class="navbar-inner">
                      <div class="container">
                            <a class="brand" href="dashboard.php">CanalBleu.<span class="slogan">admin</span></a>
                      </div>
                    </div><!-- /navbar-inner -->
                  </div><!-- /navbar -->
                

            </div><!-- End .row-fluid -->

        </div><!-- End #header -->

    </div><!-- End .container-fluid -->    

    <div class="container-fluid">

        <div class="loginContainer">
            <form class="form-horizontal" action="login.php" method="post" id="loginForm" />
                <div class="form-row row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <label class="form-label span12" for="username">
                                Login:
                                <span class="icon16 icomoon-icon-user-2 right gray marginR10"></span>
                            </label>
                            <input class="span12" id="username" type="text" name="username" value="Administrateur" />
                        </div>
                    </div>
                </div>

                <div class="form-row row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <label class="form-label span12" for="password">
                                Mot de passe:
                                <span class="icon16 icomoon-icon-locked right gray marginR10"></span>
                                <span class="forgot"><a href="#">Mot de passe oublié?</a></span>
                            </label>
                            <input class="span12" id="password" type="password" name="password" value="somepass" />
                        </div>
                    </div>
                </div>
                <div class="form-row row-fluid">                       
                    <div class="span12">
                        <div class="row-fluid">
                            <div class="form-actions">
                            <div class="span12 controls">
                                <input type="checkbox" id="keepLoged" value="Value" class="styled" name="logged" /> Rester connecté
                                <button type="submit" class="btn btn-info right" id="loginBtn"><span class="icon16 icomoon-icon-enter white"></span> Login</button>
                            </div>
                            </div>
                        </div>
                    </div> 
                </div>

            </form>
        </div>

    </div><!-- End .container-fluid -->

    <!-- Le javascript
    ================================================== -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap/bootstrap.js"></script>  
    <script type="text/javascript" src="plugins/touch-punch/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="plugins/ios-fix/ios-orientationchange-fix.js"></script>
    <script type="text/javascript" src="plugins/validate/jquery.validate.min.js"></script>
    <script type="text/javascript" src="plugins/uniform/jquery.uniform.min.js"></script>

     <script type="text/javascript">
        // document ready function
        $(document).ready(function() {
            $("input, textarea, select").not('.nostyle').uniform();
            $("#loginForm").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 4
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }  
                },
                messages: {
                    username: {
                        required: "Entrer un login",
                        minlength: "Login doit avoir une longuer min 6"
                    },
                    password: {
                        required: "Entrer un mot de passe",
                        minlength: "Le mot de passe doit avoir une longuer min 6"
                    }
                }   
            });
        });
    </script>

    <!-- NACHALO NA TYXO.BG BROYACH -->
    <script type="text/javascript">
    <!--
    d=document;d.write('<a href="https://www.tyxo.bg/?138779" title="Tyxo.bg counter"><img width="1" height="1" border="0" alt="Tyxo.bg counter" src="'+location.protocol+'//cnt.tyxo.bg/138779?rnd='+Math.round(Math.random()*2147483647));
    d.write('&sp='+screen.width+'x'+screen.height+'&r='+escape(d.referrer)+'"></a>');
    //-->
    </script><noscript><a href="http://www.tyxo.bg/?138779" title="Tyxo.bg counter"><img src="https://cnt.tyxo.bg/138779" width="1" height="1" border="0" alt="Tyxo.bg counter" /></a></noscript>
    <!-- KRAI NA TYXO.BG BROYACH -->
 
    </body>
</html>
