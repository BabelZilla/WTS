/**
 * Created by jbt on 24.05.14.
 */
var $jq = jQuery.noConflict();
function equalHeight(group) {
    tallest = 0;
    group.each(function () {
        thisHeight = $jq(this).height();
        if (thisHeight > tallest) {
            tallest = thisHeight;
        }
    });
    group.height(tallest);
}

// Wait until the DOM is 'ready'
$jq(document).ready(function () {
    equalHeight($jq(".eq"));
});
