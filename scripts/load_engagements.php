<?php

$last = $_REQUEST['last'] ? $_REQUEST['last'] : 0;
$status = $_REQUEST['status'] ? (string) $_REQUEST['status'] : 'active';
$job = $_REQUEST['job'] ? $_REQUEST['job'] : null;

$eng_data = Application::getEngagements($last, $status, $job);

$total = $eng_data->engagements->lister->total_count;
$engagements = $eng_data->engagements->engagement;
//var_dump($engagements);
//die();
//assign values
$smarty->assign('total', $total);
$smarty->assign('job', $job);
$smarty->assign('last', $last);
$smarty->assign('team_ref', Application::getCompany());

if (is_array($engagements)){
  $smarty->assign('engagements',  Application::getEngagementsLocalStatus($engagements));
} else {
  $smarty->assign('engagements',  Application::getEngagementsLocalStatus(array($engagements)));
}
$content = $smarty->fetch('load_engagements.tpl');

die($content);