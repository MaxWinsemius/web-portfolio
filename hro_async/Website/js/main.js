// error: function(xhr, status, error) {
//     var err = eval("(" + xhr.responseText + ")");
//     alert(err.Message);
// }

//show campers given in json
function showCampers(json)
{
	//log error
	if(typeof json.error !== "undefined") {
		console.log("Error! " + json.error);
		return false;
	}

	//clear and append to response div
	$("#ajaxField").empty();
	for (i = 0; i < json.length; i++) {
		 $("#ajaxField")
		 	.append("<div class='camper' data-camperid='" + i + "' style='display: "+ json[i].show +";'>"+
				 		"<div class='camperImage'>"+
				 				"<img src='" + json[i].imageUrl + "' />"+
				 			"</div>"+
				 			"<div class='camperMeta'>"+
				 				"<div class='meta'>Plaatsen: " + json[i].sleepingPlaces + 
				 				"  Kosten: " + json[i].price + "</div>" +
				 				"<div class='buttons'>" +
				 					"<input type='button' value='annuleer' /><input id='reserve' type='button' value='reserveren' />"+
				 				"</div>"+
				 			"</div>" +
				 		"</div>");
	}
}

//load all campers
function loadAllCampers()
{
	//receive
	$.ajax({
		url: "ajax.php",
		method: "post",
		dataType: "json",
		data: {
			type: "loadAllCampers"
		},
		error: function(xhr, status, error) {
		    var err = eval("(" + xhr.responseText + ")");
		    alert(err.Message);
		}
	})
		.done(function ( json ) {
			//show campers
			showCampers(json);
		});
}

//load campers on date
function loadCampersOnDate(date)
{
	//load json
	$.ajax({
		url: "ajax.php",
		method: "post",
		dataType: "json",
		data: {
			type: "loadCampersOnDate",
			date: date
		},
		error: function(xhr, status, error) {
		    var err = eval("(" + xhr.responseText + ")");
		    alert(err.Message);
		}
	})
		.done(function ( json ) {
			//show campers
			showCampers(json);
		});
}

//reserve camper
function reserveCamper(date, camper)
{
	//check if date is filled
	if(date.length > 1) {
		console.log("Reserve: " + date + " Camper: " + camper);
		$.ajax({
			url: "ajax.php",
			method: "post",
			data: {
				type: "reserveCamper",
				date: date,
				camper: camper
			},
			error: function(xhr, status, error) {
			    var err = eval("(" + xhr.responseText + ")");
			    alert(err.Message);
			}
		})
			.done(function() {
				alert("Succesvol toegevoegd!");
			})
	}
}

//initialize
function init() {
	//current date
	date = 0;
	//set datepicker default
	$.datepicker.setDefaults({
		dateFormat: "yy-mm-dd"
	});

	// create datepicker
	$('#datepicker').datepicker({
		minDate: 0,
		onSelect: function(dateText) { 
			loadCampersOnDate(dateText);
			date = dateText;
	   }
	});

	//laod all campers
	loadAllCampers();

	//eventhandling
	$(document).on("click", ".camper", function() {
		$(this).children().toggle();
	});

	$(document).on("click", "#reserve", function() {
		// console.log("reserve: "+$(this).parent().parent().parent().attr("data-camperid"));
		reserveCamper(date, $(this).parent().parent().parent().attr("data-camperid"));
	});
}

//Dom ready
$(init);