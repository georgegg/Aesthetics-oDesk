<?php

$last = $_REQUEST['last'] ? $_REQUEST['last'] : 0;
$job = $_REQUEST['job'] ? $_REQUEST['job'] : null;

$offers_data = Application::getOffers($last, $job);

$total = $offers_data->offers->lister->total_items;
$offers = $offers_data->offers->offer;
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