<?php
session_start();
require_once('./app/database/bdd.php');
require_once('./app/collectData.php');

if(isset($_SESSION['computerName'])){
    $computerName = $_SESSION['computerName'];
    $computerKey = GetComputerKey($computerName);
}

require_once('./views/inc_main_view.php');