<?php

class DownloadController extends \BaseController
{
    function downloadproject
    {

        return Response::download($pathToFile);
    }
}

 