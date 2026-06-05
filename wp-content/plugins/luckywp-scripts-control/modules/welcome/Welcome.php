<?php

namespace luckywp\scriptsControl\modules\welcome;

use luckywp\scriptsControl\core\base\BaseObject;
use luckywp\scriptsControl\core\Core;
use luckywp\scriptsControl\modules\welcome\controllers\MainController;

class Welcome extends BaseObject
{

    public function init()
    {
        if (is_admin()) {
            add_action('admin_init', function () {
                if ($this->isShow()) {
                    add_action('admin_notices', [MainController::getInstance(), 'notice']);
                }
            });
            MainController::getInstance();
        }
    }

    private $_isShow;

    /**
     * @return bool
     */
    public function isShow()
    {
        if ($this->_isShow === null) {
            $this->_isShow = current_user_can('manage_options') &&
                Core::$plugin->options->get('welcome_shown') === 'no';
        }
        return $this->_isShow;
    }

    public function setNotShowed()
    {
        $this->_isShow = true;
        Core::$plugin->options->set('welcome_shown', 'no');
    }

    public function setShowed()
    {
        $this->_isShow = false;
        Core::$plugin->options->set('welcome_shown', 'yes');
    }
}
