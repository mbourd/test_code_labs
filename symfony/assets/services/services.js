import googleMap from "./googleMap/googleMap.service";

export default class services {
  googleMap;

  constructor() {
    this.googleMap = new googleMap();
  }
}
