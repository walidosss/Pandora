<?php
session_start();
include_once("header.php");
include_once("menu.php");
include_once("set/setdb.php");
include_once("set/verify_login.php");

if (isset($_SESSION["S_LOGIN"]) && !empty($_SESSION["S_LOGIN"])) {
	//echo "A";
	$array_s_login = $_SESSION["S_LOGIN"];
//var_dump($_SESSION);
	$errore = "";
	if (isset($line["error_msg"])) $errore = $line["error_msg"];
	
    if (Verify_Sess_Login($array_s_login) && empty($errore)) {
		//echo "AB";
		$page = isset($_GET['page']) ? trim(strtolower($_GET['page']))       : "home";

		$allowedPages = array(
			'home'     => './home.php',
			'enregistrer'    => './enregistrer.php',
			'calendrier' => './calendrier.php',
			'carte' => './carte.php',
			'about'    => './about.php',
			'services' => './services.php',
			'gallery'  => './gallery.php',
			'photos'   => './photos.php',
			'events'   => './events.php',
			'contact'  => './contact.php',
			'modifier'   => './modifier.php'
		);
		//if (isset($_SESSION['page'])) include( $_SESSION['page']);
		//else
		include( isset($allowedPages[$page]) ? $allowedPages[$page] : $allowedPages["home"] );
    } else {
		//echo "AC";
		$page = isset($_GET['page']) ? trim(strtolower($_GET['page']))       : "home";
		$allowedPages = array(
			'home'     => './home.php',
			'enregistrer'    => './enregistrer.php',
			'about'    => './about.php',
			'contact'  => './contact.php'
		);
		include( isset($allowedPages[$page]) ? $allowedPages[$page] : $allowedPages["home"] );
	}
} else {
	//echo "B";
	$page = isset($_GET['page']) ? trim(strtolower($_GET['page']))       : "home";
	$allowedPages = array(
		'home'     => './home.php',
		'enregistrer'    => './enregistrer.php',
		'about'    => './about.php',
		'contact'  => './contact.php'
	);
	include( isset($allowedPages[$page]) ? $allowedPages[$page] : $allowedPages["home"] );
}
include_once("footer.php");
?>