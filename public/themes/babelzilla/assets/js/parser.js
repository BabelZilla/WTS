var $jq = jQuery.noConflict();
$jq(document).ready(function () {
    setTimeout('readlp("")', 2500);
});

function readlp(rid) {
    $jq('#busy4').activity({segments: 12, width: 5.5, space: 6, length: 13, color: '#252525', speed: 1.5});
    $jq.get('/project/ajax/parse',
        {
            project: pid,
            language: rid,
        },
        function (data) {
            $jq('#result').append(data);
            $jq('#busy4').activity(false);
        }
    );
}