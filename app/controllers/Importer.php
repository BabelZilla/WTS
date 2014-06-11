<?php

interface Importer
{
    public function import($strWorkingDir, $fromRepo = false, $remoteUrl = false);
}

 