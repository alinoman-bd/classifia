$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

  // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 62.387500,  lng: 16.325556},
          zoom: 13
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        geocoder = new google.maps.Geocoder();
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          var address = places[0].formatted_address;
          geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == 'OK') {
              var lat = results[0].geometry.location.lat();
              var lng = results[0].geometry.location.lng();
              $('.lat').val(lat);
              $('.lng').val(lng);
              console.log(lat + ' '+ lng+ '|'+ address);
            } else {
              console.log('Geocode was not successful for the following reason: ' + status);
            }
          });

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });



          // for 2nd search


          var map1 = new google.maps.Map(document.getElementById('map1'), {
            center: {lat: -33.8688, lng: 151.2195},
            zoom: 13,
            mapTypeId: 'roadmap'
          });

        // Create the search box and link it to the UI element.
        var input1 = document.getElementById('pac-input1');
        var searchBox1 = new google.maps.places.SearchBox(input1);
        map1.controls[google.maps.ControlPosition.TOP_LEFT].push(input1);

        // Bias the SearchBox results towards current map's viewport.
        map1.addListener('bounds_changed', function() {
          searchBox1.setBounds(map1.getBounds());
        });

        var markers1 = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox1.addListener('places_changed', function() {
          var places1 = searchBox1.getPlaces();

          if (places1.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers1.forEach(function(marker) {
            marker.setMap(null);
          });
          markers1 = [];

          // For each place, get the icon, name and location.
          var bounds1 = new google.maps.LatLngBounds();
          places1.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers1.push(new google.maps.Marker({
              map1: map1,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds1.union(place.geometry.viewport);
            } else {
              bounds1.extend(place.geometry.location);
            }
          });
          map1.fitBounds(bounds1);
        });
      }




      var map;
      var geocoder;
      var lastOpenedInfoWindow;
      function initMap() {
        geocoder = new google.maps.Geocoder();
        var center_point = {lat: 53.350140, lng: -6.266155};
        map = new google.maps.Map(document.getElementById('map-marker'), {
          zoom: 8,
          center: center_point
        });

        var allData = JSON.parse(document.getElementById('all_map_json').innerHTML);
        showAllMarker(allData);
        initAutocomplete();

      }

      function showAllMarker(allData) {
        var root_url = window.location.href.match(/^.*\//)[0];
        var icon = root_url+'map_img/map_icon.png';

        Array.prototype.forEach.call(allData, function(data){
          var lat = data.lat;
          var lng = data.lng;
          var marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat, lng),
            map: map,
            icon: icon
          });


          var infowindow = new google.maps.InfoWindow({ maxWidth: 300 });
          var content = '<div class="info-img"><img src="http://ad2.igonet.lt/houseAdimages/house_cover_1599738687.jpg"></div>';
          content += '<div class="info-address">Dhaka bangladesh</div>';
          google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){
            return function() {
              closeLastOpenedInfoWindow();
              infowindow.setContent(content);
              infowindow.open(map,marker);
              lastOpenedInfoWindow = infowindow;

            };
          })(marker,content,infowindow));
        });
      }
      function closeLastOpenedInfoWindow() {
        if (lastOpenedInfoWindow) {
          lastOpenedInfoWindow.close();
        }
      }