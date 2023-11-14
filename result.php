<?php

require_once 'Controller/RefTransfer.php';

use Controller\RefTransfer;

$save = new RefTransfer();

$original = $_POST["original"];

$save->saveRef($original);
