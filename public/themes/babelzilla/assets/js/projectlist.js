var $jq = jQuery.noConflict();
$jq(function () {
    $jq('#allWebapps').dataTable(
        {
            "language": {
                "url": "/ajax/getlocales/" + language
            },
            "bJQueryUI": false,
            "bStateSave": false,
            "bSortClasses": false,
            "bAutoWidth": false,
            "sPaginationType": "full_numbers",
            "bProcessing": false,
            "iDisplayLength": 50,
            "aaSorting": [
                [2, 'desc']
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