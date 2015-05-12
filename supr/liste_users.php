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
    
     <?php include_once 'head.php'; ?> 
    <body>
    <?php include_once 'header.php'; ?>

    <div id="wrapper">

        <?php include_once 'sidebar.php'; ?>
        <?php include_once 'users.php'; ?>

        
    
    </div><!-- End #wrapper -->
    
    <!-- Le javascript
    ================================================== -->
    <?php include_once 'script.php'; ?>
    


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