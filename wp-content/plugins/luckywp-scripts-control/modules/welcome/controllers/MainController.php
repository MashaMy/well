<?php

namespace luckywp\scriptsControl\modules\welcome\controllers;

use luckywp\scriptsControl\core\admin\AdminController;
use luckywp\scriptsControl\core\Core;

class MainController extends AdminController
{

    public function init()
    {
        add_action('wp_ajax_lwpsc_welcome_hide', [$this, 'ajaxHide']);
        parent::init();
    }

    public function notice()
    {
        if (Core::$plugin->welcome->isShow()) {
            $this->render('notice');
        }
    }

    public function ajaxHide()
    {
        Core::$plugin->welcome->setShowed();
    }
}
