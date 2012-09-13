<?php
$job = $_REQUEST['job'] ? $_REQUEST['job'] : null;

if ($job) {
  $job_data = Application::getJob($job);
  $smarty->assign('job', $job_data);
}
$content = $smarty->fetch('offers.tpl');