<?php

namespace Controller;
require_once './Model/RefList.php';



use Model\RefList;

class RefTransfer
{

    private $model;

    public function __construct()
    {

        $this->model = new RefList();

    }

    /**
     * @param $orig
     * @return void
     */

    public function saveRef($orig)
    {

        $original = $orig;
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $cutted = substr(str_shuffle($permitted_chars), 0, 6);
        $cuttetSafe = '/' . $cutted;
        ?>
        <div class="result">
            <a href="<?= $original ?>"><?=$_SERVER['SERVER_NAME']. '/' . $cutted ?> </a>
        </div>
        <?php
        $this->model->insertRef($original, $cuttetSafe);

        }

    /**
     * @param $uri
     * @return void
     */

    public function transferURI ($uri)
    {

        $safeURI = htmlentities($uri);
        $this->model->redirect($safeURI);

    }



}