<?php

namespace luckywp\scriptsControl\plugin;

use luckywp\scriptsControl\core\base\BaseObject;
use luckywp\scriptsControl\core\Core;

class Activation extends BaseObject
{

    public function init()
    {
        register_activation_hook(Core::$plugin->fileName, [$this, 'activate']);
    }

    public function activate()
    {
        Core::$plugin->welcome->setNotShowed();
    }
}
