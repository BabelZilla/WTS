var $jq = jQuery.noConflict();
$jq(document).ready(function () {
    $jq('#repo').change(function () {
            var repoval = $jq("#repo option:selected").val();
            $jq.ajax({
                type: "POST",
                url: 'transvision/ajax/getrepolocales',
                data: 'repo=' + repoval,
                success: function (msg) {
                    var data = JSON.parse(msg);
                    $jq('#sourcelang').html(data.source);
                    $jq('#targetlang').html(data.target);
                }
            })
        }
    )
});