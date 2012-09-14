<?php

$params = array(
  'api_key' => OD_API_KEY,
  'api_token' => $_COOKIE['odesk_api_token'],
);

$resp = $api->delete_request('https://www.odesk.com/api/auth/v1/keys/token.json', $params);

setcookie('odesk_api_token', null);

header("Location: ./?action=index");
