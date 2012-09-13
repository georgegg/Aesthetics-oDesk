{if $total > 0 }
  {foreach $offers as $offer}
    <tr>
      <td>
        <a href="{$offer->provider__profile_url}" target="_blank">{$offer->provider__name}</a>
      </td>
      <td>
        {$offer->job__title}
      </td>
      <td>
        $ {$offer->fixed_charge_amount_agreed}
      </td>
      <td>
        {$offer->country}
      </td>
      <td>
        {$offer->estimated_duration}
      </td>
      <td>
        {if $offer->status}
          {if $offer->status == 'rejected'}
          <span class="label label-important">Rejected</span>
          {elseif $offer->status == 'open'}
          <span class="label label-info">Open</span>
          {elseif $offer->status == 'accepted'}
          <span class="label label-success">Accepted</span>
          {elseif $offer->status == 'cancelled'}
          <span class="label label-warning">Canceled</span>
          {else}
            <span class="label">{$offer->status}</span>
          {/if}
        {else}
          <span class="label">no candidacy</span>
        {/if}
      </td>
    </tr>
  {/foreach}
  {if $total >= 10}
    <tr>
      <td colspan="6">
        <a id="showmore-offers" class="btn btn-primary" href="#" rel="{$last+$total}{if $job}&job={$job}{/if}"><i class="icon-download"></i> Load more</a>
      </td>
    </tr>
  {/if}
{else}
{if $last == 0}
<tr>
  <td colspan="6">
    No offers!!!
  </td>
</tr>
{/if}
{/if}