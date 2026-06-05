<?php

namespace luckywp\scriptsControl\plugin;

class Settings extends \luckywp\scriptsControl\core\wp\Settings
{

    /**
     * @return bool
     */
    public function getUseWpBodyOpen()
    {
        return (bool)$this->getValue('general', 'useWpBodyOpen', false);
    }
}
