<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
error_reporting(E_ERROR);

if (!session_id()) session_start();

$appsDir=  getenv('AdminLTEAppsDir');
$dataDir=  getenv('SueDataDir');
define('APP_DIR',$appsDir);
define('DATA_DIR',$dataDir);
define('WEB_DIR',APP.DIR."web".DIRECTORY_SEPARATOR);
define('LIB_DIR',APP_DIR."lib".DIRECTORY_SEPARATOR);
require_once DATA_DIR."config.php";


require_once LIB_DIR."utils.class.php";
?>