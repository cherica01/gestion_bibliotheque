// Déclaration des données initiales
const dataSet = [
    ["Tiger Nixon", "System Architect", "Edinburgh", "5421", "2011/04/25", "$320,800"],
    ["Garrett Winters", "Accountant", "Tokyo", "8422", "2011/07/25", "$170,750"],
    ["Ashton Cox", "Junior Technical Author", "San Francisco", "1562", "2009/01/12", "$86,000"],
    // ... (compléter avec les autres données si nécessaire)
];

(function ($) {
    "use strict";

    // Fonction générique pour initialiser les DataTables sans pagination ni tri
    function initTable(selector, options = {}) {
        return $(selector).DataTable({
            createdRow: function (row) {
                $(row).addClass('selected');
            },
            scrollY: options.scrollY || false,
            scrollX: options.scrollX || false,
            paging: false,               // Désactiver la pagination
            ordering: false,             // Désactiver le tri par colonne
            dom: 't',                    // Supprimer les éléments de pagination et de recherche de l'interface
            data: options.data || null,
            columns: options.columns || null
        });
    }

    // Initialisation des exemples de tables
    const exampleTables = {
        table1: initTable('#example', { scrollY: "42vh" }),
        table2: initTable('#example2', { scrollY: "42vh" }),
        table3: initTable('#example3', { scrollY: "400px", scrollX: true }),
        table4: initTable('#example4', { scrollX: true }),
        tableAjax: $('#example-ajax').DataTable({ ajax: '../ajax/arrays.json', paging: false, ordering: false, dom: 't' }),
        tableDataSource: initTable('#example-datasource1', {
            data: dataSet,
            columns: [
                { title: "Name" },
                { title: "Position" },
                { title: "Office" },
                { title: "Extn." },
                { title: "Start date" },
                { title: "Salary" }
            ]
        })
    };

    // Gestion de la sélection des lignes (exemple pour toutes les tables avec sélection)
    Object.values(exampleTables).forEach(table => {
        table.on('click', 'tbody tr', function () {
            $(this).toggleClass('selected');
        });
    });




    // Recherche par colonne avec saisie de texte dans les pieds de table
    $('#example-api-1 tfoot th').each(function () {
        const title = $(this).text();
        $(this).html('<input type="text" placeholder="Recherche ' + title + '" />');
    });
    const tableApi1 = $('#example-api-1').DataTable({
        paging: false,
        ordering: false
    });
    tableApi1.columns().every(function () {
        $(this.footer()).find('input').on('keyup change', function () {
            tableApi1.column(this.index()).search(this.value).draw();
        });
    });

    // Recherche par colonne avec menu déroulant dans les pieds de table
    $('#example-api-2').DataTable({
        paging: false,
        ordering: false,
        initComplete: function () {
            this.api().columns().every(function () {
                const column = this;
                const select = $('<select><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function () {
                        const val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                    });
                column.data().unique().sort().each(function (d) {
                    select.append('<option value="' + d + '">' + d + '</option>');
                });
            });
        }
    });

    // Gestion de l'ajout de nouvelles lignes pour l'exemple API-4
    let counter = 1;
    const tableApi4 = $('#example-api-4').DataTable({
        paging: false,
        ordering: false
    });
    $('#addRow').on('click', function () {
        tableApi4.row.add([
            counter + '.1', counter + '.2', counter + '.3', counter + '.4', counter + '.5'
        ]).draw(false);
        counter++;
    });
    $('#addRow').click();

    // Envoi de formulaire pour l'API-5
    const tableApi5 = $('#example-api-5').DataTable({
        paging: false,
        ordering: false
    });
    $('#form-submit').on('click', function () {
        const data = tableApi5.$('input, select').serialize();
        alert("Les données suivantes seraient soumises au serveur: \n\n" + data.substr(0, 120) + '...');
        return false;
    });

    // Affichage dynamique des colonnes dans l'API-6
    const tableApi6 = $('#example-api-6').DataTable({
        scrollY: "200px",
        paging: false,
        ordering: false
    });
    $('.toggle-vis').on('click', function (e) {
        e.preventDefault();
        const column = tableApi6.column($(this).attr('data-column'));
        column.visible(!column.visible());
    });

    // Recherche globale et par colonne avec expressions régulières
    function filterGlobal() {
        $('#example-api-7').DataTable().search(
            $('#global_filter').val(),
            $('#global_regex').prop('checked'),
            $('#global_smart').prop('checked')
        ).draw();
    }
    function filterColumn(i) {
        $('#example-api-7').DataTable().column(i).search(
            $('#col' + i + '_filter').val(),
            $('#col' + i + '_regex').prop('checked'),
            $('#col' + i + '_smart').prop('checked')
        ).draw();
    }

    $('#global_filter').on('keyup change', filterGlobal);
    $('[id^=col]').on('keyup change', function () {
        const colIndex = $(this).attr('id').match(/\d+/)[0];
        filterColumn(colIndex);
    });

})(jQuery);
