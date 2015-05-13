<?php
session_start();

include_once("../set/setdb.php");
include_once("../set/verify_login.php");

$id_service = trim($_POST['id_service']);
$nom_service = trim($_POST['nom_service']);
$couleur = trim($_POST['couleur']);

if ( empty($id_service) || empty($nom_service) || empty($couleur) ) {
	$_SESSION["S_ERR_REG"] = "Compiler tous les champs.<br><br>";
	header("Location: edit_service.php");
} else {
	$connect = connectDB();
	if(isset($id_service ) && !empty($id_service)){
		$select = "SELECT * FROM guichetdb.service WHERE nom_service='".$nom_service."' and id_service <> $id_service";
		$res = mysqli_query($connect, $select);

		if (mysqli_num_rows($res) > 0) {
			disconnectDB($connect);
			$_SESSION["S_ERR_REG"] = "Service dejà existant!";
			header("Location: edit_service.php");
		} else {
			$query  = "update `guichetdb`.`service` set nom_service='".$nom_service."' , couleur = '".$couleur."' ";
			$query .= " id_type_user=$usertype where id_service = $id_service";
			//echo $query;exit;
			if (mysqli_query($connect, $query)) {
				$_SESSION['S_REG_INFO'] = 'Modification réussie';
			} else {
				$_SESSION["S_ERR_REG"] = "Erreur lors de modification";
			}
			header("Location: edit_service.php");
		}
	} else {
		$_SESSION["S_ERR_REG"] = "Service inexistant";
		header("Location: edit_service.php");
	}
}
?>