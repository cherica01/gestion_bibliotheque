(function($) {
    "use strict"

    $('.example-style').DataTable();

    // Example 1
    var table = $('#example').DataTable({
        createdRow: function (row, data, index) {
            $(row).addClass('selected');
        },
        "paging": false,
        "ordering": false,
        "dom": 'rt'  // Supprime les options Previous, Next et Show entries
    });
      
    table.on('click', 'tbody tr', function() {
        var $row = table.row(this).nodes().to$();
        var hasClass = $row.hasClass('selected');
        $row.toggleClass('selected', !hasClass);
    });
    
    table.rows().every(function() {
        this.nodes().to$().removeClass('selected');
    });

    // Example 2
    var table2 = $('#example2').DataTable({
        createdRow: function (row, data, index) {
            $(row).addClass('selected');
        },
        "scrollY": "42vh",
        "scrollCollapse": true,
        "paging": false,
        "ordering": false,
        "dom": 'rt'  // Supprime les options Previous, Next et Show entries
    });

    table2.on('click', 'tbody tr', function() {
        var $row = table2.row(this).nodes().to$();
        var hasClass = $row.hasClass('selected');
        $row.toggleClass('selected', !hasClass);
    });

    table2.rows().every(function() {
        this.nodes().to$().removeClass('selected');
    });

    // Example 3
    var table3 = $('#example3').DataTable({
        createdRow: function (row, data, index) {
            $(row).addClass('selected');
        },
        "scrollY": "400",
        "scrollX": true,
        "paging": false,
        "ordering": false,
        "dom": 'rt'  // Supprime les options Previous, Next et Show entries
    });

    table3.on('click', 'tbody tr', function() {
        var $row = table3.row(this).nodes().to$();
        var hasClass = $row.hasClass('selected');
        $row.toggleClass('selected', !hasClass);
    });

    table3.rows().every(function() {
        this.nodes().to$().removeClass('selected');
    });

    // Example 4
    var table4 = $('#example4').DataTable({
        createdRow: function (row, data, index) {
            $(row).addClass('selected');
        },
        "scrollX": true,
        "paging": false,
        "ordering": false,
        "dom": 'rt'  // Supprime les options Previous, Next et Show entries
    });

    table4.on('click', 'tbody tr', function() {
        var $row = table4.row(this).nodes().to$();
        var hasClass = $row.hasClass('selected');
        $row.toggleClass('selected', !hasClass);
    });

    table4.rows().every(function() {
        this.nodes().to$().removeClass('selected');
    });

})(jQuery);
