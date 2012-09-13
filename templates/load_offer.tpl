{if $total > 0 }
<tr>
  <td>
    <a href="{$offers->provider__profile_url}" target="_blank">{$offers->provider__name}</a>
  </td>
  <td>
    {$offers->job__title}
  </td>
  <td>
    {$offers->fixed_charge_amount_agreed}
  </td>
  <td>
    {$offers->country}
  </td>
  <td>
    {$offers->estimated_duration}
  </td>
  <td>
    {if $offers->status}
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
    {/if}
  </td>
</tr>
{else}
{if $last == 0}
<tr>
  <td colspan="6">
    No offers!!!
  </td>
</tr>
{/if}
{/if}