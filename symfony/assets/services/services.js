import agency from "./agency/agency.service";
import googleMap from "./googleMap/googleMap.service";

export default class services {
  constructor() {
    this.googleMap = new googleMap();
    this.agency = new agency();
  }
}
