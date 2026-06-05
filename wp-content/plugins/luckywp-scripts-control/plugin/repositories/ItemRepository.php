<?php

namespace luckywp\scriptsControl\plugin\repositories;

use luckywp\scriptsControl\core\base\BaseObject;
use luckywp\scriptsControl\core\Core;
use luckywp\scriptsControl\core\helpers\ArrayHelper;
use luckywp\scriptsControl\plugin\entities\Area;
use luckywp\scriptsControl\plugin\entities\Item;

class ItemRepository extends BaseObject
{

    /**
     * @var Item[]
     */
    private $_items;

    /**
     * @return Item[]
     */
    public function findAll()
    {
        if ($this->_items === null) {
            $this->_items = [];
            $rows = Core::$plugin->options->get(Core::$plugin->prefix . 'items');
            if (is_array($rows)) {
                foreach ($rows as $row) {
                    if (false !== $item = Item::make($row)) {
                        $this->_items[] = $item;
                    }
                }
            }
        }
        return $this->_items;
    }

    /**
     * @param bool $onlyActive
     * @return array
     */
    public function findAllGroupedByArea($onlyActive = false)
    {
        $itemsByArea = [];
        foreach (Area::toValues() as $id) {
            $itemsByArea[$id] = [];
        }
        foreach ($this->findAll() as $item) {
            if (
                array_key_exists($item->areaId, $itemsByArea) &&
                (
                    ($onlyActive && $item->active) ||
                    !$onlyActive
                )
            ) {
                $itemsByArea[$item->areaId][] = $item;
            }
        }
        return $itemsByArea;
    }

    /**
     * @param int $id
     * @return Item|false
     */
    public function get($id)
    {
        foreach ($this->findAll() as $item) {
            if ($item->id == $id) {
                return $item;
            }
        }
        return false;
    }

    /**
     * @param Item $item
     */
    public function add(Item $item)
    {
        $items = $this->findAll();
        $item->id = $items ? max(ArrayHelper::getColumn($items, 'id')) + 1 : 1;
        $this->_items[] = $item;
        $this->saveAll();
    }

    public function updateSort(array $data)
    {
        $config = [];
        foreach ($data as $str) {
            $els = explode(',', $str);
            if (count($els) == 2) {
                $config[(int)$els[0]] = (int)$els[1];
            }
        }

        $items = [];
        foreach ($this->findAll() as $item) {
            $items[$item->id] = $item;
        }

        $newItems = [];
        foreach ($config as $itemId => $areaId) {
            if (array_key_exists($itemId, $items) && Area::isValid($areaId)) {
                $items[$itemId]->areaId = $areaId;
                $newItems[] = $items[$itemId];
                unset($items[$itemId]);
            }
        }

        $this->_items = array_merge($newItems, array_values($items));
        $this->saveAll();
    }

    /**
     * @param Item $item
     */
    public function delete($item)
    {
        $this->_items = array_filter($this->findAll(), function ($i) use ($item) {
            return $i->id != $item->id;
        });
        $this->saveAll();
    }

    public function saveAll()
    {
        if ($this->_items !== null) {
            $rows = [];
            foreach ($this->_items as $item) {
                $rows[] = $item->toArray();
            }
            Core::$plugin->options->set(Core::$plugin->prefix . 'items', $rows);
        }
    }
}
