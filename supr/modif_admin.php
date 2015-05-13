<?php

session_start();

include_once("../set/setdb.php");
include_once("../set/verify_login.php");

//var_dump($_POST);exit;

$nom = trim($_POST['nom']);
$prenom = trim($_POST['prenom']);
$email = trim($_POST['email']);
$dt = explode('/', trim($_POST['naissance']));
$naissance = $dt[2].'-'.$dt[1].'-'.$dt[0];
$password = trim($_POST['password']);

$usertype = trim($_POST['id_type_user']);
$id_user = $_POST['id_user'];

if ( empty($id_user) || empty($nom) || empty($prenom) || empty($email) || empty($naissance) || empty($password) ) {
	$_SESSION["S_ERR_REG"] = "Compiler tous les champs.<br><br>";
	header("Location: profil_.php?id=$id_user");
} else {
	$connect = connectDB();
	if(isset($id_user) && !empty($id_user)){
		if (Verify_User_Exist($nom, $prenom, $email, $id_user)) {
			disconnectDB($connect);
			$_SESSION["S_ERR_REG"] = "Utilisateur dejà existant!";
		} else {
			$query  = "update `guichetdb`.`user` set name='".$nom."' , naissance='".$naissance."' ,";
			$query .= "surname='".$prenom."' , email = '".$email."' , password = '".$password."' ,";
			$query .= " id_type_user=$usertype where id = $id_user";
			//echo $query;exit;
			if (mysqli_query($connect, $query)) {
				$_SESSION['S_REG_INFO'] = 'Modification réussie';
			} else {
				$_SESSION["S_ERR_REG"] = "Erreur lors de modification";
			}
		}
		header("Location: profil_.php?id=$id_user");
	} else {
		$_SESSION["S_ERR_REG"] = "Utilisateur inexistant";
		header("Location: profil_.php");
	}
}
?>