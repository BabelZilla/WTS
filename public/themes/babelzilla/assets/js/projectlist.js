var $jq = jQuery.noConflict();
$jq(function () {
    $jq('#allWebapps').dataTable(
        {
            "bJQueryUI": false,
            "bStateSave": false,
            "bSortClasses": false,
            "bAutoWidth": false,
            "sPaginationType": "full_numbers",
            "bProcessing": false,
            "iDisplayLength": 50,
            "aaSorting": [
                [3, 'desc']
            ],
            "aoColumns": [
                { "sType": "html",
                    "sWidth": "50%"
                },
                { "bSortable": false,
                    "bSearchable": false,
                    "sWidth": "25%"
                },
                { "bSortable": true,
                    "bSearchable": false,
                    "sWidth": "25%"
                },
            ]
        });
});