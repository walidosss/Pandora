<?php

function connectDB() {
	$connect = mysqli_connect("127.0.0.1","user_db", "bobo","guichetdb") or ErroreDB(); 
    return $connect;
}

function ErroreDB(){
     echo "<p> Il y' a des probl&egrave;mes de connexion. </p>";
     echo "<p> On s'excuse pour l'inconvenient r&eacute;essayez plutard. </p>";
     echo "<p> Si le probl&egrave;me persiste contacter - web.support@poste.tn </p>";
     exit();
}

function disconnectDB($link) {
      mysqli_close($link);
}
?>