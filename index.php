<?php

error_reporting(E_ALL ^ E_NOTICE);

require 'lib/oDeskAPI.lib.php';
require 'config/config.php';
require('lib/smarty/Smarty.class.php');
require 'lib/helper.php';
require 'lib/application.php';

$action = isset($_REQUEST['action']) ? strtolower($_REQUEST['action']) : 'index';
$is_authed = false;
$helper = new Helper();
$application = new Application();

try {
  $api = $application->getApi();
} catch (Exception $e) {
  echo '<pre>Error: ' . $e->getMessage() . '</pre>';
}
if ($action != 'error' || $action != 'contract_complete') {
  if (!isset($_SESSION['odesk_api_token'])) {
    $token = $api->auth();
    $check = Application::checkUser();
    session_start();
    $_SESSION['odesk_api_token'] = $token;
    session_write_close();
    if (!$check) {
      header("Location: ./?action=error&code=401");
    } else {
      $is_authed = true;
    }
  } else {
    $api->option('api_token', $_SESSION['odesk_api_token']);
    $is_authed = true;
  }
}
$base = realpath(dirname(__FILE__));
$smarty = new Smarty();
$smarty->setTemplateDir($base . '/templates');
$smarty->setCompileDir($base . '/lib/smarty/templates_c');
$smarty->setCacheDir($base . '/lib/smarty/cache');
$smarty->setConfigDir($base . '/lib/smarty/configs');
$smarty->setPluginsDir($base . '/plugins');

$content = '';
$script = $base . '/scripts/' . $action . '.php';
if (file_exists($script)) {
  require $script;
} else {
  header("Location: ./?action=error");
}
$smarty->assign('active', $action);
$smarty->assign('is_authed', $is_authed);
$smarty->assign('content', $content);
$smarty->display('layouts/default.tpl');