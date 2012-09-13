<?php /* Smarty version Smarty-3.1.8, created on 2012-09-13 15:54:02
         compiled from "/Applications/MAMP/htdocs/aesthetics_odesk/templates/load_job.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13128368345051cfb2530129-49336095%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55beafc0cac3387817e4e1e892e0c629c998c274' => 
    array (
      0 => '/Applications/MAMP/htdocs/aesthetics_odesk/templates/load_job.tpl',
      1 => 1347539723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13128368345051cfb2530129-49336095',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5051cfb279bf91_68374299',
  'variables' => 
  array (
    'total' => 0,
    'jobs' => 0,
    'last' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5051cfb279bf91_68374299')) {function content_5051cfb279bf91_68374299($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_convertunix')) include '/Applications/MAMP/htdocs/aesthetics_odesk/lib/smarty/plugins/modifier.convertunix.php';
?><?php if ($_smarty_tpl->tpl_vars['total']->value>0){?>
<tr>
  <td>
    <a href="<?php echo $_smarty_tpl->tpl_vars['jobs']->value->public_url;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['jobs']->value->title;?>
</a>
  </td>
  <td>
    <?php echo smarty_modifier_convertunix($_smarty_tpl->tpl_vars['jobs']->value->created_time,"Y-m-d H:i");?>

  </td>
  <td style="text-align: right;">
    <?php if ($_smarty_tpl->tpl_vars['jobs']->value->count_total_applicants>0){?>
    <span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['jobs']->value->count_total_applicants;?>
</span>
    <?php }else{ ?>
    <span class="label"><?php echo $_smarty_tpl->tpl_vars['jobs']->value->count_total_applicants;?>
</span>
    <?php }?>
  </td>
  <td>
    <?php if ($_smarty_tpl->tpl_vars['jobs']->value->status=='cancelled'){?>
    <span class="label label-warning"><?php echo $_smarty_tpl->tpl_vars['jobs']->value->status;?>
</span>
    <?php }elseif($_smarty_tpl->tpl_vars['jobs']->value->status=='open'){?>
    <span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['jobs']->value->status;?>
</span>
    <?php }else{ ?>
    <span class="label"><?php echo $_smarty_tpl->tpl_vars['jobs']->value->status;?>
</span>
    <?php }?>
  </td>
  <td>
    <div class="btn-group">
      <a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['jobs']->value->public_url;?>
" target="_blank" title="View job online"><i class="icon-search"></i> online</a>
        <a class="btn btn-primary" href="./?action=offers&job=<?php echo $_smarty_tpl->tpl_vars['jobs']->value->reference;?>
" title="View job's offers"><i class="icon-search"></i> offers</a>
    </div>
  </td>
</tr>
<?php }else{ ?>
<?php if ($_smarty_tpl->tpl_vars['last']->value==0){?>
<tr>
  <td colspan="5">
    No jobs!!!
  </td>
</tr>
<?php }?>
<?php }?><?php }} ?>