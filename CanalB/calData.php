<?php

$idb = 0;

if (isset($_GET['idb']) && !empty($_GET['idb'])) {
	$idb = $_GET['idb'];
}
?>

<script>

$(document).ready(function() {	
	var currentLangCode = 'fr';//'ar';
    var calendar = $('#myCalendar').fullCalendar({
		//isRTL: true,
		theme: true,
		timeFormat: 'H(:mm)', // uppercase H for 24-hour clock
		scrollTime: '07:00:00',
		minTime: '08:00:00',
		maxTime: '18:00:00',
		forceEventDuration: true,
		defaultTimedEventDuration: '00:10:00',
		slotDuration: '00:10:00',
		eventDurationEditable: false,
		header: {
		   left: 'prev,next today',
		   center: 'title',
		   right: 'month,agendaWeek,agendaDay'
		},
		lang: currentLangCode,
		defaultView: 'agendaWeek',
		editable: true,
		selectable: true,
		selectHelper: true,
		events: "fc/demos/php/events.php?idb=<?php echo $idb;?>",
		droppable: true, // this allows things to be dropped onto the calendar
		select: function(start, end, allDay) {
			var now = moment();
			if (now < start) {
				//alert('Maintenant: '+now+', Selection:'+start);
				var starttime = moment(start).format("YYYY-MM-DD HH:mm");
				var endtime = moment(end).format("YYYY-MM-DD HH:mm");
				var mywhen = starttime + ' - ' + endtime;
				$('#createEventModal #apptStartTime').val(starttime);
				$('#createEventModal #apptEndTime').val(endtime);
				$('#createEventModal #apptAllDay').val(allDay);
				$('#createEventModal').modal('show');
			} else {
			   alert('Attention ! La réservation antérieure n\'est pas permise !');
			   $('#myCalendar').fullCalendar('unselect');
			}
		},
		eventDrop: function(event, delta) {
			var start = moment(event.start).format("YYYY-MM-DD HH:mm");
			var end = moment(event.end).format("YYYY-MM-DD HH:mm");

			var url=null;
			console.log(event.id_service);
			console.log(event.id);
			console.log(event.start);
			console.log(event.end);
			console.log(event.id_client);
			console.log(event.id_bureau);
			var ids= event.id_service;
			var idc= event.id_client;
			var ide= event.id;
			var idb = event.id_bureau;

			$.ajax({
				url: 'fc/demos/php/update_events.php',
				data: 'start='+ start +'&end='+ end +'&id='+ ide+'&ids='+ids+'&idc='+idc+'&idb='+idb ,
				type: "POST",
				success: function(json) {
					//alert(json);
					if (json.indexOf("existe") >= 0) alert("Changement incorrect");
					else alert("Changement effectué");
					$("#myCalendar").fullCalendar( 'refetchEvents' );
				}
			});
		},
		eventResize: function(event) {
			var start = moment(event.start).format("YYYY-MM-DD HH:mm");
			var end = moment(event.end).format("YYYY-MM-DD HH:mm");

			var url=null;
			console.log(event.id_service);
			console.log(event.id);
			console.log(event.start);
			console.log(event.end);
			console.log(event.id_client);
			console.log(event.id_bureau);
			var ids= event.id_service;
			var idc= event.id_client;
			var ide= event.id;
			var idb= event.id_bureau;

			$.ajax({
				url: 'fc/demos/php/update_events.php',
				data: 'start='+ start +'&end='+ end +'&id='+ ide+'&ids='+ids+'&idc='+idc+'&idb='+idb ,
				type: "POST",
				success: function(json) {
					if (json.indexOf("existe") >= 0) alert("Changement incorrect");
					else alert("Changement effectué");
					$("#myCalendar").fullCalendar( 'refetchEvents' );
				}
			});
		},
		eventClick: function(calEvent, jsEvent, view) {

			var now = moment();
			if (now < calEvent.start) {
				//alert('Maintenant: '+now+', Selection:'+calEvent.start);
				$('#modalTitle').html(calEvent.title);
				$('#eventUrl').attr('href',calEvent.url);
				$('#eventContent #idEvent_m').val(calEvent.id);
				$('#eventContent #apptStartTime_m').val(moment(calEvent.start).format('YYYY-MM-DD HH:mm'));
				$('#eventContent #apptEndTime_m').val(moment(calEvent.end).format('YYYY-MM-DD HH:mm'));
				$('#eventContent').modal();
				$('#nom_service_m').val(calEvent.id_service);
				console.log(calEvent.id_service);
			} else {
			   alert('Attention ! La modification antérieure n\'est pas permise !');
			}
		},
		eventRender: function(event, element) { 
			element.on('click', function (e) {
				e.preventDefault();
			});
		}
    });

	$('#submitButton').on('click', function(e){
		e.preventDefault();
		doSubmit();
	});
	
	$('#modifyButton').on('click', function(e){
		e.preventDefault();
		doModif();
	});
	
	$('#AnnResv').on('click', function(e){
		e.preventDefault();
		AnnReserv();
	});

	function AnnReserv(){
		$("#eventContent").modal('hide');
		var idEvent= $('#idEvent_m').val();
		$.ajax({
			url: 'fc/demos/php/delete_events.php',
			data: 'id='+ idEvent ,
			type: "POST",
			success: function(json) {
				$('#myCalendar').fullCalendar('removeEvents',idEvent);
			}
		});	
	}
	
	function doSubmit(){
		$("#createEventModal").modal('hide');
		console.log($('#apptStartTime').val());
		console.log($('#apptEndTime').val());
		console.log($('#apptAllDay').val());
		//var title= $('#clientName').val();
		var start= $('#apptStartTime').val();
		var end= $('#apptEndTime').val();
		var url=null;
		var ids= $('#nom_service').val();
		var idc= $('#id_client').val();
		
		var idb=$('#birou').val();
		
		if (idb==0) {
			alert("Attention aucun bureau selectionné !");
		} else {
			$.ajax({
				url: 'fc/demos/php/add_events.php',
				//data: 'idc='+ idc+'&start='+ start +'&end='+ end +'&url='+ url +'&idb=<?php echo $idb;?>'+'&ids='+ids,
				data: 'idc='+ idc+'&start='+ start +'&end='+ end +'&url='+ url +'&idb='+idb+'&ids='+ids,
				type: "POST",
				success: function(json) {
					$("#myCalendar").fullCalendar( 'refetchEvents' );
				}
			});
			$('#myCalendar').fullCalendar('unselect');
		}
	}
	
	function doModif(){
		$("#eventContent").modal('hide');
		console.log($('#idEvent_m').val());
		console.log($('#nom_service_m').val());

		var ids= $('#nom_service_m').val();
		var idc= $('#id_client_m').val();
		var ide= $('#idEvent_m').val();
		
		var start= $('#apptStartTime_m').val();
		var end= $('#apptEndTime_m').val();
		
		var idb=$('#birou').val();
		
		if (idb==0) {
			alert("Attention aucun bureau selectionné !");
		} else {
			$.ajax({
				url: 'fc/demos/php/update_events.php',
				//data: 'start='+ start +'&end='+ end +'&id='+ ide+'&ids='+ids+'&idc='+idc+'&idb=<?php echo $idb;?>' ,
				data: 'start='+ start +'&end='+ end +'&id='+ ide+'&ids='+ids+'&idc='+idc+'&idb='+idb ,
				type: "POST",
				success: function(json) {
					alert("Changement effectué");
					$("#myCalendar").fullCalendar( 'refetchEvents' );
				}
			});
		}
	}
		
});
</script>

