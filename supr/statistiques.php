<?php
session_start();

include_once("../set/setdb.php");
include_once("../set/verify_login.php");

if (isset($_SESSION["S_LOGIN"]) && !empty($_SESSION["S_LOGIN"])) {
	//echo "A";
	$array_s_login = $_SESSION["S_LOGIN"];
//var_dump($_SESSION);
	$errore = "";
	if (isset($line["error_msg"])) $errore = $line["error_msg"];
	
    if (Verify_Sess_Login($array_s_login, 1) && empty($errore)) {
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
     <?php include_once 'head.php'; ?> 
    <body>
    <?php include_once 'header.php'; ?>

    <div id="wrapper">

        <?php include_once 'sidebar.php'; ?>
        <?php include_once 'stats.php'; ?>

        
    
    </div><!-- End #wrapper -->
    
    <!-- Le javascript
    ================================================== -->
    <?php include_once 'script.php'; ?>
	
<script>
	
	// document ready function
$(document).ready(function() {

	var divElement = $('div'); //log all div elements
<?php 
$connect = connectDB();
$select  = "SELECT count(*) as nb, Nom ";
$select .= "FROM `evenement` e join bureau b on e.id_bureau=b.ID ";
$select .= "group by Nom";
$res = mysqli_query($connect, $select);
disconnectDB($connect);
?>
	//Donut simple chart
    if (divElement.hasClass('simple-donut')) {
	$(function () {
		var data = [
<?php
$str='';
$i = 0;
$arrayColors = array('#88bbc8', '#ed7a53', '#9FC569', '#bbdce3', '#9a3b1b', '#5a8022', '#2c7282');
while ($line = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
	$str .= "{ label: '".$line['Nom']."',  data: ".$line['nb'].", color: '".$arrayColors[$i]."'},";
	$i++;
}
if (strlen($str) > 0) $strr = substr($str, 0, -1); 
echo $str;


?>
/*		    { label: "USA",  data: 38, color: "#88bbc8"},
		    { label: "Brazil",  data: 23, color: "#ed7a53"},
		    { label: "India",  data: 15, color: "#9FC569"},
		    { label: "Turkey",  data: 9, color: "#bbdce3"},
		    { label: "France",  data: 7, color: "#9a3b1b"},
		    { label: "Chinaa",  data: 5, color: "#5a8022"},
		    { label: "Germany",  data: 3, color: "#2c7282"}*/
		];

	    $.plot($(".simple-donut"), data, 
		{
			series: {
				pie: { 
					show: true,
					innerRadius: 0.4,
					highlight: {
						opacity: 0.1
					},
					radius: 1,
					stroke: {
						color: '#fff',
						width: 8
					},
					startAngle: 2,
				    combine: {
	                    color: '#353535',
	                    threshold: 0.05
	                },
	                label: {
	                    show: true,
	                    radius: 1,
	                    formatter: function(label, series){
	                        return '<div class="pie-chart-label">'+label+'&nbsp;'+Math.round(series.percent)+'%</div>';
	                    }
	                }
				},
				grow: {	active: false}
			},
			legend:{show:false},
			grid: {
	            hoverable: true,
	            clickable: true
	        },
	        tooltip: false,//true, //activate tooltip
			tooltipOpts: {
				content: "%s : %y.1"+"%",
				shifts: {
					x: -30,
					y: -50
				}
			}
		});
	});
	}//end if

<?php 
$connect = connectDB();
$select  = "SELECT count(*) as ns, nom_service ";
$select .= "FROM `evenement` e join service s on e.id_service=s.id_service ";
$select .= "group by nom_service";
$res = mysqli_query($connect, $select);
disconnectDB($connect);
?>
	//Pie simple chart
    if (divElement.hasClass('simple-pie')) {
	$(function () {
		var chartColours = ['#88bbc8', '#ed7a53', '#9FC569', '#bbdce3', '#9a3b1b', '#5a8022', '#2c7282'];
		var data = [
<?php
$str='';
$i = 0;
//$arrayColors = array('#88bbc8', '#ed7a53', '#9FC569', '#bbdce3', '#9a3b1b', '#5a8022', '#2c7282');
while ($line = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
	$str .= "{ label: '".$line['nom_service']."',  data: ".$line['ns'].", color: '".$arrayColors[$i]."'},";
	$i++;
}
if (strlen($str) > 0) $str = substr($str, 0, -1); 
echo $str;


?>
		    /*{ label: "USAA",  data: 38, color: "#88bbc8"},
		    { label: "Brazil",  data: 23, color: "#ed7a53"},
		    { label: "India",  data: 15, color: "#9FC569"},
		    { label: "Turkey",  data: 9, color: "#bbdce3"},
		    { label: "France",  data: 7, color: "#9a3b1b"},
		    { label: "China",  data: 5, color: "#5a8022"},
		    { label: "Germany",  data: 3, color: "#2c7282"}*/
		];

	    $.plot($(".simple-pie"), data, 
		{
			series: {
				pie: { 
					show: true,
					highlight: {
						opacity: 0.1
					},
					radius: 1,
					stroke: {
						color: '#fff',
						width: 2
					},
					startAngle: 2,
				    combine: {
	                    color: '#353535',
	                    threshold: 0.05
	                },
	                label: {
	                    show: true,
	                    radius: 1,
	                    formatter: function(label, series){
	                        return '<div class="pie-chart-label">'+label+'&nbsp;'+Math.round(series.percent)+'%</div>';
	                    }
	                }
				},
				grow: {	active: false}
			},
			legend:{show:false},
			grid: {
	            hoverable: true,
	            clickable: true
	        },
	        tooltip: false, //true, //activate tooltip
			tooltipOpts: {
				content: "%s : %y.1"+"%",
				shifts: {
					x: -30,
					y: -50
				}
			}
		});
	});
	}//end if

});
</script>


    </body>
</html>

<?php
	} else {
		header("Location: index.php");
		exit;
	}
		
} else {
	header("Location: index.php");
	exit;
}
?>