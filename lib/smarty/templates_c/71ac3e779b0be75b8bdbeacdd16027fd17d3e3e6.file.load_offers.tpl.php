<?php /* Smarty version Smarty-3.1.8, created on 2012-09-13 16:21:06
         compiled from "/Applications/MAMP/htdocs/aesthetics_odesk/templates/load_offers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8611661115050816a37f059-28837273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71ac3e779b0be75b8bdbeacdd16027fd17d3e3e6' => 
    array (
      0 => '/Applications/MAMP/htdocs/aesthetics_odesk/templates/load_offers.tpl',
      1 => 1347542461,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8611661115050816a37f059-28837273',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5050816a5718d3_73320487',
  'variables' => 
  array (
    'total' => 0,
    'offers' => 0,
    'offer' => 0,
    'last' => 0,
    'job' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5050816a5718d3_73320487')) {function content_5050816a5718d3_73320487($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['total']->value>0){?>
  <?php  $_smarty_tpl->tpl_vars['offer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['offer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['offers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['offer']->key => $_smarty_tpl->tpl_vars['offer']->value){
$_smarty_tpl->tpl_vars['offer']->_loop = true;
?>
    <tr>
      <td>
        <a href="<?php echo $_smarty_tpl->tpl_vars['offer']->value->provider__profile_url;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['offer']->value->provider__name;?>
</a>
      </td>
      <td>
        <?php echo $_smarty_tpl->tpl_vars['offer']->value->job__title;?>

      </td>
      <td>
        $ <?php echo $_smarty_tpl->tpl_vars['offer']->value->fixed_charge_amount_agreed;?>

      </td>
      <td>
        <?php echo $_smarty_tpl->tpl_vars['offer']->value->estimated_duration;?>

      </td>
      <td>
        <?php if ($_smarty_tpl->tpl_vars['offer']->value->status){?>
          <?php if ($_smarty_tpl->tpl_vars['offer']->value->status=='rejected'){?>
          <span class="label label-important">Rejected</span>
          <?php }elseif($_smarty_tpl->tpl_vars['offer']->value->status=='open'){?>
          <span class="label label-info">Open</span>
          <?php }elseif($_smarty_tpl->tpl_vars['offer']->value->status=='accepted'){?>
          <span class="label label-success">Accepted</span>
          <?php }elseif($_smarty_tpl->tpl_vars['offer']->value->status=='cancelled'){?>
          <span class="label label-warning">Canceled</span>
          <?php }else{ ?>
            <span class="label"><?php echo $_smarty_tpl->tpl_vars['offer']->value->status;?>
</span>
          <?php }?>
        <?php }else{ ?>
          <span class="label">no candidacy</span>
        <?php }?>
      </td>
    </tr>
  <?php } ?>
  <?php if ($_smarty_tpl->tpl_vars['total']->value>=10){?>
    <tr>
      <td colspan="5">
        <a id="showmore-offers" class="btn btn-primary" href="#" rel="<?php echo $_smarty_tpl->tpl_vars['last']->value+$_smarty_tpl->tpl_vars['total']->value;?>
<?php if ($_smarty_tpl->tpl_vars['job']->value){?>&job=<?php echo $_smarty_tpl->tpl_vars['job']->value;?>
<?php }?>"><i class="icon-download"></i> Load more</a>
      </td>
    </tr>
  <?php }?>
<?php }else{ ?>
<?php if ($_smarty_tpl->tpl_vars['last']->value==0){?>
<tr>
  <td colspan="5">
    No offers!!!
  </td>
</tr>
<?php }?>
<?php }?><?php }} ?>