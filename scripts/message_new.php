<?php

$smarty->assign('values', array(
  'recipients' => $_REQUEST['rec'] ? $_REQUEST['rec'] : '',
  'subject' => $_REQUEST['sub'] ? $_REQUEST['sub'] : '',
  'body' => $_REQUEST['body'] ? $_REQUEST['body'] : '',
));
$content = $smarty->fetch('message_new.tpl');

die($content);
