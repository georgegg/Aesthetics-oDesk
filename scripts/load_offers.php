<?php

$last = $_REQUEST['last'] ? $_REQUEST['last'] : 0;
$job = $_REQUEST['job'] ? $_REQUEST['job'] : null;

$offers_data = Application::getOffers($last, $job);

$total = $offers_data->offers->lister->total_items;
$offers = $offers_data->offers->offer;

if (is_array($offers)){
  foreach ($offers as $key => $offer) {
    $profile = Application::getProvider(str_replace('https://www.odesk.com/users/', '', $offer->provider__profile_url));
    $offers[$key]->country = $profile->profile->dev_country;
  }
} else {
  if($total > 0 ) {
    $profile = Application::getProvider(str_replace('https://www.odesk.com/users/', '', $offers->provider__profile_url));
    $offers->country = $profile->profile->dev_country;
  }
}
//var_dump($offers);
//die();
$smarty->assign('total', $total);
$smarty->assign('job', $job);
$smarty->assign('last', $last);
$smarty->assign('offers', $offers);

if (is_array($offers)){
  $content = $smarty->fetch('load_offers.tpl');
} else {
  $content = $smarty->fetch('load_offer.tpl');
}

die($content);