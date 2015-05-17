<?php
session_start();

include_once("set/setdb.php");
include_once("set/verify_login.php");

//var_dump($_POST);

$nom = trim($_POST['nom']);
$prenom = trim($_POST['prenom']);
$email = trim($_POST['email']);
$dt = explode('/', trim($_POST['naissance']));
$naissance = $dt[2].'-'.$dt[1].'-'.$dt[0];
//$password = trim($_POST['password1']);
//echo "\n$naissance\n";
//exit;
if ( empty($nom) || empty($prenom) || empty($email) || empty($naissance) ) { // || empty($password) ) {
	$_SESSION["S_ERR_REG"] = "Compiler tous les champs.<br><br>";
	//echo "bobo";
	header("Location: index.php?page=enregistrer");
} else {
	$connect = connectDB();
	if(isset($_POST['idUser'])){
		if (Verify_User_Exist($nom, $prenom, $email)) {
			disconnectDB($connect);
			$_SESSION["S_ERR_REG"] = "Utilisateur dejà existant!";
			header("Location: index.php?page=enregistrer");
		} else {
			$password = trim($_POST['password1']);
			$query  = "update `guichetdb`.`utilisateur` set nom='".$nom."' , date_de_naissance='".$naissance."' ,";
			$query .= "prenom='".$prenom."' , email = '".$email."' , mot_de_passe = '".$password."' ";
			$query .= "where id = ".$_POST['idUser'];
			//echo $query;exit;
			if (mysqli_query($connect, $query)) {
				$sel_client = "SELECT * FROM guichetdb.utilisateur WHERE id=".$_POST['idUser'];
				$res_sel_client = mysqli_query($connect, $sel_client);
				$line = mysqli_fetch_array($res_sel_client, MYSQLI_ASSOC);
				$_SESSION["S_LOGIN"] = $line;
				disconnectDB($connect);
				$_SESSION['S_REG_INFO'] = 'Modification réussie';
				header("Location: index.php?page=modifier");
			} else {
				disconnectDB($connect);
				$_SESSION["S_ERR_REG"] = "Erreur lors de modification";
				header("Location: index.php?page=modifier");
			}
		}
	} else {
		if (Verify_User_Exist($nom, $prenom, $email)) {
			disconnectDB($connect);
			$_SESSION["S_ERR_REG"] = "Utilisateur dejà existant!";
			header("Location: index.php?page=enregistrer");
		} else {
			$login = generateRandomLogin();
			$password = generateRandomPassword();
			$query  = "INSERT INTO `guichetdb`.`utilisateur` (`id`, `nom`, `prenom`, `login`, `date_de_naissance`, `mot_de_passe`, `email`, `date_enregistrement`, `date_suppression`, `numero_compte`)";
			$query .= " VALUES (NULL, '".$nom."', '".$prenom."', '".$login."', '".$naissance."', '".$password."', '".$email."', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', '')";

			$res = mysqli_query($connect, $query);
			$insert_id = mysqli_insert_id($connect);
			disconnectDB($connect);
			if ($insert_id > 0) {
				$_SESSION['S_REG_INFO'] = 'Inscription réussie<br>Vous allez recevoir un mail pour confirmer votre incscription';
				header("Location: index.php?page=enregistrer");
			} else {
				$_SESSION["S_ERR_REG"] = "Erreur lors de l'inscription";
				header("Location: index.php?page=enregistrer");
			}
		}
	}
}
?>