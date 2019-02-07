function weatherCallback(results) {
	$("#temperature").html(results.data[0].temp);
	$("#sky").html(results.data[0].weather.description);
	if($("#sky").html() === "Overcast clouds") {
		$("#weatherContainer").css("backgroundColor", "gray");
		$("#weatherContainer").css("color", "white");
	}
	else if($("#sky").html() === "Broken clouds") {
		$("#weatherContainer").css("backgroundColor", "lightgray");
		$("#weatherContainer").css("color", "white");
	}
	else {
		$("#weatherContainer").css("backgroundColor", "lightblue");
		$("#weatherContainer").css("color", "black");
	}
	$("#feels").html(results.data[0].app_temp);
}

function ajax(endpointUrl, callbackFunction) {
	var xhr = new XMLHttpRequest();
	xhr.open("GET", endpointUrl, true);
	xhr.send();
	// Waiting for a state change
	xhr.onreadystatechange = function() {
		// state
		if(this.readyState == this.DONE) {
			if(xhr.status == 200) {
				var parsedJson = JSON.parse( xhr.responseText );
				callbackFunction( parsedJson );
			}
		}
	}
}
$.ajax({
	method: "GET",
	url: "https://api.weatherbit.io/v2.0/current?city=Los+Angeles,CA&key=9a2e20723b5e4045b6c769875844a212&units=I",
})
.done(function(results) {
	console.log(results);
	// console.log(JSON.parse(results));
	weatherCallback(results);
})
.fail(function() {
	console.log("ERROR");
});

$(document).ready(function(){

	$(".list-group-flush").on("click", ".list-group-item", function() {
		this.classList.toggle("done");
	});

	$(".list-group-flush").on("click", ".checkbox", function() {
		console.log("checkbox clicked");
		$(this).parent().fadeOut("slow", function() {
			console.log("Removing");
			$(this).remove();
		});
	});

	$("#toggleAdd").on("click", function() {
		if($("#listInput").is(":hidden")) {
			$("#listInput").slideDown();
		}
		else {
			$("#listInput").slideUp();
		}
	});

	$("input").on("keypress", function(event){
		var temp = $("#inputBar").val();

		if(event.keyCode==13 && temp != ""){
			if(temp.trim() === "") {
				$("#inputBar").val("");
				return;
			}
			$(".list-group-flush").append(($("<li>").attr("class", "list-group-item")).append((($("<button>").attr("class","checkbox")).append($("<span>").attr("class", "far fa-square"))),temp));
			$("#inputBar").val("");
		}
	});

	$("#listInput").on("submit",function(e) {
		e.preventDefault();

	});
});