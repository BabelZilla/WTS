var $jq = jQuery.noConflict();
$jq(document).ready(function () {
    $jq('body').on('click', '.btndel',
        function (event) {
            event.preventDefault();
            bootbox.confirm("<h5>" + deletestring + "</h5>", function (result) {
                if (result != false) {
                    deletesuggest
                }
            })
        });
    $jq('body').on('click', '.deletesuggest',
        function () {
            bootbox.confirm("<h5>Are you sure that you want to delete the suggestion?</h5>", function (result) {
                if (result != false) {
                    var suggestid = $jq('.suggest_one').data('suggestid');
                    $jq.ajax({
                        type: "POST",
                        url: 'project/ajax/deletesuggest',
                        data: 'suggestid=' + suggestid,
                        success: function (msg) {
                            var data = JSON.parse(msg);
                        }
                    })
                }
            });
        });
    $jq('body').on('click', '.ajaxPage',
        function (event) {
            event.preventDefault();
            var url = $jq(this).attr("href");
            //var page = url.replace('&page=', '');
            var context = getUrlParameters('context', url, true);
            var project = getUrlParameters('project', url, true);
            var file = getUrlParameters('file', url, true);
            var language = getUrlParameters('language', url, true);
            var ofile = getUrlParameters('ofile', url, true);
            var page = getUrlParameters('page', url, true);
            $jq('.modal-body').load('project/ajax/suggestions',
                {
                    "context": context,
                    "project": project,
                    "file": file,
                    "language": language,
                    "ofile": ofile,
                    "page": page
                });
        });
    $jq('ul.ajaxed > li').on('click', 'a', function (event) {
        event.preventDefault();
        //var url = $(this).attr("href");
        $('.modal-body').load(url);
    });

    $jq('body').on('click', '.savesuggest', function () {
        var s_one = encodeURI($jq('.suggest_one').val());
        var s_other = encodeURI($jq('.suggest_other').val());
        var s_two = encodeURI($jq('.suggest_two').val());
        var s_few = encodeURI($jq('.suggest_few').val());
        var s_many = encodeURI($jq('.suggest_many').val());
        var s_zero = encodeURI($jq('.suggest_zero').val());
        var context = $jq('.suggest_one').data('context');

        $jq('#savebtn').hide();
        $jq('#myModal').modal('hide');
        $jq.ajax({
            type: "POST",
            url: 'project/ajax/savesuggest',
            data: 's_one=' + s_one + '&s_other=' + s_other + '&s_two=' + s_two + '&s_few=' + s_few + '&s_many=' + s_many + '&s_zero' + s_zero + '&project=' + project + '&fileId=' + file + '&language=' + language + '&ofile=' + ofile + '&context=' + context,
            success: function (msg) {
                var data = JSON.parse(msg);
                alert(data.id);
            }
        })
    });

    $jq('body').on('click', '.msuggest', function (event) {
        var currentId = $jq(this).data('oid');
        var context = $jq(this).data('context');
        if (!$jq(this).hasClass('disabled')) {
            $jq('#com-' + currentId).load('/project/ajax/suggestions',
                {
                    "context": context,
                    "project": project,
                    "file": file,
                    "language": language,
                    "ofile": ofile
                });
            $jq('#com-' + currentId).toggle("slow");
        }
    });

    $jq('body').on('click', '.mpreview', function () {
        var context = $jq(this).data('context');
        $jq('#myModalLabel').text('Preview');
        $jq('.modal-body').load('/project/ajax/preview',
            {
                "context": context,
                "project": project,
                "file": file,
                "language": language,
                "ofile": ofile
            }, function (result) {
                $jq('#savebtn').hide();
                $jq('#newbtn').hide();
                $jq('#deletebtn').hide();
                $jq('#sModal').foundation('reveal', 'open');
            })
    });

    $jq('body').on('click', '.mversions', function () {
        var currentId = $jq(this).data('sid');
        var context = $jq(this).data('context');
        var versions = $jq(this).data('versions');
        var show = $jq(this).data('show');
        if (!$jq(this).hasClass('disabled')) {
            $jq('#com-' + currentId).load('/project/ajax/versions',
                {
                    "context": context,
                    "project": project,
                    "file": file,
                    "language": language,
                    "ofile": ofile,
                    "versions": versions,
                    "show": show
                });
            $jq('#com-' + currentId).toggle("slow");
        }
    });

    $jq('textarea').autosize()

    $jq('.live').change(function () {
        var itemValue = encodeURI($jq(this).val());
        var itemName = $jq(this).attr('name');
        var plural = $jq(this).data('plural');
        var QuesID = $jq(this).attr('id');
        var typeID = "textarea";
        $jq.ajax({
            type: "POST",
            url: '/project/ajax/save',
            data: 'itemValue=' + itemValue + '&itemName=' + itemName + '&QuesID=' + QuesID + '&typeID=' + typeID + '&project=' + project + '&fileId=' + file + '&language=' + language + '&plural=' + plural + '&ofile=' + ofile,
            success: function (msg) {
                var data = JSON.parse(msg);
                alert(data.change);
                $jq('#row-' + data.id).removeClass('status-untranslated').addClass(data.change)
                //$jq('#row-' + data.id).replaceWith(data.row);
            }
        })
    });


});


function getUrlParameters(parameter, staticURL, decode) {
    /*
     Function: getUrlParameters
     Description: Get the value of URL parameters either from
     current URL or static URL
     Author: Tirumal
     URL: www.code-tricks.com
     */
    var currLocation = (staticURL.length) ? staticURL : window.location.search,
        parArr = currLocation.split("?")[1].split("&"),
        returnBool = true;

    for (var i = 0; i < parArr.length; i++) {
        parr = parArr[i].split("=");
        if (parr[0] == parameter) {
            return (decode) ? decodeURIComponent(parr[1]) : parr[1];
            returnBool = true;
        } else {
            returnBool = false;
        }
    }

    if (!returnBool) return false;
}