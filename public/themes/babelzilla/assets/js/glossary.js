var $jq = jQuery.noConflict();
$jq(document).ready(function () {
    $jq('body').on('click', '.editbtn',
        function (event) {
            event.preventDefault();
            var definition = $jq(this).data('definition');
            var term = $jq(this).data('term');
            var id = $jq(this).data('id');
            $jq('#definition').text(definition);
            $jq('#term').val(term);
            $jq('#sModal').foundation('reveal', 'open');
        }
    );
});