<style type="text/css">
#minecraft-server-status {
  margin-bottom: 8px;
  border: 1px solid;
  width: 550px;
  background-color: #D3DCD2;
  background-image: url('<?=$bg_image?>');
  background-repeat: no-repeat;
  background-position: 12px 2px;
  -moz-box-shadow:    1px 1px 2px 3px #ccc;
  -webkit-box-shadow: 1px 1px 2px 3px #ccc;
  box-shadow:         1px 1px 2px 3px #ccc;
}

#minecraft-server-status div.mc-inner-content {
  padding: 1em;
  padding-left: 10em;
}

span.mc-title {
  font-size: 110%;
}

span.status-online {
  color: #3F7939;
}

span.status-offline {
  color: #914448;
}

span.status-online, span.status-offline {
  font-size: 112%;
}

div.mc-inner-content {
  background-image: url('<?=$mc_logo?>');
  background-repeat: no-repeat;
  background-position: 98% 95%;
  background-size: 150px;
}
</style>

<div class="mc-inner-content">
  <span class="mc-title">Address:</span> <?=$mc_host?> <br>
  <span class="mc-title">Port:</span> <?=$mc_port?> <br>

  <span class="mc-title">Status:</span>
  <span class="status-<?=$status?>"><?=ucwords($status)?></span>
</div>
