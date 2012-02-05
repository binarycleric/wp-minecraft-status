<div class="minecraft-status-container server-<?=$status?>">
  <div class="mc-inner-content">
    <span class="mc-title">Address:</span> 
    <span class="mc-value"><?=$mc_host?></span>
    <br>

    <span class="mc-title">Port:</span> 
    <span class="mc-value"><?=$mc_port?></span>
    <br>

    <span class="mc-title">Status:</span>
    <span class="mc-value mc-status-<?=$status?>"><?=ucwords($status)?></span>
  </div>
</div>