<div class="modal fade" id="eventContent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modifier Rendez Vous</h4>
      </div>
      <div class="modal-body">
        <form id="ModifyAppointmentForm" class="form-horizontal">
	        <div class="form-group">
	            <label class="control-label col-sm-2" for="nom_service_m">Service:</label>
	            <div class="controls col-sm-10">
	                <div class="col-md-4 col-md-offset-4">
					<select class="form-control" id="nom_service_m" name ="nom_service_m">
					<?php 
					$id_client = $_SESSION["S_LOGIN"]["id"];
					$query ="SELECT * FROM `service` ";
					$connect = connectDB();
					$res = mysqli_query($connect, $query);
					while ($row = mysqli_fetch_array($res, MYSQL_ASSOC)) {
						$id_s = $row['id_service'];
						$nom_s = $row['nom_service'];
						echo "<option value='".$id_s."'>".$nom_s."</option>";
					}
					disconnectDB($connect);
					?>
					</select>
					<br>
					</div>
					<input type="hidden" id="id_client_m" value="<?php echo $id_client;?>"/>
					<input type="hidden" id="idEvent_m"/>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-2" for="apptStartTime_m">Date Début:</label>
					<div class="controls col-sm-10">
						<div class="col-md-4 col-md-offset-4">
							<input type="text" id="apptStartTime_m" readonly/>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="apptEndTime_m">Date Fin:</label>
					<div class="controls col-sm-10">
						<div class="col-md-4 col-md-offset-4">
							<input type="text" id="apptEndTime_m" readonly/>
						</div>
					</div>
				</div>				
			</div>
	    </form>
      </div>
      <div class="modal-footer">
	    <button type="button" class="btn btn-default" id="AnnResv">Supprimer Réservation</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" id="modifyButton">Confirmer</button>
      </div>
    </div>
  </div>
