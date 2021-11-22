var map;
var markers = [];
var hock = 1;
var myStyles =[
	{
		featureType: "poi",
		elementType: "labels",
		stylers: [
			  { visibility: "off" }
		]
	}
];

function initAutocomplete() {
	if (document.getElementById("pac-input")) {
		initMap("map", "pac-input");
	}
	if (document.getElementById("pac-input1")) {
		initMap("map1", "pac-input1");
	}
	if (document.getElementById("realestateMap")) {
		initRealestateMap('realestateMap');
	}
	
}

function initMap(mapid, inputfield){
	const map1 = new google.maps.Map(document.getElementById(mapid), {
		center: { lat: 62.3875, lng: 16.325556 },
		zoom: 4,
	  });

	  const input = document.getElementById(inputfield);
  

	  const autocomplete = new google.maps.places.Autocomplete(input);
	  // Set initial restrict to the greater list of countries.
	  autocomplete.setComponentRestrictions({
		country: ["se"],
	  });
	  // Specify only the data fields that are needed.
	  autocomplete.setFields(["address_components", "geometry", "icon", "name"]);
	  const infowindow = new google.maps.InfoWindow();
	  const infowindowContent = document.getElementById("infowindow-content");
	  infowindow.setContent(infowindowContent);
	  const marker = new google.maps.Marker({
		map1,
		anchorPoint: new google.maps.Point(0, -29),
	  });
	  autocomplete.addListener("place_changed", () => {
		infowindow.close();
		marker.setVisible(false);
		const place = autocomplete.getPlace();
	  	if(input.classList.contains('map-search-value')) {
	  		filterResVal();
	  	}
	
		if (!place.geometry) {
		  window.alert("No details available for input: '" + place.name + "'");
		  return;
		}
	
		// If the place has a geometry, then present it on a map.
		if (place.geometry.viewport) {
		  map1.fitBounds(place.geometry.viewport);
		} else {
		  map1.setCenter(place.geometry.location);
		  map1.setZoom(17); // Why 17? Because it looks good.
		}
		marker.setPosition(place.geometry.location);
		marker.setVisible(true);
		let address = "";
	
		if (place.address_components) {
		  address = [
			(place.address_components[0] &&
			  place.address_components[0].short_name) ||
			  "",
			(place.address_components[1] &&
			  place.address_components[1].short_name) ||
			  "",
			(place.address_components[2] &&
			  place.address_components[2].short_name) ||
			  "",
		  ].join(" ");
		}
	  });
}

function initRealestateMap(mapid){
	const sweden = { lat: parseFloat(document.querySelector('.center-lat').value.trim()), lng: parseFloat(document.querySelector('.center-lng').value.trim()) };
	const world =1;
	const continent =5;
	const city = 10;
	const Streets = 15;
	const Buildings =20;
	var mapOptions = {
        center: sweden,
		zoom: continent,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
		styles: myStyles 
    };
	map = new google.maps.Map(document.getElementById(mapid), mapOptions);
	setMarkers(map);

	google.maps.event.addListener(map, 'zoom_changed', function() {
		let zoomLevel = map.getZoom();
		if (zoomLevel >= Streets) {
			if(hock == 1 || hock == 2) {
				hock = 3;
				reloadMarkers(map, true);
			}
		} else {
			if(hock == 3) {
				hock = 2;
				reloadMarkers(map, false);
			}
		}
	});
	// document.getElementById('reloadMarkers').addEventListener('click', reloadMarkers);
}

function reloadMarkers(map, zoom) {
	const city = 10;
	const sweden = { lat: parseFloat(document.querySelector('.center-lat').value.trim()), lng: parseFloat(document.querySelector('.center-lng').value.trim()) };
	var mapOptions = {
        center: sweden,
		zoom: city,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
		styles: myStyles 
    };
	map = new google.maps.Map(document.getElementById('realestateMap'), mapOptions);
	setMapOnAll(null);
    markers = [];

    setMarkers(map,zoom);
}

function setMapOnAll(map) {
	for (let i = 0; i < markers.length; i++) {
	  markers[i].setMap(map);
	}
}

function setMarkers(map, zoomed=false) {
	let details = document.querySelectorAll('.m-side-list');
	details.forEach(function(node){
		let link = node.querySelector('.re-link').getAttribute('href');
		let callback = node.querySelector('.re-link').getAttribute('onclick');
		let address = node.querySelector('.loc-name').innerText.trim();
		let title = node.querySelector('.house-name').innerText.trim();
		let type = node.querySelector('.form-type').innerText.trim();
		let price = node.querySelector('.h-price').innerText.trim();
		let srtype = node.querySelector('.h-len-txt1').innerText.trim();
		let lat = parseFloat(node.querySelector('.map-lat').value.trim());
		let lng = parseFloat(node.querySelector('.map-lng').value.trim());
		let image = node.querySelector('.add-image').getAttribute('src');

		let url = zoomed ? `assets/icons/large.png`:`assets/icons/${type}.png`;
		let infowindow = new google.maps.InfoWindow({
			content: `
			<div class="card" style="width: 18rem; border:none">
			<a href="${link}" onclick="${callback}" target="_blank">
				<img class="card-img-top" src="${image}" alt="${type} image">
			</a>
				<div class="card-body p-0">
				<p class="font-weight-bold p-0 p-1 mb-0">${title}</p>
				<p class="p-0 mb-0">
				<span>${type}</span> | <span>${price} &#128; </span> | <span>${srtype}</span>
				<a href="${link}" onclick="${callback}" target="_blank" class="btn btn-primary btn-sm float-right">details</a>
				</p>
				</div>
			</div>
			`,
		});
		let marker = new google.maps.Marker({
			map: map,
			position: { lat: lat, lng: lng },
			icon:  {
				url: url, // url
				scaledSize: zoomed ? new google.maps.Size(20, 25) : new google.maps.Size(10, 10)
			},
			infowindow: infowindow
		});
		markers.push(marker);
		google.maps.event.addListener(marker, 'click', function() {
	      hideAllInfoWindows(map);
	      this.infowindow.open(map, this);
	    });
	});
	setMapOnAll(map);
}
function hideAllInfoWindows(map) {
   markers.forEach(function(marker) {
     marker.infowindow.close(map, marker);
  }); 
}
