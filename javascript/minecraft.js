jQuery(document).ready(function() {
  jQuery('.minecraft-status').each(function(i,element) {
    var opts = {
      lines: 12, // The number of lines to draw
      length: 14, // The length of each line
      width: 4, // The line thickness
      radius: 20, // The radius of the inner circle
      color: '#000', // #rgb or #rrggbb
      speed: 1, // Rounds per second
      trail: 60, // Afterglow percentage
      shadow: false, // Whether to render a shadow
      hwaccel: false // Whether to use hardware acceleration
    };

    var spinner = new Spinner(opts).spin();
    var element = jQuery(element);
    spinner.el.style.top = "50%";
    spinner.el.style.left = "50%";

    element.html(spinner.el);

    jQuery.post('/wp-admin/admin-ajax.php', 
      { action: 'server_status', 
        host: element.data('host'),
        port: element.data('port') },
      function(response) {
        element.html(response); 
      }
    );
  });
});
