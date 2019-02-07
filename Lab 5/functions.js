function weatherCallback(results) {
	$("#temperature").html(results.data[0].temp);
	$("#sky").html(results.data[0].weather.description);
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