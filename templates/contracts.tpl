<div class="page-header">
  <h1>Contracts <small>{if $job}[Job: #{$job->reference}: {$job->title}]{else}[All Jobs]{/if}</small></h1>
  <div class="subnav">
  <ul class="nav nav-pills">
    <li class=""><a class="" href="./?action=contracts{if $job}&job={$job->reference}{/if}"><i class="icon-repeat"></i> Refresh contracts</a></li>
  </ul>
</div>
</div>

<div class="row-fluid">
  <div class="span10">
    <ul class="nav nav-pills">
      <li class="{if $status == 'all'}active{/if}"><a href="./?action=contracts&status=all">All</a></li>
      <li class="{if $status == 'active'}active{/if}"><a href="./?action=contracts&status=active">Active</a></li>
      <li class="{if $status == 'closed'}active{/if}"><a href="./?action=contracts&status=closed">Closed</a></li>
    </ul>
    <table class="table">
      <thead>
        <tr>
          <th>Engagement</th>
          <th>Job</th>
          <th>Offer</th>
          <th width="60px">Price</th>
          <th width="80px">Created</th>
          <th width="80px">Start</th>
          <th width="80px">End</th>
          <th width="50px">Status</th>
          <th width="50x"><i class="icon-refresh"></i></th>
          <th width="50x"></th>
        </tr>
      </thead>
      <tbody id="engagementslist">
      </tbody>
    </table>
  </div>
  <div  class="span2 admin_bar admin_bar_resource">
    <div class="well">
      <h2><i class="icon-question-sign"></i> Help</h2>
      {if $job}
      <p>Contracts for job: <strong>#{$job->reference}</strong>, <u>({$job->title})</u> under <strong>{$smarty.const.OD_COMPANY}</strong> account.</p>
      {else}
      <p>Contracts for jobs under <strong>{$smarty.const.OD_COMPANY}</strong> account.</p>
      {/if}
      <p><strong><u>Send message: </u></strong><br/> bla bla bla ...</p>
      <p><strong><u>Synchronize: </u></strong><br/> bla bla bla ...</p>
    </div>
  </div>
</div>

<div style ="display: none;" class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">New oDesk message</h3>
  </div>
  <div class="modal-body">
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button id="message_send" class="btn btn-primary">Send</button>
  </div>
</div>
<script>
var job = null;
{if $job}
job = {$job->reference};
{/if}
</script>

{literal}
<script>
  $(document).ready(function(){
    
    function getErrors(errors){
      $.ajax({
        type: 'GET',
        dataType: 'HTML',
        url: 'index.php?action=message_errors',
        data: errors
      }).done(function(responce){
        $('#errors').empty();
        $('#errors').append(responce);
      });
    }
    
    function sendMessage(){
      $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'index.php?action=message_send',
        data: 'recipients=' + $("input#recipients").val() + '&subject=' + $("input#subject").val() + '&body=' + $("textarea#body").val()
      }).done(function(responce){
        if (!responce['success']){
          var errors = responce['errors'];
          for(var key in errors) {
//            $('#'+key).parent('div.control-group').addClass('error');
          }
          getErrors($.param(errors));
        }
        else {
          $('#myModal').modal('hide');
          alert('Message sent!!!')
        }
      });
    }
    
    $('#message_send').click(function(e){
      e.preventDefault();
      sendMessage();
    })
    
    function synchronize(params){
      $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: 'index.php?action=contract_sync' + params
      }).done(function(responce){
        alert(responce['message']);
        location.reload();
      });
    }
    
    function loadEngagements(last){
      $.ajax({
        type: 'GET',
        dataType: 'HTML',
        url: 'index.php?action=load_engagements&last='+last,
//        async: false
      }).done(function(responce){
        $("a#showmore-engagements").parent('td').parent('tr').remove();
        $('#engagementslist').append(responce); 
        $("a#showmore-engagements").click(function(e){
          e.preventDefault();
          doLoadEngagements($(this).attr('rel'));
        })
        $("a.sync").not('.disabled').click(function(e){
          e.preventDefault();
          synchronize($(this).attr('rel'));
        })
      });
    }

    function doLoadEngagements(last){
      loadEngagements(last);
    }

    $("a#showmore-engagements").click(function(e){
      e.preventDefault();
      doLoadEngagements($(this).attr('rel'));
    })
    if (job){
      doLoadEngagements(0+'&job='+job);
    } else {
      doLoadEngagements(0);
    }
  });
</script>
{/literal}