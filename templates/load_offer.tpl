{if $total > 0 }
<tr>
  <td>
    <a href="{$offers->provider__profile_url}" target="_blank">{$offers->provider__name}</a>
  </td>
  <td>
    {$offers->job__title}
  </td>
  <td>
    $ {$offers->fixed_charge_amount_agreed}
  </td>
  <td>
    {$offers->country}
  </td>
  <td>
    {$offers->estimated_duration}
  </td>
  <td>
    {calc_status 
      candidacy_status=$offers->candidacy_status 
      interview_status=$offers->interview_status 
      has_buyer_signed=$offers->has_buyer_signed 
      has_provider_signed=$offers->has_provider_signed 
      status=$offers->status
    }
<!--    {if $offers->status}
      {if $offers->status == 'rejected'}
      <span class="label label-important">Rejected</span>
      {elseif $offers->status == 'open'}
      <span class="label label-info">Open</span>
      {elseif $offers->status == 'accepted'}
      <span class="label label-success">Accepted</span>
      {elseif $offers->status == 'cancelled'}
      <span class="label label-warning">Canceled</span>
      {else}
        <span class="label">{$offers->status}</span>
      {/if}
    {else}
      <span class="label">no candidacy</span>
    {/if}-->
  </td>
  <td>
    <a class="btn btn-mini btn-success" target="_blank" title="review online" href="https://www.odesk.com/applications/{$offers->reference}"><i class="icon-eye-open"></i></a>
  </td>
</tr>
{else}
{if $last == 0}
<tr>
  <td colspan="7">
    No offers!!!
  </td>
</tr>
{/if}
{/if}