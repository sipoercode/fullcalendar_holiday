<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8' />
		<title>Kalender</title>
		<link rel="stylesheet" type="text/css" href="css/fullcalendar.css">

		<style type="text/css">
			#calendar {
			    max-width: 700px;
			    margin: 20px auto;
			    padding: 0 10px;
			    background-color: #a4b1b0;
			  }

			  .fc-highlight {
				    background-color:red;
				}
		</style>
	</head>
	<body>
		<div id="calendar"></div>

		<script type="text/javascript" src="lib/jquery.min.js"></script>
		<script type="text/javascript" src="lib/jquery-ui.min.js"></script>
		<script type="text/javascript" src="lib/moment.min.js"></script>
		<script type="text/javascript" src="lib/fullcalendar.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function() {
				var calendar = $('#calendar').fullCalendar({
					editable:true,
					header:{
						left:false,
						center:'title',
					},
					events: 'load.php',
					selectHelper: true,
					allDayDefault: true,
					fixedWeekCount: false,


					eventLimit: 1,
					selectable:true,

					eventRender: function (event, element, view) 
					{
					    if (event.confirmed == 0) 
					    {
					        element.css("background-color", "#f51d1d");
					        element.css("border-color", "#f51d1d");
					    } 
					    else 
					    {
					        element.css("background-color", "#f51d1d");
					        element.css("border-color", "#f51d1d");
					    }
					},

					select: function(start, end, allDay)
					{	
						allDay = true;
						if (allDay) {
							var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
							var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
							$.ajax({
								url:"insert.php",
								type:"POST",
								data:{start:start, end:end},
								success:function()
								{
									calendar.fullCalendar('refetchEvents');
									alert("Added Successfully");
								},

							})
						}
						calendar.fullCalendar('unselect');
					},


					eventClick:function(event, jsEvent, view, rendering)
					{
						if(confirm("Are you sure you want to remove it?"))
						{
							var id = event.id;
							$.ajax({
								url:"delete.php",
								type:"POST",
								data:{id:id},
								success:function()
								{
									calendar.fullCalendar('refetchEvents');
									alert("Event Removed");
								}
							})
						}
					},

				});
			});
		</script>
	</body>
</html>