<?php /* Smarty version Smarty-3.1.8, created on 2012-09-13 15:16:11
         compiled from "/Applications/MAMP/htdocs/aesthetics_odesk/templates/layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13227542125048c07612f306-69511790%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e52f8587aa1775c40de276562044e58d25f840b' => 
    array (
      0 => '/Applications/MAMP/htdocs/aesthetics_odesk/templates/layout.tpl',
      1 => 1347538563,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13227542125048c07612f306-69511790',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5048c076143211_47406997',
  'variables' => 
  array (
    'active' => 0,
    'message' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5048c076143211_47406997')) {function content_5048c076143211_47406997($_smarty_tpl) {?><!DOCTYPE html >
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="title" content="CMDB for AM team">
    <title>Aesthetics oDesk App</title>

    <link rel="stylesheet" type="text/css" media="all" href="resources/css/bootstrap.min.noicons.css">
    <link rel="stylesheet" type="text/css" media="all" href="resources/css/greenish.css">
    <link rel="shortcut icon" href="/favicon.ico"><link rel="stylesheet" type="text/css" media="all" href="resources/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" type="text/css" media="all" href="resources/css/font-awesome.css">
    <!--[if lt IE 8]><link rel="stylesheet" type="text/css" media="screen" href="resources/css/font-awesome-ie7.css" /><![endif]-->
    <link rel="stylesheet" type="text/css" media="all" href="resources/css/bootstrap-datepicker.css">
    <link rel="stylesheet" type="text/css" media="all" href="resources/css/main.css">
    <script type="text/javascript" src="resources/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="resources/js/jquery.maskMoney.js"></script>
    <script type="text/javascript" src="resources/js/jquery.chained.js"></script>
    <script type="text/javascript" src="resources/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="resources/js/application.js"></script>
  </head>
  <body>
    <!-- NAVBAR -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="./?action=index"><span>Aesthetics</span> <span style="font-size: 13px;">[oDesk App]</span></a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="<?php if (!$_smarty_tpl->tpl_vars['active']->value||$_smarty_tpl->tpl_vars['active']->value=='index'){?>active<?php }?>"><a href="./?action=index"><i class="icon-home"></i> Home</a></li>
<!--              <li class="<?php if ($_smarty_tpl->tpl_vars['active']->value==2){?>active<?php }?>"><a href="./?action=jobs"><i class="icon-tasks"></i> Jobs</a></li>-->
              <li class="dropdown <?php if ($_smarty_tpl->tpl_vars['active']->value=='jobs'||$_smarty_tpl->tpl_vars['active']->value=='new_job'){?>active<?php }?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-tasks"></i> Jobs <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="<?php if ($_smarty_tpl->tpl_vars['active']->value=='jobs'){?>active<?php }?>"><a href="./?action=jobs"><i class="icon-tasks"></i> List</a></li>
                  <li class="divider"></li>
                  <li class="<?php if ($_smarty_tpl->tpl_vars['active']->value=='new_job'){?>active<?php }?>"><a href="./?action=new_job"><i class="icon-plus"></i> Add new</a></li>
                </ul>
              </li>
              <li class="<?php if ($_smarty_tpl->tpl_vars['active']->value=='offers'){?>active<?php }?>"><a href="./?action=offers"><i class="icon-user"></i> Offers</a></li>
              <li class="<?php if ($_smarty_tpl->tpl_vars['active']->value=='contracts'){?>active<?php }?>"><a href="./?action=contracts"><i class="icon-certificate"></i> Contracts</a></li>
            </ul>
            <ul class="nav pull-right">
              <li><a href="#"><i class="icon-question-sign"></i> Help</a></li>
              <li><a href="./?action=logout"><i class="icon-off"></i> Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- NAVBAR END -->
    <div class="container">
      <div class="row-fluid">
        <div class="span12">
          <?php if ($_smarty_tpl->tpl_vars['message']->value){?>
          <div class="alert alert-<?php echo $_smarty_tpl->tpl_vars['message']->value['type'];?>
">
            <button type="button" class="close" data-dismiss="alert" style="font-size: 15px;"><i class="icon-remove"></i></button>
            <h4><?php echo $_smarty_tpl->tpl_vars['message']->value['type'];?>
<small>:</small></h4>
            <i class="icon-info-sign"></i> <?php echo $_smarty_tpl->tpl_vars['message']->value['body'];?>

          </div>
          <?php }?>
          <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

        </div>
      </div>
      <hr>
      <footer>
        <p class="pull-left">Developed by <a target="_blank" href="http://www.mediascape.gr" style="color: #B94A48;"><strong>Mediascape Ltd</strong></a> <br>¬© 2012, Harvard University.</p>
      </footer>
    </div>

  </body>
</html>
<?php }} ?>