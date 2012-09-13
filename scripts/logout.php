<?php
$sig = md5(OD_SECRET . 'api_key' . OD_API_KEY . 'api_token' . $_COOKIE['odesk_api_token'] . 'onlinealltzmine');

$params = array(
  'api_key' => OD_API_KEY,
  'api_sig' => $sig,
  'api_token' => $_COOKIE['odesk_api_token'],
);

$resp = $api->delete_request('https://www.odesk.com/api/auth/v1/keys/token.json', $params);

//print_r($params);
//var_dump($resp);
//die();
//unset($_SESSION['saved_token_id']);
//unset($_COOKIE['odesk_api_token']);

header("Location: ./?action=index");