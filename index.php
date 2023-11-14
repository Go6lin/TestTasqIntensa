<?php

require_once 'Controller/RefTransfer.php';

use Controller\RefTransfer;

$redirect = new RefTransfer();

$uri = $_SERVER['REQUEST_URI'];

if ($uri == '/')
{

}
else
{

    $redirect->transferURI($uri);

}

require_once 'View/main.php';