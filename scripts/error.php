<?php
if($_REQUEST['code'] && $_REQUEST['code'] == 401){
  $smarty->assign('message', array('type'=> 'error', 'body'=>'<h4>WARNING!!!</h4>You cannot access this application!!!'));
} else {
  $smarty->assign('message', array('type'=> 'error', 'body'=>'<h4>404</h4>The page you requested cannot be found!!!'));
}
if($helper->isXmlHttpRequest()) {
  $content = $smarty->fetch('error.tpl');
  die($content);
}
