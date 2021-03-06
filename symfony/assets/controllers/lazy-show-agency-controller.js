import { Controller } from '@hotwired/stimulus';
import { service } from '../app';

/* stimulusFetch: 'lazy' */
export default class extends Controller {
  connect() {
    service.googleMap.initMap(
      document.getElementById("map"),
      { query: window.dataAgency.name },
      {},
      parseFloat(window.dataAgency.lat),
      parseFloat(window.dataAgency.lng)
    );
  }
}
