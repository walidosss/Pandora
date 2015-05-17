<?php
// Values received via ajax
$id_service = $_POST['ids'];
$id_client = $_POST['idc'];
$start = $_POST['start'];
$end = $_POST['end'];
$url = $_POST['url'];
$idb = $_POST['idb'];
// connection to the database

try {
$bdd = new PDO('mysql:host=localhost;dbname=guichetdb', 'user_db', 'bobo');
} catch(Exception $e) {
exit('Unable to connect to database.');
}

// insert the records
//`id`,`id_client`,`start`,`end`,`url`,`allDay`,`id_bureau`,`id_service`
$sql = "INSERT INTO `evenement` (id_client, `debut`, `fin`, url, id_bureau,id_service) VALUES (:id_client, :start, :end, :url, :idb, :ids)";
$q = $bdd->prepare($sql);
$q->execute(array(':id_client'=>$id_client, ':start'=>$start, ':end'=>$end,  ':url'=>$url,  ':idb'=>$idb,  ':ids'=>$id_service));
 // sending the encoded result to success page
$myId = $bdd->lastInsertId();
echo json_encode( $myId );
?>