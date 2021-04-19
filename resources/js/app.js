require('./bootstrap');

require('alpinejs');

import Swal from 'sweetalert2';

window.suppressionConfirm = function(formId) {
    Swal.fire({
        title: 'Suppression de produit',
        text: "Etes-vous sure de vouloir supprimer ce produit?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Supprimer',
        cancelButtonText: 'Annuler'
      }).then((result) => {
        if (result.isConfirmed) {
          /* Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          ) */

          document.getElementById(formId).submit();
        }
      })
}
