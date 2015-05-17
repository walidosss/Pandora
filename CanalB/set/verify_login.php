<?php
function get_ip() {
	//Just get the headers if we can or else use the SERVER global
	if ( function_exists( 'apache_request_headers' ) ) {
		$headers = apache_request_headers();
	} else {
		$headers = $_SERVER;
	}
	$the_ip='';
	//Get the forwarded IP if it exists
	if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {
		$the_ip = $headers['X-Forwarded-For'];
	} elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && 
		filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )) {
		$the_ip = $headers['HTTP_X_FORWARDED_FOR'];
	} else 
		$the_ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
	if (empty($the_ip)) $the_ip='10.0.0.1';
	return $the_ip;
	/*$ipaddress ='';
	if ($_SERVER['HTTP_CLIENT_IP'] != '127.0.0.1')
	$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	else if ($_SERVER['HTTP_X_FORWARDED_FOR'] != '127.0.0.1')
	$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else if ($_SERVER['HTTP_X_FORWARDED'] != '127.0.0.1')
	$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	else if ($_SERVER['HTTP_FORWARDED_FOR'] != '127.0.0.1')
	$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	else if ($_SERVER['HTTP_FORWARDED'] != '127.0.0.1')
	$ipaddress = $_SERVER['HTTP_FORWARDED'];
	else if ($_SERVER['REMOTE_ADDR'] != '127.0.0.1')
	$ipaddress = $_SERVER['REMOTE_ADDR'];
	else
	$ipaddress = 'UNKNOWN';
	return $ipaddress;*/
}

function Verify_Login($login_form, $password_form, $type=2) {

	$connect = connectDB();
	$sel_client = "SELECT * FROM guichetdb.utilisateur WHERE ";
	$sel_client .= " id_type_utilisateur=$type and ";
	$sel_client .= "login = '".$login_form."' AND mot_de_passe = '".$password_form."'";

	 $res_sel_client = mysqli_query($connect, $sel_client);
	 $line = mysqli_fetch_array($res_sel_client, MYSQLI_ASSOC);
	 //var_dump($line);exit;
	 $ip_access = get_ip();
	 $id_client = 0;
	 $etat = 0;
	 if (mysqli_num_rows($res_sel_client) > 0) {
		 $id_client = $line["id"];
		 if ($line['actif']==0) {
			 $line = array();
			 $line["error_msg"] = "Votre compte n'est pas encore activé.<br>Veuillez activer depuis l'email de confirmation reçu.<br><br>";
		 } elseif ($line['actif']==1) {
			 $etat = 1;
		 }
	 } else {
		 $line = array();
		 $line["error_msg"] = "Nom utilisateur et/ou Password incorrect.<br><br>";
		 return $line;
	 }
	$query  = "INSERT INTO `guichetdb`.`acces` (`id_acces`, `date_acces`, `id_utilisateur`, `login`,`mot_de_passe`, `addresse_ip`, `etat`)";
	$query .= " VALUES (NULL, CURRENT_TIMESTAMP, $id_client, '".$login_form."', '".$password_form."', '".$ip_access."', $etat)";
	mysqli_query($connect, $query);
	disconnectDB($connect);
	//var_dump($line["login"]);exit;
	return $line;
}

function Verify_Sess_Login($a_s_login, $type=2) {
         $connect = connectDB();
         $select  = "SELECT * FROM guichetdb.utilisateur WHERE ";
		 $select .= " id_type_utilisateur=$type and ";
         $select .= "login = '".$a_s_login['login']."' AND mot_de_passe = '".$a_s_login['mot_de_passe']."'";

         $res = mysqli_query($connect, $select);
         if (mysqli_num_rows($res) > 0) {
             disconnectDB($connect);
             return true;
         } else {
             disconnectDB($connect);
             return false;
         }
}

function Verify_User_Exist($nom, $prenom, $mail, $id=0) {
         $connect = connectDB();
		 //id 	name 	surname 	login 	naissance 	mot_de_passe 	email 
         $select = "SELECT * FROM guichetdb.utilisateur WHERE ";
         $select .= "nom = '".$nom."' AND login = '".$prenom."' AND email = '".$mail."'";

		if($id > 0) $select .= " and id<>$id";
		
         $res = mysqli_query($connect, $select);
         if (mysqli_num_rows($res) > 0) {
             disconnectDB($connect);
             return true;
         } else {
             disconnectDB($connect);
             return false;
         }
}

function getTypeUser($a_s_login) {
// RETOURNE LE TYPE UTIISATEUR: USER, POWER USER OU ADMIN
	$connect = connectDB();
	$select = "SELECT id_type_utilisateur FROM guichetdb.utilisateur WHERE ";
	$select .= "login = '".$a_s_login['login']."'";
	$result = mysqli_query($connect, $select);
	
	if ( $row = mysqli_fetch_assoc($result) ){
		disconnectDB($connect);
		return $row['id_type_user'];
	}
}

function getIdUser($a_s_login) {
// RETOURNE L'IDENTIFATEUR DE L'UTIISATEUR:
	$connect = connectDB();
	$select = "SELECT id FROM guichetdb.utilisateur WHERE ";
	$select .= "login = '".$a_s_login['login']."'";
	
	$result = mysqli_query($connect, $select);
	
	if ( $row = mysqli_fetch_assoc($result) ){
		mysqli_free_result($result);
		disconnectDB($connect);
		return $row['id'];
	}
}

function generateRandomLogin($length = 10) {
	$characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomLogin = '';
    for ($i = 0; $i < $length; $i++) {
        $randomLogin .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomLogin;
}

function generateRandomPassword($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
    $randomPassword = '';
    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomPassword;
}
?>