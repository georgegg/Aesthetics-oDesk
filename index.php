<?php

error_reporting(E_ALL ^ E_NOTICE);
require 'lib/oDeskAPI.lib.php';
require 'config/config.php';
require('lib/smarty/Smarty.class.php');
require 'lib/application.php';

try {
  // create API's library object'
  $api = new oDeskAPI(OD_SECRET, OD_API_KEY);
} catch (Exception $e) {
  echo '<pre>Error: ' . $e->getMessage() . '</pre>';
}
if (!isset($_SESSION['saved_token_id'])) {
    $token = $api->auth(); // auth using your login and pass to authorize app
    $_SESSION['saved_token_id'] = $token; // save your token using prefered method
} else {
    $api->option('api_token', $_SESSION['saved_token_id']); // use saved token, then you app do not require...
}
$base = realpath(dirname(__FILE__));
$smarty = new Smarty();
$smarty->setTemplateDir($base . '/templates');
$smarty->setCompileDir($base . '/lib/smarty/templates_c');
$smarty->setCacheDir($base . '/lib/smarty/cache');
$smarty->setConfigDir($base . '/lib/smarty/configs');

$content = '';
$action = isset($_REQUEST['action']) ? strtolower($_REQUEST['action']) : 'index';
$script = $base . '/scripts/' . $action . '.php';
if (file_exists($script)) {
  require $script;
}
$smarty->assign('active', $action);
$smarty->assign('content', $content);
$smarty->display('layout.tpl');