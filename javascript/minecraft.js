jQuery(document).ready(function() {
  var data = {
    action: 'server_status'
  };
  if(jQuery("#minecraft-server-status").length) {
    jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
      jQuery("#minecraft-server-status").html(response);
    });
  }
});
