<?php

namespace luckywp\scriptsControl\admin\controllers;

use luckywp\scriptsControl\core\admin\AdminController;
use luckywp\scriptsControl\core\Core;
use WP_Plugin_Install_List_Table;

class ScriptsController extends AdminController
{

    public function handleIndex()
    {
        Core::$plugin->welcome->setShowed();
    }

    public function actionIndex()
    {
        $this->render('index', [
            'itemsByArea' => Core::$plugin->items->findAllGroupedByArea(),
        ]);
    }

    public function actionSettings()
    {
        $this->render('settings');
    }

    public function actionPlugins()
    {
        require_once ABSPATH . 'wp-admin/includes/class-wp-plugin-install-list-table.php';

        add_filter('install_plugins_nonmenu_tabs', function ($tabs) {
            $tabs[] = 'luckywp';
            return $tabs;
        });
        add_filter('install_plugins_table_api_args_luckywp', function ($args) {
            global $paged;
            return [
                'page' => $paged,
                'per_page' => 12,
                'locale' => get_user_locale(),
                'search' => 'LuckyWP',
            ];
        });

        $_POST['tab'] = 'luckywp';
        $table = new WP_Plugin_Install_List_Table();
        $table->prepare_items();

        wp_enqueue_script('plugin-install');
        add_thickbox();
        wp_enqueue_script('updates');

        $this->render('plugins', [
            'table' => $table,
        ]);
    }
}
