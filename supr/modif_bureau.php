<?php

session_start();

include_once("../set/setdb.php");
include_once("../set/verify_login.php");

$ID = trim($_POST['id_bureau']);
$Nom = trim($_POST['nom_bureau']);
$Lattitude = trim($_POST['lattitude']);
$Longitude = trim($_POST['longitude']);
$Altitude = trim($_POST['altitude']);
$Rue = trim($_POST['rue']);
$Cite = trim($_POST['cite']);
$Province = trim($_POST['province']);
$Reference = trim($_POST['reference']);
$Note = trim($_POST['note']);
$Foto = trim($_POST['foto']);


if ( empty($ID) || empty($Nom) || empty($Lattitude) || empty($Longitude) || empty($Rue) || empty($Cite) ) {
	$_SESSION["S_ERR_REG"] = "Compiler tous les champs.<br><br>";
	header("Location: modification_b.php?ID=$ID");
} else {
	$connect = connectDB();
	if(isset($ID ) && !empty($ID)){
		$select = "SELECT * FROM guichetdb.bureau WHERE Nom='".$Nom."' and ID <> $ID";
		$res = mysqli_query($connect, $select);

		if (mysqli_num_rows($res) > 0) {
			disconnectDB($connect);
			$_SESSION["S_ERR_REG"] = "Bureau dejà existant!";
		} else {
			$query  = "update `guichetdb`.`bureau` set Nom='".$Nom."' , Lattitude='".$Lattitude."' ,";
			$query .= "Longitude='".$Longitude."' , Altitude = '".$Altitude."' , Rue = '".$Rue."' ";
			$query .= " Cite='".$Cite."', Province='".$Province."', Reference='".$Reference."'  ";
			$query .= " Note='".$Note."', Foto='".$Foto."' ";			
			$query .= " where id = ".$_POST['idUser'];
			//echo $query;exit;
			if (mysqli_query($connect, $query)) {
				$_SESSION['S_REG_INFO'] = 'Modification réussie';
			} else {
				$_SESSION["S_ERR_REG"] = "Erreur lors de modification";
			}
		}
		header("Location: modification_b.php?ID=$ID");
	} else {
		$_SESSION["S_ERR_REG"] = "Bureau inexistant";
		header("Location: modification_b.php");
	}
}
?>