import { service } from "../../app";

export default class googleMap {
  initMap(htmlEl, request = {}, configMap = {}, lat = 0, lng = 0) {
    let spot = new google.maps.LatLng(lat, lng);
    let infowindow = new google.maps.InfoWindow();
    let map = new google.maps.Map(
      htmlEl, { zoom: 15, center: spot, ...configMap }
    );
    let finalRequest = {
      query: 'Eiffel Tower',
      fields: ['name', 'geometry'],
      ...request
    };

    let placeService = new google.maps.places.PlacesService(map);

    placeService.findPlaceFromQuery(finalRequest, (results, status) => {
      if (status === google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
          service.googleMap.createMarker(results[i], map, infowindow);
        }
        map.setCenter(results[0].geometry.location);
      }
    });
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
}
