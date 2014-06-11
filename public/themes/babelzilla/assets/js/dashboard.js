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
                [0, 'desc']
            ],
            "aoColumns": [
                { "sType": "html",
                    "sWidth": "55%"
                },
                { "bSortable": true,
                    "bSearchable": false,
                    "sWidth": "20%"
                },
                { "bSortable": false,
                    "bSearchable": false,
                    "sWidth": "25%"
                },
            ]
        });
    $jq('#memberTrans').dataTable({
        "bJQueryUI": false,
        "bStateSave": false,
        "bSortClasses": false,
        "bAutoWidth": false,
        "sPaginationType": "full_numbers",
        "bProcessing": false,
        "aaSorting": [
            [3, 'asc']
        ],
        "iDisplayLength": 50,
        "aoColumns": [
            {
                "sType": "html",
                "sWidth": "35%"
            },
            {
                "bSearchable": false,
                "sWidth": "5%"
            },
            {
                "bSortable": true,
                "bSearchable": false,
                "iDataSort": "3",
                "sWidth": "35%"
            },
            {
                "bVisible": false
            },
            {
                "bSortable": false,
                "bSearchable": false,
                "sWidth": "20%"

            },
            {
                "bSortable": false,
                "bSearchable": false,
                "sWidth": "5%"

            },
        ]
    });
    $jq('.stat').each(function (index) {
        status = $jq('option:selected', this).val();
        $jq.data(this, 'ov', status);
        status_text = $jq('option:selected', this).text();
        $jq.data(this, 'ot', status_text);
    });
});