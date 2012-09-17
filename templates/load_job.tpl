{if $total > 0 }
<tr>
  <td>
    <a href="{$jobs->public_url}" target="_blank">{$jobs->title}</a>
  </td>
  <td>
    {$jobs->created_time|convertunix:"Y-m-d H:i"}
  </td>
  <td style="text-align: right;">
    {if $jobs->count_total_applicants > 0}
    <span class="label label-success">{$jobs->count_total_applicants}</span>
    {else}
    <span class="label">{$jobs->num_active_candidates}</span>
    {/if}
  </td>
  <td>
    {if $jobs->status == 'cancelled'}
    <span class="label label-warning">{$jobs->status}</span>
    {elseif $jobs->status == 'open'}
    <span class="label label-success">{$jobs->status}</span>
    {else}
    <span class="label">{$jobs->status}</span>
    {/if}
  </td>
  <td>
    <div class="btn-group">
      <a class="btn btn-mini" href="{$jobs->public_url}" target="_blank" title="View job online"><i class="icon-search"></i> online</a>
        <a class="btn btn-mini btn-primary" href="./?action=offers&job={$jobs->reference}" title="View job's offers"><i class="icon-search"></i> offers</a>
    </div>
  </td>
</tr>
{else}
{if $last == 0}
<tr>
  <td colspan="5">
    No jobs!!!
  </td>
</tr>
{/if}
{/if}