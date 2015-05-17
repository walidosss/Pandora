
function initialize() {

  var latLngArezzo = new google.maps.LatLng(36.8, 10.2);
  var opzioni = {
          center: latLngArezzo,
          zoom: 10,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };

  var map=new google.maps.Map(document.getElementById('map'), opzioni);
  var marker = new google.maps.Marker({position: latLngArezzo, map: map, title: 'Tunis' });
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

        var point = new google.maps.LatLng(36.8092364, 10.1344043);
        var opzioni = {
                center: point,
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP
        };


        var contentString = '<font face="Arial"size="2"><b>Bureau Bardo</b><br>'+
                'Lat. 36.8092364 N <br>'+
                'Long. 10.1344043 E <br>'+
				'Info. Tel: 71 505 099, Fax: 71 223 328 <br>'+
				'Email. Email: apc.bardo@poste.tn</font></a><br>'+
				'<a href="index.php?page=calendrier&idb=1">Effectuer Reservation</a><br></font>';

        var infowindow1 = new google.maps.InfoWindow({
                content: contentString
        });
        var marker1 = new google.maps.Marker({position: point, map: map, title: 'Bureau Poste Bardo', icon: image });
        google.maps.event.addListener(marker1, "click", function() {
                infowindow1.open(map,marker1);
        });

        var point = new google.maps.LatLng(36.801334, 10.16719);
        var opzioni = {
                center: point,
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP
        };


        var contentString = '<font face="Arial"size="2"><b>Bureau Tunis Hafsia</b><br>'+
                'Lat. 36.801334 N <br>'+
                'Long. 10.16719 E <br>'+
				'Info. Tel: 71 572 072, Fax: 71 569 947 <br>'+
				'Email. Email: apc.elhafsia@poste.tn</font></a><br>'+
				'<a href="index.php?page=calendrier&idb=2">Effectuer Reservation</a><br></font>';

        var infowindow2 = new google.maps.InfoWindow({
                content: contentString
        });
        var marker2 = new google.maps.Marker({position: point, map: map, title: 'Bureau Poste Tunis Hafsia', icon: image });
        google.maps.event.addListener(marker2, "click", function() {
                infowindow2.open(map,marker2);
        });

        var point = new google.maps.LatLng(36.85992, 10.15560);
        var opzioni = {
                center: point,
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP
        };


        var contentString = '<font face="Arial"size="2"><b>Bureau Enaser</b><br>'+
                'Lat. 36.8599231 <br>'+
                'Long. 10.1556006 <br>'+
				'Info. Tel: 70 854 033, Fax: 70 854 034 <br>'+
				'Email. </font></a><br>'+
				'<a href="index.php?page=calendrier&idb=39">Effectuer Reservation</a><br></font>';

        var infowindow3 = new google.maps.InfoWindow({
                content: contentString
        });
        var marker3 = new google.maps.Marker({position: point, map: map, title: 'Bureau Poste Enaser', icon: image });
        google.maps.event.addListener(marker3, "click", function() {
                infowindow3.open(map,marker3);
        });

        var point = new google.maps.LatLng(36.84959, 10.21031);
        var opzioni = {
                center: point,
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP
        };


        var contentString = '<font face="Arial"size="2"><b>Bureau Tunis Carthage</b><br>'+
                'Lat. 36.8495971 <br>'+
                'Long. 10.2103195 <br>'+
				'Info. Tel:71 940 578, Fax: 71 940 578 <br>'+
				'Email. apc.tuniscarthage@poste.tn</font></a><br>'+
				'<a href="index.php?page=calendrier&idb=40">Effectuer Reservation</a><br></font>';

        var infowindow4 = new google.maps.InfoWindow({
                content: contentString
        });
        var marker4 = new google.maps.Marker({position: point, map: map, title: 'Bureau Poste Tunis Carthage', icon: image });
        google.maps.event.addListener(marker4, "click", function() {
                infowindow4.open(map,marker4);
        });
  var markers = [];

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
  }
