jQuery(document).ready(function() {
  jQuery('.minecraft-status').each(function(i,element) {
    var opts = {
      lines: 12, length: 14, width: 4, 
      radius: 20, color: '#000', speed: 1, 
      trail: 60, shadow: false, hwaccel: false
    },
    element = jQuery(element),
    spinner = new Spinner(opts).spin();

    spinner.el.style.top = "50%";
    spinner.el.style.left = "50%";
    element.html(spinner.el);

    jQuery.post('/wp-admin/admin-ajax.php', 
      { action: 'server_status', 
        host: element[0].dataset.host,
        port: element[0].dataset.port},
      function(response) {
        element.html(response); 
      }
    );
  });
});
