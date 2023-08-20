<?php
namespace Mallria\Dev\Admin;

class Admin_Menus{

    protected $capability = 'manage_options';
    protected $root_menu_name = 'Mallria Dev';
    protected $root_menu_page_title = 'Mallria Dev';
    protected $root_menu_slug = 'mallria-wp-dev';
    public function __construct()
    {

    }

    function boot(){
        add_action('admin_menu', [$this, 'register_root_menu']);
        add_action('admin_menu', [$this, 'register_setting_menu']);

        $this->remove_default_root_menu();
    }

    function remove_default_root_menu()
    {
        add_action('admin_menu', function () {
            global $submenu;
            unset($submenu[$this->root_menu_slug][0]);
        });
    }

    function register_root_menu(){
        add_menu_page(
            $this->root_menu_name,
            $this->root_menu_page_title,
            $this->capability,
            $this->root_menu_slug,
            [$this, 'root_menu_callback'],
            'dashicons-editor-code',
            59
        );
    }

    function register_setting_menu(){
        add_submenu_page(
            $this->root_menu_slug,
            'Settings | ' . $this->root_menu_page_title,
            'Settings',
            $this->capability,
            $this->root_menu_slug . '-settings',
            [$this, 'setting_menu_callback']
        );
    }

    function setting_menu_callback(){
        require_once 'views/setting-menu.php';
    }
}
