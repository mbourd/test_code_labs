import { appAPI } from "../../app";

export default class agency {
  getAgencyById(id) {
    return appAPI.get("/agencies/" + id);
  }

  getAllAgenciesLikeName(name) {
    return appAPI.get("/agencies", { params: { name } })
  }

  postAgency(agency) {
    return appAPI.post("/agencies", agency);
  }
}
