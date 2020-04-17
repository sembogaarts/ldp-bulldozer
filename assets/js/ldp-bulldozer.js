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
                console.log("This is response...");
                console.log(response);
            },
            error: function( error ){
                console.log('AJAX error callback....');
                console.log(error);
            }
        });

    }
    // Fire when the page is ready
    $(document).ready(function () {
        // Define Forms
        var settingsForm = $('#ldp-bulldozer-settings');
        // Attach events
        settingsForm.on('submit', ajaxSubmit);
    });

})(jQuery);