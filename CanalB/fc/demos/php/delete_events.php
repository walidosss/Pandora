<?php

/* Values received via ajax */
$id = intval($_POST['id']);

// connection to the database
try {
 $bdd = new PDO('mysql:host=localhost;dbname=guichetdb', 'user_db', 'bobo');
 } catch(Exception $e) {
exit('Unable to connect to database.');
}
 // delete the records
$sql = "delete from `evenement` WHERE id= :id";
$q = $bdd->prepare($sql);
//$q->execute(array($id));
//$q->execute(array(':id'=>$id));
$q->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
$q->execute();
?>