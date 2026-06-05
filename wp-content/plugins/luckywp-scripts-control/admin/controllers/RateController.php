<?php

namespace luckywp\scriptsControl\admin\controllers;

use luckywp\scriptsControl\core\admin\AdminController;
use luckywp\scriptsControl\core\Core;

class RateController extends AdminController
{

    public function init()
    {
        add_action('init', function () {
            if (Core::$plugin->rate->isShow()) {
                add_action('admin_notices', [$this, 'notice']);
            }
        });
        add_action('wp_ajax_lwpsc_rate', [$this, 'ajaxRate']);
        add_action('wp_ajax_lwpsc_show_later', [$this, 'ajaxShowLater']);
        add_action('wp_ajax_lwpsc_already_rate', [$this, 'ajaxAlreadyRate']);
        parent::init();
    }

    public function notice()
    {
        $this->render('notice');
    }

    public function ajaxRate()
    {
        Core::$plugin->rate->rate();
    }

    public function ajaxAlreadyRate()
    {
        Core::$plugin->rate->alreadyRate();
    }

    public function ajaxShowLater()
    {
        Core::$plugin->rate->showLater();
    }
}
