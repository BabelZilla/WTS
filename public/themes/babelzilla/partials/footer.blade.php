<footer>
    <div class="row widgets-block">
        <div class="small-12 large-6 column widget">
            <h4>{{ Trans('wts.statistics') }}</h4>

            <p>{{ Trans('wts.stats1',
                array( 'countprojects' => $countprojects,
                'countlanguages' => $countlanguages,
                'countlocalizations' => $counttranslations,
                )
                ) }}
            </p>

            <div class="">
                <div class="clear"></div>
            </div>
        </div>
        <div class="small-12 large-3 column widget">
            <h4>{{ Trans('wts.about') }}</h4>
            <ul class="link-list">
                <li><a href="/terms">{{ Trans('wts.terms') }}</a></li>
                <li><a href="/privacy">{{ Trans('wts.privacy') }}</a></li>
                <li><a href="/imprint">{{ Trans('wts.imprint') }}</a></li>
            </ul>
        </div>
        <div class="small-12 large-3 column widget">
            <h4 class="title">{{ Trans('wts.external') }}</h4>
            <span class="twitter-button">
                <a href="https://twitter.com/babelzilla">
                    <span class="fa-stack fa-2x">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-twitter fa-inverse fa-stack-1x"></i>
                    </span>
                </a>
            </span>
            <span class="github-button">
                <a href="https://github.com/babelzilla">
                    <span class="fa-stack fa-2x">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            </span>
        </div>
    </div>
    <div class="copyrights text-center">
        &copy; Copyright no one at all. Go to town.
    </div>
</footer>