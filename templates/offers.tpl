<div class="page-header">
  <h1>Offers <small>{if $job}[Job: #{$job->reference}: {$job->title}]{else}[All Jobs]{/if}</small></h1>
</div>

<div class="row-fluid">
  <div class="span9">
    <table class="table">
      <thead>
        <tr>
          <th width="150px">Applicant</th>
          <th>Job</th>
          <th width="80px">Price</th>
          <th width="120px">Country</th>
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
      {if $job}
      <p>Offers made for job: <strong>#{$job->reference}</strong>, <u>({$job->title})</u> under <strong>{$smarty.const.OD_COMPANY}</strong> account.</p>
      {else}
      <p>Offers made for jobs under <strong>{$smarty.const.OD_COMPANY}</strong> account.</p>
      {/if}
    </div>
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
{/literal}