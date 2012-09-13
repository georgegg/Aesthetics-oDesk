<?php /* Smarty version Smarty-3.1.8, created on 2012-09-07 18:42:31
         compiled from "jobs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1311916090504a13d953d507-09381818%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34351cbea9fb0745165d8e45acc78e82cf596293' => 
    array (
      0 => 'jobs.tpl',
      1 => 1347032547,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1311916090504a13d953d507-09381818',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_504a13d96c18d8_31767333',
  'variables' => 
  array (
    'total' => 0,
    'jobs' => 0,
    'job' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_504a13d96c18d8_31767333')) {function content_504a13d96c18d8_31767333($_smarty_tpl) {?><div class="page-header">
  <h1>Jobs <small>List</small><a class="pull-right btn btn-success" href="#"><i class="icon-plus"></i> Add</a></h1>
</div>

<div class="row-fluid">
  <div class="span9">
    <?php if ($_smarty_tpl->tpl_vars['total']->value>0){?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Job</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th colspan="1">
            Total: <?php echo $_smarty_tpl->tpl_vars['total']->value;?>

          </th>
        </tr>
      </tfoot>
      <tbody>
          <?php  $_smarty_tpl->tpl_vars['job'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['job']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['jobs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['job']->key => $_smarty_tpl->tpl_vars['job']->value){
$_smarty_tpl->tpl_vars['job']->_loop = true;
?>
          <tr>
            <a href="<?php echo $_smarty_tpl->tpl_vars['job']->value['public_url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['job']->value['title'];?>
</a>
          </tr>
          <?php } ?>
      </tbody>
    </table>
    <?php }else{ ?>
    No jobs available yet!!
    <?php }?>
  </div>
  <div  class="span3 admin_bar admin_bar_resource">
    <div class="well">
      <h2><i class="icon-question-sign"></i> Help</h2>
      <p>Jobs you posted!</p>
    </div>
  </div>
</div><?php }} ?>