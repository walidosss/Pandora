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
$id = $_POST['id'];

$usertype = trim($_POST['id_type_user']);

if ( empty($nom) || empty($prenom) || empty($email) || empty($naissance) || empty($password) ) {
	$_SESSION["S_ERR_REG"] = "Compiler tous les champs.<br><br>";
	header("Location: edit_user.php");
} else {
	$connect = connectDB();
	if(isset($id ) && !empty($id)){
		if (Verify_User_Exist($nom, $prenom, $email, $id)) {
			disconnectDB($connect);
			$_SESSION["S_ERR_REG"] = "Utilisateur dejà existant!";
			header("Location: edit_user.php");
		} else {
			$query  = "update `guichetdb`.`utilisateur` set name='".$nom."' , naissance='".$naissance."' ,";
			$query .= "prenom='".$prenom."' , email = '".$email."' , mot_de_passe = '".$password."' ";
			$query .= " id_type_utilisateur=$usertype where id = $id";
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