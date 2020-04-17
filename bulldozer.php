<?php
/**
 * Plugin Name: Bulldozer
 */

require "enums/bulldozer-options.php";

class LDP_BULLDOZER
{

    private $_theme_dir;

    private static $_instance = null;

    public function __construct()
    {
        $this->define_scope();
        $this->add_actions();
    }

    private function define_scope()
    {
        $this->_theme_dir = plugin_dir_url(__FILE__);
    }

    private function add_actions()
    {
        // Initialize the plugin
        add_action('init', array($this, 'init'));
        // Only if the user is an admin
        if (is_admin()) {
            // Default
            add_action('admin_print_styles', array($this, 'add_assets'));
            add_action('admin_init', array($this, 'install'));
            // Add to sidemenu
            add_action('admin_menu', array($this, 'add_to_sidemenu'));
            // Add route form
            add_action('wp_ajax_ldp_bulldozer_settings', array($this, 'save_settings'));
        }
    }

    public function init()
    {
        if (!is_user_logged_in() && $this->valid_url()) {
            // If the plugin is enabled
            if (get_option(BulldozerOptions::ENABLED)) {
                $this->load_theme('default');
                die();
            }
        }
    }

    public function valid_url() {
        // Accept by default
        $intercept_url = true;
        // Allowed whitelist
        $whitelist = [
            'wp-login',
            '.css',
            '.js'
        ];
        // Add dynamic login, admin urls
        $whitelist[] = explode('/', wp_login_url())[3];
        $whitelist[] = explode('/', admin_url())[3];
        // Check if the login page is active
        foreach($whitelist as $allowed) {
            // Check in the string
            $match = strpos($_SERVER['REQUEST_URI'], $allowed);
            // There is a match found!
            if($match !== false) {
                $intercept_url = false;
            }
        }
        // If match, then allow the plugin to start
        return $intercept_url;
    }

    private function load_theme($theme) {
        // Set global variables
        $css_url = $this->_theme_dir . "themes/${theme}/bulldozer-${theme}.css";
        // Render the theme
        include "themes/${theme}/bulldozer-${theme}.php";
    }

    public function save_settings()
    {

        $status = isset($_POST[BulldozerOptions::ENABLED]) ? true : false;

        update_option(BulldozerOptions::ENABLED, $status);

        return true;
    }

    public function add_assets()
    {
        // JS
        wp_enqueue_script('ldp-bulldozer-js', $this->_theme_dir . '/assets/js/ldp-bulldozer.js');
        // CSS
        wp_enqueue_style('ldp-bulldozer-style', $this->_theme_dir . '/assets/css/ldp-bulldozer.css');
    }

    /**
     * Installation of the plugin
     * Since: 1.0.0
     */
    public function install()
    {
        add_option(BulldozerOptions::ENABLED, false);
    }

    /**
     * Register in the sidemenu
     */
    public function add_to_sidemenu()
    {
        add_submenu_page(
            'options-general.php',
            'Bulldozer',
            'Bulldozer',
            'manage_options',
            'ldp-bulldozer',
            array($this, 'bulldozer_home')
        );
    }

    public function bulldozer_home()
    {
        // Get variables
        $enabled = get_option(BulldozerOptions::ENABLED);
        // Include view
        include plugin_dir_path(__FILE__) . 'views/bulldozer-home.php';
    }

    public static function get_instance()
    {
        if (self::$_instance == null) {
            self::$_instance = new LDP_BULLDOZER();
        }
        return self::$_instance;
    }


}

/**
 * Start the script
 */
$ldp_bulldozer = LDP_BULLDOZER::get_instance();