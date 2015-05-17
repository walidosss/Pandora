<!--script src="https://maps.googleapis.com/maps/api/js"></script>

<script language="javascript" src="js/testin.js"></script-->

<style>
      #map {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
      .controls {
        margin-top: 16px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

	  #target {
        width: 345px;
      }
    </style>
	
<div id="container">
<br>
	<input id="pac-input" class="controls" type="text" placeholder="chercher">
	<div id="map" style="width: 750px; height: 500px;"></div>
	<br>
	<div id="maposition"></div>
</div>

<script>

// Position par défaut
var centerpos = new google.maps.LatLng(48.579400,7.7519);

// Ansi que des options pour la carte, centrée sur latlng
var optionsGmaps = {
	center:centerpos,
	navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
	mapTypeId: google.maps.MapTypeId.ROADMAP,
	zoom: 15
};

// Initialisation de la carte avec les options
var map = new google.maps.Map(document.getElementById("map"), optionsGmaps);

if(navigator.geolocation) {

	// Fonction de callback en cas de succès
	function affichePosition(position) {
	
		var infopos = "Position déterminée : <br>";
		infopos += "Latitude : "+position.coords.latitude +"<br>";
		infopos += "Longitude: "+position.coords.longitude+"<br>";
		document.getElementById("maposition").innerHTML = infopos;

		// On instancie un nouvel objet LatLng pour Google Maps
		var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

		// Ajout d'un marqueur à la position trouvée
		var marker = new google.maps.Marker({
			position: latlng,
			map: map,
			title:"Vous êtes ici"
		});
		
		map.panTo(latlng);

	}

	// Fonction de callback en cas d’erreur
	function erreurPosition(error) {
		var info = "Erreur lors de la géolocalisation : ";
		switch(error.code) {
		case error.TIMEOUT:
			info += "Timeout !";
		break;
		case error.PERMISSION_DENIED:
			info += "Vous n’avez pas donné la permission";
		break;
		case error.POSITION_UNAVAILABLE:
			info += "La position n’a pu être déterminée";
		break;
		case error.UNKNOWN_ERROR:
			info += "Erreur inconnue";
		break;
		}
		document.getElementById("maposition").innerHTML = info;
	}

	navigator.geolocation.getCurrentPosition(affichePosition,erreurPosition);

} else {

	alert("Ce navigateur ne supporte pas la géolocalisation");

}


<?php
include_once("set/setdb.php");
include_once("set/verify_login.php");

$connect = connectDB();
$query  = "SELECT * FROM bureau";
$resP = mysqli_query($connect, $query) or die("Query fallita: " . mysqli_error($connect) );

$myFile = getcwd()."/js/testin.js";
$file=fopen($myFile,"w") or exit("Unable to open file!".$myFile);
$corpo="
function initialize() {

  var latLngTunis = new google.maps.LatLng(36.8, 10.2);
  var opzioni = {
          center: latLngTunis,
          zoom: 10,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };

  var map=new google.maps.Map(document.getElementById('map'), opzioni);
  var marker = new google.maps.Marker({position: latLngTunis, map: map, title: 'Tunis' });
  var image = 'images/marker_small_verde.png';

  var image = {
    url: 'images/marker_small_verde.png',
    // This marker is 20 pixels wide by 32 pixels tall.
    size: new google.maps.Size(50, 50),
    // The origin for this image is 0,0.
    origin: new google.maps.Point(0,0),
    // The anchor for this image is the base of the flagpole at 0,32.
    anchor: new google.maps.Point(5, 1)
  };
";
$i=0;
$loop = "";
while ($dati = mysqli_fetch_array($resP, MYSQLI_ASSOC)) {
        $i++;
        $loop.= '
        var point = new google.maps.LatLng('.substr($dati['Lattitude'], 0, - 2).', '.substr($dati['Longitude'], 0, - 2).');
        var opzioni = {
                center: point,
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP
        };


        var contentString = \'<font face="Arial"size="2"><b>Bureau '.$dati["Nom"].'</b><br>\'+
                \'Lat. '.$dati["Lattitude"].' <br>\'+
                \'Long. '.$dati["Longitude"].' <br>\'+
				\'Info. '.trim($dati["Reference"]).' <br>\'+
				\'Email. '.$dati["Note"].'</font></a><br>\'+
				\'<a href="index.php?page=calendrier&idb='.$dati["ID"].'">Effectuer Reservation</a><br></font>\';

        var infowindow'.$i.' = new google.maps.InfoWindow({
                content: contentString
        });
        var marker'.$i.' = new google.maps.Marker({position: point, map: map, title: \'Bureau Poste '.$dati["Nom"].'\', icon: image });
        google.maps.event.addListener(marker'.$i.', "click", function() {
                infowindow'.$i.'.open(map,marker'.$i.');
        });
';

}
$corpo.= $loop;
$corpo.="  var markers = [];

  // Create the search box and link it to the UI element.
  var input = (// @type {HTMLInputElement} 
      document.getElementById('pac-input'));
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  var searchBox = new google.maps.places.SearchBox(
    // @type {HTMLInputElement} 
	(input));
	  // [START region_getplaces]
  // Listen for the event fired when the user selects an item from the
  // pick list. Retrieve the matching places for that item.
  google.maps.event.addListener(searchBox, 'places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }
    for (var i = 0, marker; marker = markers[i]; i++) {
      marker.setMap(null);
    }
	    // For each place, get the icon, place name, and location.
    markers = [];
    var bounds = new google.maps.LatLngBounds();
    for (var i = 0, place; place = places[i]; i++) {
      var image = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      // Create a marker for each place.
      var marker = new google.maps.Marker({
        map: map,
        icon: image,
        title: place.name,
        position: place.geometry.location
      });

      markers.push(marker);

      bounds.extend(place.geometry.location);
    }

    map.fitBounds(bounds);
  });
  // [END region_getplaces]

  // Bias the SearchBox results towards places that are within the bounds of the
  // current map's viewport.
  google.maps.event.addListener(map, 'bounds_changed', function() {
    var bounds = map.getBounds();
    searchBox.setBounds(bounds);
  });
  ";
$corpo.= '}';

fwrite($file, $corpo."\n");
fclose($file);

mysqli_free_result($resP);
disconnectDB($connect);
?>
initialize();
</script>
