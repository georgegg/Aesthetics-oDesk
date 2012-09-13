<?php /* Smarty version Smarty-3.1.8, created on 2012-09-13 15:16:10
         compiled from "/Applications/MAMP/htdocs/aesthetics_odesk/templates/new_job.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1913550541504a2353a26c14-33216966%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fc56d70ab8b7f67d600337df564963b7dd7ceb3' => 
    array (
      0 => '/Applications/MAMP/htdocs/aesthetics_odesk/templates/new_job.tpl',
      1 => 1347538484,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1913550541504a2353a26c14-33216966',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_504a2353a762f8_65793084',
  'variables' => 
  array (
    'errors' => 0,
    'error' => 0,
    'values' => 0,
    'categories' => 0,
    'category' => 0,
    'subcategory' => 0,
    'todayte' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_504a2353a762f8_65793084')) {function content_504a2353a762f8_65793084($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['errors']->value){?>
<div class="alert alert-error">
  <button type="button" class="close" data-dismiss="alert" style="font-size: 15px;"><i class="icon-remove"></i></button>
  <h4>Oh snap! <small>please address the following errors:</small></h4>
  <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
  <i class="icon-info-sign"></i> <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</br>
  <?php } ?>
</div>
<?php }?>
<div class="page-header">
  <h1>Post new Job <small>on oDesk</small></h1>
</div>

<div class="row-fluid">
  <div class="span9">
    <form class="form-horizontal" onsubmit="" method="post" action="./?action=new_job">      
      <fieldset id="sf_fieldset_none">
        <h2>Job Options <small><sup>1</sup></small></h2>
        <div class="control-group <?php if ($_smarty_tpl->tpl_vars['errors']->value['title']){?>error<?php }?>">
          <label class="control-label" for="title"><sup style="color: red;"><i class="icon-asterisk"></i></sup> Title</label>          
          <div class="controls">
            <input class="span9" type="text" name="title" id="title" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['title'];?>
">
            <?php if ($_smarty_tpl->tpl_vars['errors']->value['title']){?><span class="help-inline"><?php echo $_smarty_tpl->tpl_vars['errors']->value['title'];?>
</span><?php }?>
          </div>
        </div>
        <div class="control-group <?php if ($_smarty_tpl->tpl_vars['errors']->value['description']){?>error<?php }?>">
          <label class="control-label" for="description"><sup style="color: red;"><i class="icon-asterisk"></i></sup> Description</label>          
          <div class="controls">
            <textarea class="span12" rows="6" name="description" id="description"><?php echo $_smarty_tpl->tpl_vars['values']->value['description'];?>
</textarea>  
            <?php if ($_smarty_tpl->tpl_vars['errors']->value['description']){?><span class="help-inline"><?php echo $_smarty_tpl->tpl_vars['errors']->value['description'];?>
</span><?php }?>
          </div>
        </div>
        <div class="control-group <?php if ($_smarty_tpl->tpl_vars['errors']->value['category']){?>error<?php }?>">
          <label class="control-label" for="category"><sup style="color: red;"><i class="icon-asterisk"></i></sup> Category</label>          
          <div class="controls">
            <select id="category" name="category">
              <option value="">--</option>
              <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value){
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
              <option <?php if ($_smarty_tpl->tpl_vars['values']->value['category']==$_smarty_tpl->tpl_vars['category']->value->title){?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['category']->value->title;?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value->title;?>
</option>
              <?php } ?>
            </select>
            <?php if ($_smarty_tpl->tpl_vars['errors']->value['category']){?><span class="help-inline"><?php echo $_smarty_tpl->tpl_vars['errors']->value['category'];?>
</span><?php }?>
          </div>
        </div>
        <div class="control-group <?php if ($_smarty_tpl->tpl_vars['errors']->value['subcategory']){?>error<?php }?>">
          <label class="control-label" for="subcategory"><sup style="color: red;"><i class="icon-asterisk"></i></sup> Subcategory</label>          
          <div class="controls">
            <select id="subcategory" name="subcategory">
              <option value="">--</option>
              <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value){
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
              <?php  $_smarty_tpl->tpl_vars['subcategory'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['subcategory']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value->topics; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['subcategory']->key => $_smarty_tpl->tpl_vars['subcategory']->value){
$_smarty_tpl->tpl_vars['subcategory']->_loop = true;
?>
              <option <?php if ($_smarty_tpl->tpl_vars['values']->value['subcategory']==$_smarty_tpl->tpl_vars['subcategory']->value->title){?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['subcategory']->value->title;?>
" class="<?php echo $_smarty_tpl->tpl_vars['category']->value->title;?>
"><?php echo $_smarty_tpl->tpl_vars['subcategory']->value->title;?>
</option>
              <?php } ?>
              <?php } ?>
            </select>
            <?php if ($_smarty_tpl->tpl_vars['errors']->value['subcategory']){?><span class="help-inline"><?php echo $_smarty_tpl->tpl_vars['errors']->value['subcategory'];?>
</span><?php }?>
          </div>
        </div>
        <div class="control-group ">
          <label class="control-label" for="job_type"><sup style="color: red;"><i class="icon-asterisk"></i></sup> Type</label>          
          <div class="controls">
            <select id="type" name="job_type">
              <option value="fixed-price">Fixed price</option>
            </select>
          </div>
        </div>
        <div class="control-group ">
          <label class="control-label" for="visibility"><sup style="color: red;"><i class="icon-asterisk"></i></sup> Visibility</label>          
          <div class="controls">
            <select id="visibility" name="visibility">
              <option <?php if ($_smarty_tpl->tpl_vars['values']->value['visibility']=='public'){?>selected<?php }?> value="public">Public</option>
              <option <?php if ($_smarty_tpl->tpl_vars['values']->value['visibility']=='private'){?>selected<?php }?> value="private">Private</option>
              <option <?php if ($_smarty_tpl->tpl_vars['values']->value['visibility']=='odesk'){?>selected<?php }?> value="odesk">oDesk</option>
              <option <?php if ($_smarty_tpl->tpl_vars['values']->value['visibility']=='invite-only'){?>selected<?php }?> value="invite-only">Invite only</option>
            </select>
            <span class="help-block"><i class="icon-question-sign"></i> 
              <strong>Public</strong>: jobs are available to all users who search jobs.<br/>
              <strong>Private</strong>: job is visible to employer only.<br/>
              <strong>oDesk</strong>: jobs appear in search results only for oDesk users who are logged into the service.<br/>
              <strong>Invite only</strong>: jobs do not appear and search and are used for jobs where the buyer wants to control the potential applicants. 
            </span>
          </div>
        </div>
        <div class="control-group <?php if ($_smarty_tpl->tpl_vars['errors']->value['start_date']){?>error<?php }?>">
          <label class="control-label" for="start_date">Start date</label>          
          <div class="controls">
            <div class="input-append date datepicker" data-date="<?php if ($_smarty_tpl->tpl_vars['values']->value['start_date']){?><?php echo $_smarty_tpl->tpl_vars['values']->value['start_date'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['todayte']->value;?>
<?php }?>" data-date-format="mm-dd-yyyy">
              <input name="start_date" id="start_date" class="span9" size="16" type="text" value="<?php if ($_smarty_tpl->tpl_vars['values']->value['start_date']){?><?php echo $_smarty_tpl->tpl_vars['values']->value['start_date'];?>
<?php }?>"><span class="add-on"><i class="icon-th"></i></span></div>
            <?php if ($_smarty_tpl->tpl_vars['errors']->value['start_date']){?><span class="help-inline"><?php echo $_smarty_tpl->tpl_vars['errors']->value['start_date'];?>
</span><?php }?>
            <span class="help-block"><i class="icon-question-sign"></i> The start date of the Job, e.g. 06-15-2011. If start date is not included the job will default to starting immediately.</span>
          </div>
        </div>
        <div class="control-group <?php if ($_smarty_tpl->tpl_vars['errors']->value['end_date']){?>error<?php }?>">
          <label class="control-label" for="end_date"><sup style="color: red;"><i class="icon-asterisk"></i></sup> End date</label>          
          <div class="controls">
            <div class="input-append date datepicker" data-date="<?php if ($_smarty_tpl->tpl_vars['values']->value['end_date']){?><?php echo $_smarty_tpl->tpl_vars['values']->value['end_date'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['todayte']->value;?>
<?php }?>" data-date-format="mm-dd-yyyy">
              <input name="end_date" id="end_date" class="span9" size="16" type="text" value="<?php if ($_smarty_tpl->tpl_vars['values']->value['end_date']){?><?php echo $_smarty_tpl->tpl_vars['values']->value['end_date'];?>
<?php }?>" ><span class="add-on"><i class="icon-th"></i></span></div>
            <?php if ($_smarty_tpl->tpl_vars['errors']->value['end_date']){?><span class="help-inline"><?php echo $_smarty_tpl->tpl_vars['errors']->value['end_date'];?>
</span><?php }?>
            <span class="help-block"><i class="icon-question-sign"></i> The end date of the Job, e.g. 06-15-2011.</span>
          </div>
        </div>
        <div class="control-group <?php if ($_smarty_tpl->tpl_vars['errors']->value['budget']){?>error<?php }?>">
          <label class="control-label" for="budget"><sup style="color: red;"><i class="icon-asterisk"></i></sup> Budget</label>          
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on">$</span><input name="budget" class="span6 currency" id="budget" type="text" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['budget'];?>
">
            </div>
            <?php if ($_smarty_tpl->tpl_vars['errors']->value['budget']){?><span class="help-inline"><?php echo $_smarty_tpl->tpl_vars['errors']->value['budget'];?>
</span><?php }?>
          </div>
        </div>
      </fieldset>
      <p></p>
      <div class="form-actions span12">
        <input name="submit" type="submit" value="Submit" class="btn btn-success btn-large">               
        <a class="btn  btn-danger btn-large  pull-right" href="./?action=jobs">Cancel</a>            
      </div>
    </form>
  </div>
  <div  class="span3 admin_bar admin_bar_resource">
    <div class="well">
      <h2><i class="icon-question-sign"></i> Help</h2>
      <p>Fill in the form to post a new "Fixed Price" Job on oDesk platform under <strong><?php echo @OD_COMPANY;?>
</strong> account.</p>
      <p><sup>1</sup>: <strong>Advance options</strong> are available <u>only in oDesk site application</u>. If you wish to farther edit your job post, edit after posting in oDesk site.</p>
      <p><sup style="color: red;"><i class="icon-asterisk"></i></sup> : Required field.</p>
    </div>
  </div>
</div><?php }} ?>