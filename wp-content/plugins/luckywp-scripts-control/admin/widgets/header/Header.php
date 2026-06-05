<?php

namespace luckywp\scriptsControl\admin\widgets\header;

use luckywp\scriptsControl\core\base\Widget;

class Header extends Widget
{

    /**
     * @var string
     */
    public $tab;

    /**
     * @return string
     */
    public function run()
    {
        return $this->render('widget', [
            'tab' => $this->tab,
        ]);
    }
}
