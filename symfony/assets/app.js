/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

import $ from "jquery";

import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.css';

import "datatables.net-bs5/js/dataTables.bootstrap5"
import "datatables.net-bs5/css/dataTables.bootstrap5.min.css"

import services from "./services/services";

export const service = new services();

$(".list-agencies").DataTable({
  "language": {
    "lengthMenu": "Afficher _MENU_ par page",
    "zeroRecords": "Rien trouvé",
    "info": "Affichage page _PAGE_ sur _PAGES_",
    "infoEmpty": "Aucune données disponible",
    "search": "Rechercher : ",
    "paginate": {
      "first": "Premier",
      "last": "Dernier",
      "next": " Suivant",
      "previous": "Précédent "
    },
  }
});
