<style>
    .reposelect {
        height: 10.0rem;
    }

    .panel h5 {
        font-size: 1.35rem;
    }

    .vertical-align {
        position: relative;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }
</style>
<div class="row">
    <div class="columns large-6">
        <?php
        echo $repo_html
        ?>
    </div>
    <div class="columns large-6">
        <div class="panel">
            <h5 class="text-center">Select the repository you want to clone/update</h5><br/>

            <p class="text-center"><a href="#" class="button [radius round] norm">Go!</a></p>
        </div>
    </div>
</div>
<div class="row">
    <div class="columns large-12">
        <div class="panel">
            Cloning into 'dev-foxshop'...<br/>
            remote: Reusing existing pack: 504, done.<br/>
            remote: Total 504 (delta 0), reused 0 (delta 0)<br/>
            Receiving objects: 100% (504/504), 728.00 KiB | 406 KiB/s, done.<br/>
            Resolving deltas: 100% (124/124), done.
        </div>
    </div>
</div>
<div class="row">
    <div class="columns large-12">
        <p class="text-center"><a href="#" class="button [radius round] norm">Click here to import it into the WTS</a>
        </p>
    </div>
</div>