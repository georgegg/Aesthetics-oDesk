<?php /* Smarty version Smarty-3.1.8, created on 2012-09-13 15:35:28
         compiled from "/Applications/MAMP/htdocs/aesthetics_odesk/templates/load_jobs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1382207165050bf07e327f4-48191576%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf5d80523af5d4a29fddfde9b5f3d33e157a0045' => 
    array (
      0 => '/Applications/MAMP/htdocs/aesthetics_odesk/templates/load_jobs.tpl',
      1 => 1347539693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1382207165050bf07e327f4-48191576',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5050bf08073590_74637887',
  'variables' => 
  array (
    'total' => 0,
    'jobs' => 0,
    'job' => 0,
    'last' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5050bf08073590_74637887')) {function content_5050bf08073590_74637887($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_convertunix')) include '/Applications/MAMP/htdocs/aesthetics_odesk/lib/smarty/plugins/modifier.convertunix.php';
?><?php if ($_smarty_tpl->tpl_vars['total']->value>0){?>
  <?php  $_smarty_tpl->tpl_vars['job'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['job']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['jobs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['job']->key => $_smarty_tpl->tpl_vars['job']->value){
$_smarty_tpl->tpl_vars['job']->_loop = true;
?>
  <tr>
    <td>
      <a href="<?php echo $_smarty_tpl->tpl_vars['job']->value->public_url;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['job']->value->title;?>
</a>
    </td>
    <td>
      <?php echo smarty_modifier_convertunix($_smarty_tpl->tpl_vars['job']->value->created_time,"Y-m-d H:i");?>

    </td>
    <td style="text-align: right;">
      <?php if ($_smarty_tpl->tpl_vars['job']->value->count_total_applicants>0){?>
      <span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['job']->value->count_total_applicants;?>
</span>
      <?php }else{ ?>
      <span class="label"><?php echo $_smarty_tpl->tpl_vars['job']->value->count_total_applicants;?>
</span>
      <?php }?>
    </td>
    <td>
      <?php if ($_smarty_tpl->tpl_vars['job']->value->status=='cancelled'){?>
      <span class="label label-warning"><?php echo $_smarty_tpl->tpl_vars['job']->value->status;?>
</span>
      <?php }elseif($_smarty_tpl->tpl_vars['job']->value->status=='open'){?>
      <span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['job']->value->status;?>
</span>
      <?php }else{ ?>
      <span class="label"><?php echo $_smarty_tpl->tpl_vars['job']->value->status;?>
</span>
      <?php }?>
    </td>
    <td>
      <div class="btn-group">
        <a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['job']->value->public_url;?>
" target="_blank" title="View job online"><i class="icon-search"></i> online</a>
        <a class="btn btn-primary" href="./?action=offers&job=<?php echo $_smarty_tpl->tpl_vars['job']->value->reference;?>
" title="View job's offers"><i class="icon-search"></i> offers</a>
      </div>
    </td>
  </tr>
  <?php } ?>
  <?php if ($_smarty_tpl->tpl_vars['total']->value>=10){?>
    <tr>
      <td colspan="5">
        <a id="showmore-jobs" class="btn btn-primary" href="#" rel="<?php echo $_smarty_tpl->tpl_vars['last']->value+$_smarty_tpl->tpl_vars['total']->value;?>
"><i class="icon-download"></i> Load more</a>
      </td>
    </tr>
  <?php }?>
<?php }else{ ?>
<?php if ($_smarty_tpl->tpl_vars['last']->value==0){?>
<tr>
  <td colspan="5">
    No jobs!!!
  </td>
</tr>
<?php }?>
<?php }?><?php }} ?>