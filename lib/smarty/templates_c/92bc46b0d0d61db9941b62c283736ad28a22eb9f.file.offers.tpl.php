<?php /* Smarty version Smarty-3.1.8, created on 2012-09-13 16:22:47
         compiled from "/Applications/MAMP/htdocs/aesthetics_odesk/templates/offers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1779568886504f515635f5e8-97595573%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92bc46b0d0d61db9941b62c283736ad28a22eb9f' => 
    array (
      0 => '/Applications/MAMP/htdocs/aesthetics_odesk/templates/offers.tpl',
      1 => 1347542565,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1779568886504f515635f5e8-97595573',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_504f51564c25d3_48950389',
  'variables' => 
  array (
    'job' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_504f51564c25d3_48950389')) {function content_504f51564c25d3_48950389($_smarty_tpl) {?><div class="page-header">
  <h1>Offers <small><?php if ($_smarty_tpl->tpl_vars['job']->value){?>[Job: #<?php echo $_smarty_tpl->tpl_vars['job']->value->reference;?>
: <?php echo $_smarty_tpl->tpl_vars['job']->value->title;?>
]<?php }else{ ?>[All Jobs]<?php }?></small></h1>
</div>

<div class="row-fluid">
  <div class="span9">
    <table class="table">
      <thead>
        <tr>
          <th width="150px">Applicant</th>
          <th>Job</th>
          <th width="80px">Price</th>
          <th width="120px">ETA</th>
          <th width="80px">Status</th>
        </tr>
      </thead>
      <tbody id="offerslist">
      </tbody>
    </table>
  </div>
  <div  class="span3 admin_bar admin_bar_resource">
    <div class="well">
      <h2><i class="icon-question-sign"></i> Help</h2>
      <?php if ($_smarty_tpl->tpl_vars['job']->value){?>
      <p>Offers made for job: <strong>#<?php echo $_smarty_tpl->tpl_vars['job']->value->reference;?>
</strong>, <u>(<?php echo $_smarty_tpl->tpl_vars['job']->value->title;?>
)</u> under <strong><?php echo @OD_COMPANY;?>
</strong> account.</p>
      <?php }else{ ?>
      <p>Offers made for jobs under <strong><?php echo @OD_COMPANY;?>
</strong> account.</p>
      <?php }?>
    </div>
  </div>
</div>
<script>
var job = null;
<?php if ($_smarty_tpl->tpl_vars['job']->value){?>
job = <?php echo $_smarty_tpl->tpl_vars['job']->value->reference;?>
;
<?php }?>
</script>


<script>
  $(document).ready(function(){

    function loadOffers(last){
      return $.ajax({
        type: 'GET',
        dataType: 'HTML',
        url: 'index.php?action=load_offers&last='+last,
        async: false
      }).responseText;
    }

    function doLoadOffers(last){
      $("a#showmore-offers").parent('td').parent('tr').remove();
      $('#offerslist').append(loadOffers(last));
      $("a#showmore-offers").click(function(e){
        e.preventDefault();
        doLoadOffers($(this).attr('rel'));
      })
    }

    $("a#showmore-offers").click(function(e){
      e.preventDefault();
      doLoadOffers($(this).attr('rel'));
    })
    if (job){
      doLoadOffers(0+'&job='+job);
    } else {
      doLoadOffers(0);
    }
  });
</script>
<?php }} ?>