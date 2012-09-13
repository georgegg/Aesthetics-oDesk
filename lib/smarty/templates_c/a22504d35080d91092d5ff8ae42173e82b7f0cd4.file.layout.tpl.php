<?php /* Smarty version Smarty-3.1.8, created on 2012-09-06 18:21:56
         compiled from "/Applications/MAMP/htdocs/Aesthetics_oDesk/templates/layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17582557035048a690266148-76822534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a22504d35080d91092d5ff8ae42173e82b7f0cd4' => 
    array (
      0 => '/Applications/MAMP/htdocs/Aesthetics_oDesk/templates/layout.tpl',
      1 => 1346944914,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17582557035048a690266148-76822534',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5048a690278825_21596148',
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5048a690278825_21596148')) {function content_5048a690278825_21596148($_smarty_tpl) {?><!DOCTYPE html >
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="title" content="CMDB for AM team">
    <title>Aesthetics oDesk App</title>

    <link rel="stylesheet" type="text/css" media="all" href="resources/css/bootstrap.min.noicons.css">
    <link rel="shortcut icon" href="/favicon.ico"><link rel="stylesheet" type="text/css" media="all" href="resources/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" type="text/css" media="all" href="resources/css/font-awesome.css">
    <!--[if lt IE 8]><link rel="stylesheet" type="text/css" media="screen" href="resources/css/font-awesome-ie7.css" /><![endif]-->
    <link rel="stylesheet" type="text/css" media="all" href="resources/css/main.css">
    <script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
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
          <a class="brand" href="./?action=index"><span style="color: #0088CC;">Aesthetics</span> <span style="font-size: 13px;">oDesk App</span></a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="./?action=index"><i class="icon-home"></i> Home</a></li>
              <li class=""><a href="./"><i class="icon-tasks"></i> Jobs</a></li>
              <li class=""><a href="./"><i class="icon-user"></i> Offers</a></li>
              <li class=""><a href="./"><i class="icon-certificate"></i> Contracts</a></li>
            </ul>
            <ul class="nav pull-right">
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
          <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

        </div>
      </div>
      <hr>
      <footer>
        <p class="pull-left">Developed by <a target="_blank" href="http://www.mediascape.gr" style="color: #B94A48;"><strong>Mediascape Ltd</strong></a> <br>© 2012, Harvard University.</p>
      </footer>
    </div>

  </body>
</html>
<?php }} ?>