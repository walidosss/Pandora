<html>
<head>
	<link rel="stylesheet" href="mapit/style.css" type="text/css" media="all" /> 

	<!-- ==============================================
	REQUIRED FOR MAPIT. -->
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css" id="mapitcss" media="screen" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="mapit/source/jquery.mapit.css" type="text/css" media="all" /> 
	<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script-->
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<!--script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script-->
	<script type="text/javascript" src="mapit/source/jquery.mapit.js" id="mapit-source"></script>
    <script type="text/javascript" src="mapit/source/jquery.mapit.json.js"></script>
	<!-- ============================================== -->
	
	<script type="text/javascript" src="mapit/script.js"></script>

	<style type="text/css">
		/*OVERVIEW: To overide the base mapit.css  make 
		sure your style block is below the mapit.css link*/
		 
		/*MAIN CONTENT: Set plugin size and hide info bar */
		.mapit-content {height:450px !important}
		.mapit-map-content {width:75% !important; height:450px !important}
	
		/*NAVIGATION BAR: Change header and font size */
		.mapit-navigation {width:25% !important; height:450px !important}
		.mapit-accordion-link {font-size:14px !important;}
		.mapit-accordion-link-sublink {font-size:12px !important;}
		.mapit-accordion .ui-accordion-header a {font-size:14px !important;}
	</style>
</head>
<body>
	<div class="content">
	
		<!-- ==============================================
		REQUIRED FOR MAPIT. -->
		<div id="map"></div><br /><br />
		<script type="text/javascript">

		    var jsonData = {
		        getGategoriesMethod: null, /* Use this if calling a webservice to get the json. EG: function loadFromWebService(onCompleted) { jQuery.ajax(url:null, success:onCompleted); } */
		        templates: [
                    {
                        id: "simpleTemplate",
                        tabs: [
                            {
                                name: "Name",
                                html: "Store Name: {{name}}"
                            },
                            {
                                name: "Address",
                                html: "{{address}}<br/>{{city}}, {{state}} {{zip}}"
                            }
                        ]
                    }
		        ],
				
		        categories: [
<?php
include_once("set/setdb.php");
include_once("set/verify_login.php");

$connect = connectDB();
$query  = "SELECT * FROM bureau";
$resP = mysqli_query($connect, $query) or die("Problème lors de l'exécution de la requete sql: " . mysqli_error($connect) );
$str = "";
while ($dati = mysqli_fetch_array($resP, MYSQLI_ASSOC)) {
	$lat = substr($dati['Lattitude'], 0, - 2);
	$long = substr($dati['Longitude'], 0, - 2);
	$nom = $dati["Nom"];
	$addresse = $dati["Rue"];
	$cite = $dati["Cite"];
	$province = $dati["Province"];
	$str .= "{";
	$str .= "					\"name\": \"$nom\",";
    $str .= "                    locations: [ ";
    $str .= "                        { ";
    $str .= "                            name: \"$nom\", ";
    $str .= "                            coordinates: \"$lat,$long\", ";
    $str .= "                            address: \"$addresse\", ";
    $str .= "                            city: \"Anchorage\", ";
    $str .= "                            state: \"$cite\", ";
    $str .= "                            zip: \"$province\" ";
    $str .= "                        } ";
    $str .= "                    ] ";
	$str .= "},";

}
$str = substr($str,0,-1);
echo $str;
?>
/*
                    {
                        name: "Alabama",
                        isDefault: true,
                        locations: [
                            {
                                name: "The Summit",
                                //coordinates: "33.454306,-86.730687",
								coordinates: "36.8, 10.2",
                                address: "217 Summit Blvd. Space F1",
                                city: "Birmingham",
                                state: "AL",
                                zip: "35243"
                            },
                            {
                                name: "Bridge Street",
                                coordinates: "34.76699,-86.598993",
                                address: "320 The Bridge Street",
                                city: "Huntsville",
                                state: "AL",
                                zip: "35806"
                            }
                        ]
                    },
                    {
                        name: "Alaska",
                        locations: [
                            {
                                name: "Anchorage 5th Avenue Mall",
                                coordinates: "61.217355,-149.887530",
                                address: "320 West 5th Avenue",
                                city: "Anchorage",
                                state: "AK",
                                zip: "99501"
                            }
                        ]
                    },
		            {
                        name: "Arizona",
                        locations: [
                            {
                                name: "Arrowhead",
                                coordinates: "33.643698,-112.221686",
                                address: "7700 West Arrowhead Towne Center",
                                city: "Glendale",
                                state: "AZ",
                                zip: "85308"
                            },
                            {
                                name: "Biltmore",
                                coordinates: "33.509319,-112.028014",
                                address: "2502 East Camelback Rd.",
                                city: "Phoenix",
                                state: "AZ",
                                zip: "85016"
                            },
                            {
                                name: "Chandler Fashion Center",
                                coordinates: "33.305777,-111.895656",
                                address: "3111 W Chandler Blvd.",
                                city: "Chandler",
                                state: "AZ",
                                zip: "85226"
                            },
                            {
                                name: "La Encantada",
                                coordinates: "32.322399,-110.928998",
                                address: "2905 East Skyline Drive",
                                city: "Tucson",
                                state: "AZ",
                                zip: "85718"
                            },
                            {
                                name: "SanTan Village",
                                coordinates: "33.306660,-111.751958",
                                address: "2218 E. Williams Field Rd.",
                                city: "Gilbert",
                                state: "AZ",
                                zip: "85295"
                            },
                            {
                                name: "Scottsdale Quarter",
                                coordinates: "33.623987,-111.926168",
                                address: "15169 North Scottsdale Road",
                                city: "Scottsdale",
                                state: "AZ",
                                zip: "85254",
                                bubbleTemplateId: "simpleTemplate",
                                detailTemplateId: "simpleTemplate"
                            }
                        ]
		            },
                    {
                        name: "Arkansas",
                        locations: [
                            {
                                name: "The Promenade at Chenal",
                                coordinates: "34.776924,-92.464114",
                                address: "17711 Chenal Parkway",
                                city: "Little Rock",
                                state: "AR",
                                zip: "72223"
                            }
                        ]
                    }
*/
		        ]
		    };

		    jQuery(document).ready(function ()
		    {
		        jQuery("#map").mapit(
				{
				    title: "Liste des bureaux plus proches",
				    zoomLevel: 10,
				    //startCoordinates: "33.471545,-111.956177",
					startCoordinates: "36.8, 10.2",
				    mapType: google.maps.MapTypeId.ROADMAP,
				    dataSource: mapit.jsonDataSource,
				    dataSourceOptions: jsonData
				});
		    });
		</script>
	</div>

		
</body>
</html>