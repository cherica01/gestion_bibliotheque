(function($) {
    "use strict"

    var table = $('.dataTable').DataTable({
        createdRow: function (row, data, index) {
            $(row).addClass('selected')
        },
        paging: false,           // Désactive la pagination
        ordering: false,         // Désactive le tri des colonnes
        dom: 'rt'                // Enlève les éléments "Previous", "Next" et "Show entries"
    });
      
    table.on('click', 'tbody tr', function() {
        var $row = table.row(this).nodes().to$();
        var hasClass = $row.hasClass('selected');
        if (hasClass) {
            $row.removeClass('selected')
        } else {
            $row.addClass('selected')
        }
    });
    
    table.rows().every(function() {
        this.nodes().to$().removeClass('selected')
    });

    $('#example2').DataTable({
        "scrollY": "42vh",
        "scrollCollapse": true,
        "paging": false,          // Désactive la pagination
        "ordering": false,        // Désactive le tri des colonnes
        "dom": 'rt'               // Enlève les éléments "Previous", "Next" et "Show entries"
    });

    $('#example3').DataTable({
        "scrollY": "400",
        "scrollX": true,
        "paging": false,          // Désactive la pagination
        "ordering": false,        // Désactive le tri des colonnes
        "dom": 'rt'               // Enlève les éléments "Previous", "Next" et "Show entries"
    });

    $('#example4').DataTable({
        "scrollX": true,
        "paging": false,          // Désactive la pagination
        "ordering": false,        // Désactive le tri des colonnes
        "dom": 'rt'               // Enlève les éléments "Previous", "Next" et "Show entries"
    });

    $('#example-ajax').DataTable({
        "ajax": '../ajax/arrays.json',
        "paging": false,          // Désactive la pagination
        "ordering": false,        // Désactive le tri des colonnes
        "dom": 'rt'               // Enlève les éléments "Previous", "Next" et "Show entries"
    });

})(jQuery);
