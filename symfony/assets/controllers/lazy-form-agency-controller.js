import { Controller } from '@hotwired/stimulus';
import { service } from '../app';

/* stimulusFetch: 'lazy' */
export default class extends Controller {
  connect() {
    let autocomplete;

    autocomplete = service.googleMap.initAutoCompletePlaceSearch(document.getElementById("agency_name"))

    autocomplete
      .addListener("place_changed", /*onChangePlace*/() => {
        let place = autocomplete.getPlace();

        if (place.formatted_address) {
          document.getElementById("agency_address").value = place.formatted_address;
        }

        if (place.geometry) {
          document.getElementById("agency_latitude").value = place.geometry['location'].lat();
          document.getElementById("agency_longitude").value = place.geometry['location'].lng();
        }
      });
  }
}
