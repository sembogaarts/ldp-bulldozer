<div class="ldp-bulldozer">

    <header>
        <img src="<?php echo $logo_url ?>" alt="">
    </header>

    <main>

        <div class="top">
            <h1>Bulldozer</h1>
        </div>

        <div class="tabs">
            <div class="ldp-tab">
                <p>Settings</p>
            </div>
        </div>

        <div class="content">
            <form id="ldp-bulldozer-settings" action="admin-ajax.php" method="post">

                <input type="hidden" name="action" value="ldp_bulldozer_settings">
                <input type="checkbox" <?php $enabled ? 'checked' : '' ?> name="ldp_bulldozer_enabled">

                <input type="text" name="ldp_bulldozer_giphy_api_key">

                <input type="submit">

            </form>
        </div>

    </main>

</div>