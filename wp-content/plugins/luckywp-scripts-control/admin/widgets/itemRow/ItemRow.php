<?php

namespace luckywp\scriptsControl\admin\widgets\itemRow;

use luckywp\scriptsControl\core\base\Widget;
use luckywp\scriptsControl\plugin\entities\Item;
use ReflectionException;

class ItemRow extends Widget
{

    /**
     * @var Item
     */
    public $item;

    /**
     * @return null|string
     * @throws ReflectionException
     */
    public function run()
    {
        return $this->render('row', [
            'item' => $this->item,
        ]);
    }
}
