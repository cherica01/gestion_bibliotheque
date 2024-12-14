$(document).ready(function() {
  $('#dataTable').DataTable({
    "paging": true,        // Garde la pagination activée
    "pageLength": 10,      // Affiche 10 entrées par page
    "info": true,          // Affiche les informations du tableau
    "lengthChange": true,  // Permet de changer le nombre d'entrées visibles
    "searching": true,     // Garde la barre de recherche
    "order": [[1, 'asc']], // Trie par la deuxième colonne
    "columnDefs": [
      { "orderable": false, "targets": 5 }  // Désactive le tri pour la 6ème colonne
    ],
    "language": {
      "emptyTable": "Aucune donnée disponible dans le tableau"
    }
  });
});
