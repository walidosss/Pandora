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
	$sel_client = "SELECT * FROM guichetdb.user WHERE ";
	$sel_client .= " id_type_user=$type and ";
	$sel_client .= "username = '".$login_form."' AND password = '".$password_form."'";

	 $res_sel_client = mysqli_query($connect, $sel_client);
	 $line = mysqli_fetch_array($res_sel_client, MYSQL_ASSOC);
	 //var_dump($line);exit;
	 $ip_access = get_ip();
	 if (mysqli_num_rows($res_sel_client) > 0) {
		 $id_client = $line["id"];		 
		 $query  = "INSERT INTO `guichetdb`.`access` (`id_access`, `timeStampAccesso`, `id_client`, `username`,`password`, `addresse_ip`, `etat`)";
		 $query .= " VALUES (NULL, CURRENT_TIMESTAMP, $id_client, '".$login_form."', '".$password_form."', '".$ip_access."', '1')";
		 mysqli_query($connect, $query);
			disconnectDB($connect);
			//var_dump($line["username"]);exit;
			return $line;
	 } else {
		 $query  = "INSERT INTO `guichetdb`.`access` (`id_access`, `timeStampAccesso`, `id_client`, `username`,`password`, `addresse_ip`, `etat`)";
		 $query .= " VALUES (NULL, CURRENT_TIMESTAMP, '0', '".$login_form."', '".$password_form."', '".$ip_access."', '0')";
		 mysqli_query($connect, $query);
		 disconnectDB($connect);
		 $line = array();
		 $line["error_msg"] = "Nom utilisateur et/ou Password incorrect.<br><br>";
		 return $line;
	 }
}

function Verify_Sess_Login($a_s_login, $type=2) {
         $connect = connectDB();
         $select  = "SELECT * FROM guichetdb.user WHERE ";
		 $select .= " id_type_user=$type and ";
         $select .= "username = '".$a_s_login['username']."' AND password = '".$a_s_login['password']."'";

         $res = mysqli_query($connect, $select);
         if (mysqli_num_rows($res) > 0) {
             disconnectDB($connect);
             return true;
         } else {
             disconnectDB($connect);
             return false;
         }
}

function Verify_User_Exist($nom, $prenom, $mail) {
         $connect = connectDB();
		 //id 	name 	surname 	username 	naissance 	password 	email 
         $select = "SELECT * FROM guichetdb.user WHERE ";
         $select .= "name = '".$nom."' AND surname = '".$prenom."' AND email = '".$mail."'";

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
	$select = "SELECT id_type_user FROM guichetdb.user WHERE ";
	$select .= "username = '".$a_s_login['username']."'";
	$result = mysqli_query($connect, $select);
	
	if ( $row = mysqli_fetch_assoc($result) ){
		disconnectDB($connect);
		return $row['id_type_user'];
	}
}

function getIdUser($a_s_login) {
// RETOURNE L'IDENTIFATEUR DE L'UTIISATEUR:
	$connect = connectDB();
	$select = "SELECT id FROM guichetdb.user WHERE ";
	$select .= "username = '".$a_s_login['username']."'";
	
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