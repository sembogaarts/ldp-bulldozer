<div class="ldp-bulldozer">

    <h1>Bulldozer</h1>

<?php echo $enabled; ?>


    <form id="ldp-bulldozer-settings" action="admin-ajax.php" method="post">

        <input type="hidden" name="action" value="ldp_bulldozer_settings">
        <input type="checkbox" <?php $enabled ? 'checked' : '' ?> name="ldp-bulldozer-enabled">
        <input type="submit">
        
    </form>

</div>