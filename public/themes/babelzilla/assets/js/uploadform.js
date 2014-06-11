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

    $jq("#fine-uploader").fineUploader
    ({
        debug: true,
        request: {
            endpoint: 'ajax/upload'
        },
        deleteFile: {
            enabled: true,
            endpoint: 'ajax/delete'
        },
        retry: {
            enableAuto: true
        }
    }).on('complete', function (event, id, name, response) {
            $jq('#busy4').activity({segments: 12, width: 5.5, space: 6, length: 13, color: '#252525', speed: 1.5});
            $jq('#FineUploader').hide();
            $jq('#warnmessage').hide();
            $jq('#formdiv_1').hide();
            $jq('#formdiv_2').hide();
            $jq('#formdiv_3').hide();
            $jq('#messages').append('<div class="alert alert-success" style="margin: 20px 0 0; text-align: center;">Successfully uploaded ' + name + '</div>');
            var jqxhr = $jq.post('ajax/extract',
                { archname: name,
                    upname: response.filename
                }
                , function (data) {
                    if (data.status == 'success') {
                        $jq("#messages").append(data.message);
                        var jqxhr = $jq.post('ajax/postupload',
                            { archname: data.path}
                            , function (data) {

                                if (data.status == 'success') {
                                    $jq("#messages").append(data.message);
                                    $jq('#busy4').activity(false);
                                    $jq("#messages").append(data.clink);
                                }
                                else if (data.status == 'error') {

                                    $jq("#messages").append(data.message);
                                    $jq('#busy4').activity(false);
                                }
                            })
                    }
                    else if (data.status == 'error') alert("Error on query!");
                })
        });
});
