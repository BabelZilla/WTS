var $jq = jQuery.noConflict();
$jq(function () {
    $jq("a[rel^='prettyPhoto']").prettyPhoto({
        theme: 'light_rounded',
        social_tools: false
    });
    $jq('#translations').dataTable({
        "language": {
            "url": "/ajax/getlocales/" + language
        },
        "bJQueryUI": false,
        "bStateSave": false,
        "bSortClasses": false,
        "bAutoWidth": false,
        "sPaginationType": "full_numbers",
        "bProcessing": false,
        "iDisplayLength": 30,
        "aoColumns": [
            {
                "sType": "html",
                "sWidth": "10%"
            },
            {
                "bSortable": false,
                "bSearchable": false,
                "sWidth": "50%"
            },
            {
                "bSearchable": false,
                "sWidth": "10%",
                "iDataSort": 3,
            },
            {
                "bSearchable": false,
                "bVisible": false,
            },
            {
                "sType": "html",
                "bSortable": true,
                "bSearchable": false,
                /*"iDataSort" : "4",*/
                "sWidth": "20%"
            },
            {
                "bSortable": false,
                "bSearchable": false,
                "sWidth": "10%"

            },
        ]
    });
});