import { service } from "../../app";

export default class googleMap {
  initMap(htmlEl, request = {}, configMap = {}, lat = 0, lng = 0) {
    let spot = this.provideLatitudeLongitude(lat, lng);
    let infowindow = this.provideInfoWindow();
    let map = this.provideMap(htmlEl, { zoom: Array.isArray(request.query) ? 2 : 15, center: spot, ...configMap });
    let finalRequest = {
      query: 'Eiffel Tower',
      fields: ['name', 'geometry'],
      ...request
    };

    let placeService = this.providePlaceService(map);

    if (Array.isArray(finalRequest.query)) {
      [].forEach.call(finalRequest.query, element => {
        finalRequest = {
          ...finalRequest,
          query: element.name
        };
        placeService.findPlaceFromQuery(finalRequest, (results, status) => {
          if (status === google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
              service.googleMap.createMarker(results[i], map, infowindow);
            }
            // map.setCenter(results[0].geometry.location);
          }
        });
      });
    } else {
      placeService.findPlaceFromQuery(finalRequest, (results, status) => {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
            service.googleMap.createMarker(results[i], map, infowindow);
          }
          map.setCenter(results[0].geometry.location);
        }
      });
    }

  }

  createMarker(place, map, infowindow) {
    if (!place.geometry || !place.geometry.location) return;

    const marker = new google.maps.Marker({
      map,
      position: place.geometry.location,
    });

    google.maps.event.addListener(marker, "click", () => {
      infowindow.setContent(place.name || "");
      infowindow.open(map);
    });
  }

  initAutoCompletePlaceSearch(inputHtmlEl) {
    return new google.maps.places.Autocomplete(inputHtmlEl);
  }

  provideLatitudeLongitude(...params) {
    return new google.maps.LatLng(...params);
  }

  provideInfoWindow(...params) {
    return new google.maps.InfoWindow(...params);
  }

  provideMap(...params) {
    return new google.maps.Map(...params);
  }

  providePlaceService(...params) {
    return new google.maps.places.PlacesService(...params);
  }
}
