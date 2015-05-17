<?php
session_start();

include_once("set/setdb.php");
include_once("set/verify_login.php");

$login = trim($_POST['login']);
$password = trim($_POST['password']);

if ( empty($login) || empty($password) ) {
	$_SESSION["S_ERR_LOGIN"] = "Saisir login et mot de passe.<br><br>";

	//$_SESSION['page'] = "enregistrer.php";
	header("Location: index.php?page=enregistrer");
} else {
	$user_l = Verify_Login($login, $password);

	$errore = "";
	if (isset($user_l["error_msg"])) $errore = $user_l["error_msg"];
	
	if (empty($errore)) {
		$_SESSION['msg'] = 'Bienvenu, '. $user_l ['login'];
		$_SESSION['type_msg'] = 'info';
		//$_SESSION['page'] = "home.php";
		$_SESSION["S_LOGIN"] = $user_l;
		if (isset( $_SESSION["S_ERR_LOGIN"])) unset($_SESSION["S_ERR_LOGIN"]);
		//header("Location: index.php?page=home");
		header("Location: index.php?page=calendrier");
	} else {
		$_SESSION["S_ERR_LOGIN"] = $errore;
		header("Location: index.php?page=enregistrer");
	}
	
}
?>