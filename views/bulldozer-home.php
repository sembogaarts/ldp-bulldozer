<div class="ldp-bulldozer">

    <header>
        <img src="<?php echo $logo_url ?>" alt="Let's Deploy Logo">
    </header>

    <main>

        <div class="ldp-tabs">
            <div class="ldp-tab active">
                <p class="ldp-tab-icon"><i class="fas fa-cog"></i></p>
                <p class="ldp-tab-title">Settings</p>
            </div>
            <div class="ldp-tab">
                <p class="ldp-tab-icon"><i class="fas fa-palette"></i></p>
                <p class="ldp-tab-title">Theme</p>
            </div>
        </div>

        <div class="content">

            <form id="ldp-bulldozer-settings" action="admin-ajax.php" method="post">

                <input type="hidden" name="action" value="ldp_bulldozer_settings">

                <table>
                    <tr class="ldp-group">
                        <td>
                            <label class="ldp-label" for="ldp_bulldozer_enabled">Enabled</label>
                        </td>
                        <td>
                            <label class="switch">
                                <input id="ldp_bulldozer_enabled" type="checkbox" <?php echo $enabled ? 'checked' : '' ?>
                                       name="ldp_bulldozer_enabled">
                                <span class="slider round"></span>
                            </label>
                            <p class="ldp-help">Enables the plugin.</p>
                        </td>
                    </tr>
                    <tr class="ldp-group">
                        <td>
                            <label class="ldp-label" for="ldp_bulldozer_tenor_api_key">Tenor Api token</label>
                        </td>
                        <td>
                            <input type="text" id="ldp_bulldozer_tenor_api_key" value="<?php echo $tenor_api_key ?>" name="ldp_bulldozer_tenor_api_key">
                            <p class="ldp-help">Enter your API key for <a href="https://tenor.com/developer/dashboard"
                                                                          target="_blank">Tenor</a> to enable GIFs.</p>
                        </td>
                    </tr>
                </table>


                <input type="submit">

            </form>

            <p class="footer">Bulldozer created with <i class="fa fa-heart"></i> by <a href="https://letdeploy.nl">Let's Deploy</a></p>
        </div>

    </main>

</div>