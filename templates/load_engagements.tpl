{if $total > 0 }
  {foreach $engagements as $engagement}
  <tr>
    <td>
      <a href="https://www.odesk.com/e/{$team_ref->reference}/contracts/{$engagement->reference}" target="_blank">{$engagement->engagement_title}</a>
    </td>
    <td>
      <a href="https://www.odesk.com/jobs/{$engagement->job__reference}/applications/applied" target="_blank">{$engagement->job__title}</a>
    </td>
    <td>
      <a href="https://www.odesk.com/applications/{$engagement->offer__reference}" target="_blank">{$engagement->provider__id}</a>
    </td>
    <td>
      $ {$engagement->fixed_charge_amount_agreed}
    </td>
    <td>
      {$engagement->created_time|convertunix:"Y-m-d"}
    </td>
    <td>
      {$engagement->engagement_start_date|convertunix:"Y-m-d"}
    </td>
    <td>
      {if $engagement->engagement_end_date}{$engagement->engagement_end_date|convertunix:"Y-m-d"}{/if}
    </td>
    <td>
      <span class="label {if $engagement->status == 'active'}label-success{/if} {if $engagement->status == 'closed'}label-important{/if}">{$engagement->status}</span>
    </td>
    <td>
      {if $engagement->synced}Yes <a href="#" rel="popover" title="Synchronized" data-trigger="click" data-html="true" data-content="salt: {$engagement->synced} <a class='btn btn-small btn-warning' href='#' title='Send payment info message' data-toggle='modal' data-backdrop='false' data-remote='./index.php?action=message_new&rec={$engagement->provider__id}&salt={$engagement->synced}&sub=Payment%20Info' data-target='#myModal'>Send</a>"><i class="icon-info-sign"></i></a>{/if}
    </td>
    <td>
      <div class="btn-group">
        <a class="btn btn-mini btn-warning" title="Send contractor a message" data-toggle="modal" data-backdrop="false" data-remote="./index.php?action=message_new&rec={$engagement->provider__id}" data-target="#myModal"><i class="icon-envelope"></i></a>
        <a class="btn btn-mini btn-danger sync {if $engagement->synced}disabled{/if}" href="#" rel="&engagement={$engagement->reference}&contractor={$engagement->provider__id}" title="Synchronize contract"><i class="icon-refresh"></i></a>
      </div>
    </td>
  </tr>
  {/foreach}
  {if $total >= 10}
    <tr>
      <td colspan="10">
        <a id="showmore-engagements" class="btn btn-primary" href="#" rel="{$last+$total}"><i class="icon-download"></i> Load more</a>
      </td>
    </tr>
  {/if}
{else}
{if $last == 0}
<tr>
  <td colspan="10">
    No contracts!!!
  </td>
</tr>
{/if}
{/if}