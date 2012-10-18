<?php
$job = $_REQUEST['job'] ? $_REQUEST['job'] : null;
$smarty->assign('status', $_REQUEST['status'] ? (string) $_REQUEST['status'] : 'active');
if ($job) {
  $job_data = Application::getJob($job);
  $smarty->assign('job', $job_data);
}
$content = $smarty->fetch('contracts.tpl');