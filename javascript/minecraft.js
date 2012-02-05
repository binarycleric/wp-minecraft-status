jQuery(document).ready(function() {
  var data = {
    action: 'server_status'
  },
  opts = {
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

  if(jQuery("#minecraft-server-status").length) {
    var target = jQuery("#minecraft-server-status");
    var spinner = new Spinner(opts).spin();
    spinner.el.style.top = "50%";
    spinner.el.style.left = "50%";

    target.html(spinner.el);

    jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
      jQuery("#minecraft-server-status").html(response);
    });
  }
});
