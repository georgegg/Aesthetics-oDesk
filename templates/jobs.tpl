<div class="page-header">
  <h1>Jobs <small>List</small></h1>
</div>
<header class="jumbotron subhead" id="overview">
<div class="subnav">
  <ul class="nav nav-pills">
    <li class=""><a class="" href="./?action=new_job"><i class="icon-plus"></i> Post new</a></li>
    <li class=""><a class="" href="./?action=jobs&status={$status}"><i class="icon-refresh"></i> Refresh jobs</a></li>
  </ul>
</div>
</header>
<div class="row-fluid">
  <div class="span9">
    <ul class="nav nav-pills">
      <li class="{if $status == 'all'}active{/if}"><a href="./?action=jobs&status=all">All</a></li>
      <li class="{if $status == 'open'}active{/if}"><a href="./?action=jobs&status=open">Open</a></li>
      <li class="{if $status == 'filled'}active{/if}"><a href="./?action=jobs&status=filled">Filled</a></li>
      <li class="{if $status == 'cancelled'}active{/if}"><a href="./?action=jobs&status=cancelled">Closed</a></li>
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
      <p>Jobs you posted under <strong>{$smarty.const.OD_COMPANY}</strong> account.</p>
      <p>To <strong>edit</strong> a job or <strong>cancel</strong> a job please view <u>online in oDesk</u> site.</p>
    </div>
  </div>
</div>

<script>
var _status = '{$status}';
</script>

{literal}
<script>
  $(document).ready(function(){

    function loadJobs(last){
      $.ajax({
        type: 'GET',
        dataType: 'HTML',
        url: 'index.php?action=load_jobs&status='+ _status + '&last='+last
      }).done(function(responce){
        $("a#showmore-jobs").parent('td').parent('tr').remove();
        $('#jobslist').append(responce);
        $("a#showmore-jobs").click(function(e){
          e.preventDefault();
          doLoadJobs($(this).attr('rel'));
        })
      });
    }

    function doLoadJobs(last){
      loadJobs(last);
    }

    $("a#showmore-jobs").click(function(e){
      e.preventDefault();
      doLoadJobs($(this).attr('rel'));
    })
    doLoadJobs(0);
  });
</script>
{/literal}