</div>
	
<div class="row">
	<div class='col-sm-3'>
		<div class="form-group">
			<div class='input-group date' id='datetimepicker1'>
				<input type='text' class="form-control" />
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
			</div>
		</div>
	</div>
	
	<div class="col-md-4 col-md-offset-4">
		<select class="form-control" id="birou">
		  <option value='0'>selectionner un bureau</option>
		  <?php
			$query ="SELECT * FROM `bureau` ";
			$connect = connectDB();
			$res = mysqli_query($connect, $query);
			while ($row = mysqli_fetch_array($res, MYSQL_ASSOC)) {
				$id_b = $row['ID'];
				$nom_b = $row['Nom'];
				$selected = ($idb == $id_b)?" selected":"";
				echo "<option value='".$id_b."' ".$selected.">".$nom_b."</option>";
			}
			disconnectDB($connect);
			?>
		</select>
	</div>
	<script type="text/javascript">
		$(function () {
			$('#datetimepicker1').datetimepicker();
			$('#datetimepicker1').data("DateTimePicker").locale('fr');
			$("#datetimepicker1").on("dp.change", function(e) {
				var md = $("#datetimepicker1").data('date');
				var d = new Date(md.substr(6, 4), md.substr(3, 2)-1, md.substr(0, 2), md.substr(11, 2), md.substr(14, 2));
				$('#myCalendar').fullCalendar('gotoDate', d);
	        });
			
			$( "#birou" ).change(function() {
				//var myB = $( "select.foo" ).val();
				//alert ($(this).find(":selected").val());
				var url = 'index.php?page=calendrier&idb='+$(this).find(":selected").val();
				$(location).attr('href',url);
			});
		});
		
	</script>
</div>

<div id='myCalendar'></div>

<div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cr&eacute;er Rendez Vous</h4>
      </div>
      <div class="modal-body">
        <form id="createAppointmentForm" class="form-horizontal">
	        <div class="form-group">
	            <label class="control-label col-sm-2" for="serviceName">Service:</label>
	            <div class="controls col-sm-10">
	                <div class="col-md-4 col-md-offset-4">
					<select class="form-control" id="nom_service" name ="nom_service">
					<?php 
					$id_client = $_SESSION["S_LOGIN"]["id"];
					$query ="SELECT * FROM `service` ";
					$connect = connectDB();
					$res = mysqli_query($connect, $query);
					while ($row = mysqli_fetch_array($res, MYSQL_ASSOC)) {
						$id_s = $row['id_service'];
						$nom_s = $row['nom_service'];
						echo "<option value='".$id_s."'>".$nom_s."</option>";
					}
					disconnectDB($connect);
					?>
					</select>
					</div>
					<input type="hidden" id="id_client" value="<?php echo $id_client;?>"/>
	                <input type="hidden" id="apptStartTime"/>
	                <input type="hidden" id="apptEndTime"/>
	                <input type="hidden" id="apptAllDay" />
	            </div>
	        </div>
	    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" id="submitButton">Confirmer</button>
      </div>
    </div>
  </div>
</div>