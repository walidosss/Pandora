<?php
session_start();

include_once("../set/setdb.php");
include_once("../set/verify_login.php");

//var_dump($_POST);

$nom = trim($_POST['nom']);
$prenom = trim($_POST['prenom']);
$email = trim($_POST['email']);
$dt = explode('/', trim($_POST['naissance']));
$naissance = $dt[2].'-'.$dt[1].'-'.$dt[0];
$password = trim($_POST['password']);

$usertype = trim($_POST['id_type_user']);

if ( empty($nom) || empty($prenom) || empty($email) || empty($naissance) || empty($password) ) {
	$_SESSION["S_ERR_REG"] = "Compiler tous les champs.<br><br>";
	header("Location: edit_user.php");
} else {
	$connect = connectDB();
	if(isset($_POST['idUser'])){
		if (Verify_User_Exist($nom, $prenom, $email)) {
			disconnectDB($connect);
			$_SESSION["S_ERR_REG"] = "Utilisateur dejà existant!";
			header("Location: edit_user.php");
		} else {
			$query  = "update `guichetdb`.`user` set name='".$nom."' , naissance='".$naissance."' ,";
			$query .= "surname='".$prenom."' , email = '".$email."' , password = '".$password."' ";
			$query .= " id_type_user=$usertype where id = ".$_POST['idUser'];
			//echo $query;exit;
			if (mysqli_query($connect, $query)) {
				$_SESSION['S_REG_INFO'] = 'Modification réussie';
			} else {
				$_SESSION["S_ERR_REG"] = "Erreur lors de modification";
			}
			header("Location: edit_user.php");
		}
	} else {
		$_SESSION["S_ERR_REG"] = "Utilisateur inexistant";
		header("Location: edit_user.php");
	}
}
?>