$(document).ready(function() {
    $('#example').DataTable({
        "paging": false,        // Désactiver la pagination (enlève "Previous" et "Next")
        "info": false,          // Désactiver les informations "Showing X entries"
        "lengthChange": false,  // Désactiver le menu déroulant "Show X entries"
        "language": {
            "emptyTable": "Aucune donnée disponible"  // Personnaliser le message de table vide
        }
    });
});

/* Modification des classes et du rendu de la pagination */
(function(factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD
        define(['jquery', 'datatables.net'], function($) {
            return factory($, window, document);
        });
    } else if (typeof exports === 'object') {
        // CommonJS
        module.exports = function(root, $) {
            if (!root) {
                root = window;
            }

            if (!$ || !$.fn.dataTable) {
                $ = require('datatables.net')(root, $).$;
            }

            return factory($, root, root.document);
        };
    } else {
        // Navigateur
        factory(jQuery, window, document);
    }
}(function($, window, document, undefined) {
    'use strict';
    var DataTable = $.fn.dataTable;

    /* Set the defaults for DataTables initialisation */
    $.extend(true, DataTable.defaults, {
        dom:
            "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        renderer: 'bootstrap'
    });

    /* Modification des classes par défaut */
    $.extend(DataTable.ext.classes, {
        sWrapper: "dataTables_wrapper dt-bootstrap4",
        sFilterInput: "form-control form-control-sm",
        sLengthSelect: "custom-select custom-select-sm form-control form-control-sm",
        sProcessing: "dataTables_processing card",
        sPageButton: "paginate_button page-item"
    });

    /* Bootstrap paging button renderer */
    DataTable.ext.renderer.pageButton.bootstrap = function(settings, host, idx, buttons, page, pages) {
        var api = new DataTable.Api(settings);
        var classes = settings.oClasses;
        var lang = settings.oLanguage.oPaginate;
        var aria = settings.oLanguage.oAria.paginate || {};
        var btnDisplay, btnClass, counter = 0;

        var attach = function(container, buttons) {
            var i, ien, node, button;
            var clickHandler = function(e) {
                e.preventDefault();
                if (!$(e.currentTarget).hasClass('disabled') && api.page() != e.data.action) {
                    api.page(e.data.action).draw('page');
                }
            };

            for (i = 0, ien = buttons.length; i < ien; i++) {
                button = buttons[i];

                if ($.isArray(button)) {
                    attach(container, button);
                } else {
                    btnDisplay = '';
                    btnClass = '';

                    switch (button) {
                        case 'ellipsis':
                            btnDisplay = '&#x2026;';
                            btnClass = 'disabled';
                            break;

                        case 'first':
                        case 'previous':
                        case 'next':
                        case 'last':
                            // Supprimer la pagination "Previous" et "Next" en sautant ces cases
                            continue;

                        default:
                            btnDisplay = button + 1;
                            btnClass = page === button ? 'active' : '';
                            break;
                    }

                    if (btnDisplay) {
                        node = $('<li>', {
                                'class': classes.sPageButton + ' ' + btnClass,
                                'id': idx === 0 && typeof button === 'string' ? settings.sTableId + '_' + button : null
                            })
                            .append($('<a>', {
                                    'href': '#',
                                    'aria-controls': settings.sTableId,
                                    'aria-label': aria[button],
                                    'data-dt-idx': counter,
                                    'tabindex': settings.iTabIndex,
                                    'class': 'page-link'
                                })
                                .html(btnDisplay)
                            )
                            .appendTo(container);

                        settings.oApi._fnBindAction(node, {
                            action: button
                        }, clickHandler);

                        counter++;
                    }
                }
            }
        };

        attach($(host).empty().html('<ul class="pagination"/>').children('ul'), buttons);
    };

    return DataTable;
}));
