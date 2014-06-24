<div class="widgetwrap">
    <div class="widget feature-posts">
        <h4 class="widgettitle">Marketplace</h4>
        @if($search)
        <table width="100%" style="font-size:1.0em;">
            <tr>
                <td>
                    <div style="padding-top: -5px;">{{ Trans('wts.rating') }}</div>
                </td>
                <td>
                        <span
                            class="stars stars-{{ $search->appInfo['ratings']['average'] }} title='{{ Trans('wts.rated')}} {{ $search->appInfo['ratings']['average'] }} {{ Trans('wts.outof5') }}'">&nbsp;</span>
                </td>
            </tr>
            <tr>
                <td>
                    {{ Trans('wts.version') }}
                </td>
                <td>
                    {{ $search->appInfo['current_version'] }}
                </td>
            </tr>
            <tr>
            <tr>
                <td>
                    {{ Trans('wts.apptype') }}
                </td>
                <td>
                    <?= strtoupper($search->appInfo['premium_type']); ?><br/>
                </td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td colspan="2">
                </td>
            <tr>
            <tr>
                <td colspan="2" class="text-center">
                    <a href="https://marketplace.firefox.com/app/<?= $search->appInfo['slug'] ?>"
                       class="btn btn-success">{{ Trans('wts.getitmarketplace') }}</a>
                </td>
            <tr>
        </table>
        @else
        <table>
            <tr>
                <td colspan="4" class="text-center">
                    @lang('wts.appnotfound', ['appname' => str_limit($project->name, $limit = 20, $end = '&hellip;')])
                </td>
            </tr>
        </table>
        @endif

    </div>
</div>
 