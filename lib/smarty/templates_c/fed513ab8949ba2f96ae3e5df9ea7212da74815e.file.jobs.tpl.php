<?php /* Smarty version Smarty-3.1.8, created on 2012-09-13 16:06:22
         compiled from "/Applications/MAMP/htdocs/aesthetics_odesk/templates/jobs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1076155541504a235034c0f8-84487355%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fed513ab8949ba2f96ae3e5df9ea7212da74815e' => 
    array (
      0 => '/Applications/MAMP/htdocs/aesthetics_odesk/templates/jobs.tpl',
      1 => 1347541580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1076155541504a235034c0f8-84487355',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_504a23503eb0c0_71784354',
  'variables' => 
  array (
    'status' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_504a23503eb0c0_71784354')) {function content_504a23503eb0c0_71784354($_smarty_tpl) {?><div class="page-header">
  <h1>Jobs <small>List</small></h1>
</div>
<header class="jumbotron subhead" id="overview">
<div class="subnav">
  <ul class="nav nav-pills">
    <li class=""><a class="" href="./?action=new_job"><i class="icon-plus"></i> Post new</a></li>
    <li class=""><a class="" href="./?action=jobs&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
"><i class="icon-refresh"></i> Refresh jobs</a></li>
  </ul>
</div>
</header>
<div class="row-fluid">
  <div class="span9">
    <ul class="nav nav-pills">
      <li class="<?php if ($_smarty_tpl->tpl_vars['status']->value=='all'){?>active<?php }?>"><a href="./?action=jobs&status=all">All</a></li>
      <li class="<?php if ($_smarty_tpl->tpl_vars['status']->value=='open'){?>active<?php }?>"><a href="./?action=jobs&status=open">Open</a></li>
      <li class="<?php if ($_smarty_tpl->tpl_vars['status']->value=='filled'){?>active<?php }?>"><a href="./?action=jobs&status=filled">Filled</a></li>
      <li class="<?php if ($_smarty_tpl->tpl_vars['status']->value=='cancelled'){?>active<?php }?>"><a href="./?action=jobs&status=cancelled">Closed</a></li>
    </ul>
    <table class="table">
      <thead>
        <tr>
          <th>Title</th>
          <th width="120px">Created</th>
          <th width="80px" style="text-align: right;">Applicants</th>
          <th width="100px">Status</th>
          <th width="170px"></th>
        </tr>
      </thead>
      <tbody id="jobslist">
      </tbody>
    </table>
  </div>
  <div  class="span3 admin_bar admin_bar_resource">
    <div class="well">
      <h2><i class="icon-question-sign"></i> Help</h2>
      <p>Jobs you posted under <strong><?php echo @OD_COMPANY;?>
</strong> account.</p>
      <p>To <strong>edit</strong> a job or <strong>cancel</strong> a job please view <u>online in oDesk</u> site.</p>
    </div>
  </div>
</div>

<script>
var _status = '<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
';
</script>


<script>
  $(document).ready(function(){

    function loadJobs(last){
      return $.ajax({
        type: 'GET',
        dataType: 'HTML',
        url: 'index.php?action=load_jobs&status='+ _status + '&last='+last,
        async: false
      }).responseText;
    }

    function doLoadJobs(last){
      $("a#showmore-jobs").parent('td').parent('tr').remove();
      $('#jobslist').append(loadJobs(last));
      $("a#showmore-jobs").click(function(e){
        e.preventDefault();
        doLoadJobs($(this).attr('rel'));
      })
    }

    $("a#showmore-jobs").click(function(e){
      e.preventDefault();
      doLoadJobs($(this).attr('rel'));
    })
    doLoadJobs(0);
  });
</script>
<?php }} ?>