<?php

use http\Client;

session_start();

    include ($_SERVER['DOCUMENT_ROOT']. '/customClearance/models/MainModel.php');
    $mainModel = new MainModel();
