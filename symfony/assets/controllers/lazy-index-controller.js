import { Controller } from '@hotwired/stimulus';
import { service } from '../app';

/* stimulusFetch: 'lazy' */
export default class extends Controller {
  async connect() {
    let listAgencies = [];

    await service.agency.getAllAgenciesLikeName("")
      .then(r => {
        listAgencies = r.data;
      });

    service.googleMap.initMap(
      document.getElementById("map"),
      { query: listAgencies }
    );
  }
}
