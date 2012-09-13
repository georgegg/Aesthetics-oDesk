<?php /* Smarty version Smarty-3.1.8, created on 2012-09-13 16:22:09
         compiled from "/Applications/MAMP/htdocs/aesthetics_odesk/templates/load_offer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20941573795050b45a2f5ba8-43074656%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2d430bb78b17ae7471597a53169f2df5d94b1b2' => 
    array (
      0 => '/Applications/MAMP/htdocs/aesthetics_odesk/templates/load_offer.tpl',
      1 => 1347542415,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20941573795050b45a2f5ba8-43074656',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5050b45a396946_27877477',
  'variables' => 
  array (
    'total' => 0,
    'offers' => 0,
    'last' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5050b45a396946_27877477')) {function content_5050b45a396946_27877477($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['total']->value>0){?>
<tr>
  <td>
    <a href="<?php echo $_smarty_tpl->tpl_vars['offers']->value->provider__profile_url;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['offers']->value->provider__name;?>
</a>
  </td>
  <td>
    <?php echo $_smarty_tpl->tpl_vars['offers']->value->job__title;?>

  </td>
  <td>
    $ <?php echo $_smarty_tpl->tpl_vars['offers']->value->fixed_charge_amount_agreed;?>

  </td>
  <td>
    <?php echo $_smarty_tpl->tpl_vars['offers']->value->estimated_duration;?>

  </td>
  <td>
    <?php if ($_smarty_tpl->tpl_vars['offers']->value->status){?>
      <?php if ($_smarty_tpl->tpl_vars['offers']->value->status=='rejected'){?>
      <span class="label label-important">Rejected</span>
      <?php }elseif($_smarty_tpl->tpl_vars['offers']->value->status=='open'){?>
      <span class="label label-info">Open</span>
      <?php }elseif($_smarty_tpl->tpl_vars['offers']->value->status=='accepted'){?>
      <span class="label label-success">Accepted</span>
      <?php }elseif($_smarty_tpl->tpl_vars['offers']->value->status=='cancelled'){?>
      <span class="label label-warning">Canceled</span>
      <?php }else{ ?>
        <span class="label"><?php echo $_smarty_tpl->tpl_vars['offers']->value->status;?>
</span>
      <?php }?>
    <?php }else{ ?>
      <span class="label">no candidacy</span>
    <?php }?>
  </td>
</tr>
<?php }else{ ?>
<?php if ($_smarty_tpl->tpl_vars['last']->value==0){?>
<tr>
  <td colspan="5">
    No offers!!!
  </td>
</tr>
<?php }?>
<?php }?><?php }} ?>