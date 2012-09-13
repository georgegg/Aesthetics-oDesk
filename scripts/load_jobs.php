<?php

$last = $_REQUEST['last'] ? $_REQUEST['last'] : 0;
$status = $_REQUEST['status'] ? (string) $_REQUEST['status'] : 'open';

$jobs_data = Application::getJobs($last, $status);

$total = $jobs_data->jobs->lister->total_items;
$jobs = $jobs_data->jobs->job;

$smarty->assign('total', $total);
$smarty->assign('jobs', $jobs);
$smarty->assign('last', $last);

if (is_array($jobs)){
  $content = $smarty->fetch('load_jobs.tpl');
} else {
  $content = $smarty->fetch('load_job.tpl');
}

die($content);