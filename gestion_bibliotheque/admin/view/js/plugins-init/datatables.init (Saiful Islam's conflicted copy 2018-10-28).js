(function($) {
    "use strict"

    // $('#example').DataTable();
    
    var table = $('.dataTable').DataTable({
        "paging": false,        // Désactive la pagination
        "ordering": false,      // Désactive le tri des colonnes
        "bPaginate": false,     // Supprime totalement la pagination
        "bInfo": false,         // Supprime les infos de pagination
        "bLengthChange": false, // Supprime le menu de changement de longue
        createdRow: function ( row, data, index ) {
           $(row).addClass('selected')
        } 
    });
      
    table.on('click', 'tbody tr', function() {
    var $row = table.row(this).nodes().to$();
    var hasClass = $row.hasClass('selected');
    if (hasClass) {
        $row.removeClass('selected')
    } else {
        $row.addClass('selected')
    }
    })
    
    table.rows().every(function() {
    this.nodes().to$().removeClass('selected')
    });




    $('#example2').DataTable( {
        "scrollY": "42vh",
        "scrollCollapse": true,
        "paging": false,
        "ordering": false,
        "bPaginate": false,
        "bInfo": false,
        "bLengthChange": false
    });

    $('#example3').DataTable( {
        "scrollY": "400",
        "scrollX": true,
        "paging": false,
        "ordering": false,
        "bPaginate": false,
        "bInfo": false,
        "bLengthChange": false
    });

    $('#example4').DataTable( {
     "scrollX": true,
        "paging": false,
        "ordering": false,
        "bPaginate": false,
        "bInfo": false,
        "bLengthChange": false
    });

    $('#example-ajax').DataTable( {
        "ajax": '../ajax/arrays.json',
        "paging": false,
        "ordering": false,
        "bPaginate": false,
        "bInfo": false,
        "bLengthChange": false
    } );
    


})(jQuery);