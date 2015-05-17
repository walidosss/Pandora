<?php
session_start();

if ( isset($_GET['idb']) && !empty($_GET['idb'])) {
	$id_bureau = trim($_GET['idb']);
} else {
	$id_bureau = 0;
}
$id_c = $_SESSION['S_LOGIN'] ["id"];

// List of events
 $json = array();

 // Query that retrieves events
 //$requete = "SELECT * FROM evenement where id_bureau=$id_bureau and id_client=$id_c ORDER BY id";
 $requete  = "SELECT *, s.nom_service as title, s.couleur as color ";
 $requete .= ", e.`debut` as `start`, e.`fin` as `end`, e.`jour_entier` as `allDay` FROM `evenement` e";
 $requete .= " JOIN `service` s ON e.id_service=s.id_service and e.id_client=$id_c ";
 if ($id_bureau > 0 ) {
	 $requete .= " and id_bureau=$id_bureau ";
 }
 $requete .= "ORDER BY id";

 // connection to the database
 try {
 $bdd = new PDO('mysql:host=localhost;dbname=guichetdb', 'user_db', 'bobo');
 } catch(Exception $e) {
  exit('Unable to connect to database.');
 }
 // Execute the query
 $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));

 // sending the encoded result to success page
 echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));

?>