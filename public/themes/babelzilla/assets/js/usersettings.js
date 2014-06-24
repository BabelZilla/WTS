var $jq = jQuery.noConflict();
$jq(document).ready(function () {
    $jq('#settingsform').bind('submit', function () {
        var form = $jq('#settingsform');
        var data = form.serialize();
        $jq.post('/user/settings/save', data, function (response) {
            alert(response);
        });
        return false;
    });
});
