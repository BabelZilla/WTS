var $jq = jQuery.noConflict();
$jq(function () {
    $jq('#files').dataTable({
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
        "aoColumns": [
            {   "bSortable": false,
                "bSearchable": false,
                "sType": "html",
                "sWidth": "30%"
            },
            { "bSortable": true,
                "bSearchable": true,
                "sWidth": "20%"
            },
            { "bSortable": false,
                "bSearchable": false,
                "sWidth": "35%"
            },
            { "bSortable": false,
                "bSearchable": false,
                "sWidth": "5%"
            },
            { "bSortable": false,
                "bSearchable": false
            },
        ]
    });
});
