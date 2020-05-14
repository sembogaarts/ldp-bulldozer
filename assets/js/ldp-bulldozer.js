(function ($) {
    // Convert to JSON
    function toJSON(form) {
        var o = {};
        var a = $(form).serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    }
    // Stop default form submissions and send to Ajax
    function ajaxSubmit(e) {

        // Prevented submit
        e.preventDefault();
        // Get the target
        var form = $(e.target)[0];

        var json = toJSON(form);

        $.ajax({
            type: "POST",
            url: "admin-ajax.php",
            data: json,
            success: function( response ){
                toastr.info('Are you the 6 fingered man?');
                console.log(toastr);
                console.log('test');
            },
            error: function( error ){
                console.log('AJAX error callback....');
                console.log(error);
            }
        });

    }
    // Tab switcher
    function switchTab(e) {
        // Get the tab
        var content = $(this).data('tab');
        // Hide all
        hideAllContent();
        // Show new
        $(content).show();
        $(this).addClass('active');
    }
    function hideAllContent() {
        // Get the tabs
        var tabs = $('.ldp-tab');
        // Hide all
        $(tabs).each(i => {
            // Select the tab
            var tab = $(tabs[i]);
            // Get the content
            var content = $(tab).data('tab');
            // Hide content
            $(content).hide();
            // Remove active
            $(tab).removeClass('active');
        });
    }
    // Fire when the page is ready
    $(document).ready(function () {
        // Define Forms
        var settingsForm = $('#ldp-bulldozer-settings');
        // Attach events
        settingsForm.on('submit', ajaxSubmit);
        // Define Tabs
        var tabs = $('.ldp-tab');
        // Hide all the content
        $(tabs).each(function() {
            // Open the new tab
            $(this).on('click', switchTab);
        });
    });

})(jQuery);