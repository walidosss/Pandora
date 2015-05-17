<?php
include_once("../../../set/setdb.php");

/* Values received via ajax */
$id = $_POST['id'];
$ids = $_POST['ids'];
$idc = $_POST['idc'];
$idb = $_POST['idb'];
$start = $_POST['start'];
$end = $_POST['end'];

$query  = "SELECT *, `debut` as `start`, `fin as` `end`, `jour_entier` as `allDay` ";
$query .= "FROM `evenement` where id_bureau=$idb";//" and id_client!=$idc";
$query .= " and `debut`='".$start."' and `fin`='".$end."'";
$connect = connectDB();
$res = mysqli_query($connect, $query);
//$nrows = mysqli_num_rows($res);
disconnectDB($connect);

if ( !$res || !mysqli_num_rows($res) ) {
	// connection to the database
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=guichetdb', 'user_db', 'bobo');
	} catch(Exception $e) {
		exit('Unable to connect to database.');
	}
	// update the records
	$sql = "UPDATE evenement SET id_service=?, id_client=?, id_bureau=?, `debut`=?, `fin`=? WHERE id=?";
	// id_client 	start 	end 	url 	allDay 	id_bureau 	id_service 
	$q = $bdd->prepare($sql);
	$q->execute(array($ids,$idc,$idb,$start,$end,$id));
} else {
	 echo json_encode("existe");
}
?>