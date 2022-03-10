import { service } from "../../app";

export default class googleMap {
  PLACE_STATUS_OK = google.maps.places.PlacesServiceStatus.OK;

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
        if (element.hasOwnProperty("latitude") && element.hasOwnProperty("longitude")) {
          this.createMarkerWithLatLng(element.latitude, element.longitude, element, map, infowindow);
        } else {
          finalRequest = {
            ...finalRequest,
            query: element.name
          };
          placeService.findPlaceFromQuery(finalRequest, (results, status) => {
            if (status === this.PLACE_STATUS_OK) {
              for (var i = 0; i < results.length; i++) {
                service.googleMap.createMarker(results[i], map, infowindow);
              }
              // map.setCenter(results[0].geometry.location);
            }
          });
        }
      });
    } else {
      if (lat != 0 || lng != 0) {
        this.createMarkerWithLatLng(lat, lng, { name: request.query }, map, infowindow)
      } else
        placeService.findPlaceFromQuery(finalRequest, (results, status) => {
          if (status === this.PLACE_STATUS_OK) {
            for (var i = 0; i < results.length; i++) {
              service.googleMap.createMarker(results[i], map, infowindow);
            }
            map.setCenter(results[0].geometry.location);
          }
        });
    }
  }

  createMarkerWithLatLng(lat, lng, element, map, infowindow) {
    const marker = this.provideMarker({
      map,
      position: { lat, lng },
      title: element.name
    });
    this.addEventListenerOn(marker, "click", () => {
      infowindow.setContent(element.name || "");
      infowindow.open(map);
    });
  }

  createMarker(place, map, infowindow) {
    if (!place.geometry || !place.geometry.location) return;

    const marker = this.provideMarker({
      map,
      position: place.geometry.location,
    });

    this.addEventListenerOn(marker, "click", () => {
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

  provideMarker(...params) {
    return new google.maps.Marker(...params);
  }

  addEventListenerOn(...params) {
    google.maps.event.addListener(...params);
  }
}
