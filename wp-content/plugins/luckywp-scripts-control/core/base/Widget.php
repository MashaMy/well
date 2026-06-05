<?php

namespace luckywp\scriptsControl\core\base;

use luckywp\scriptsControl\core\Core;
use ReflectionClass;
use ReflectionException;

abstract class Widget extends BaseObject
{

    private $_viewPath;

    /**
     * @return string
     * @throws ReflectionException
     */
    public function getViewPath()
    {
        if ($this->_viewPath === null) {
            $class = new ReflectionClass($this);
            $this->_viewPath = dirname($class->getFileName()) . '/views';
        }
        return $this->_viewPath;
    }

    /**
     * @param string $view
     * @param array $params
     * @param bool $echo
     * @return string|null
     * @throws ReflectionException
     */
    public function render($view, $params = [], $echo = false)
    {
        $html = Core::$plugin->view->renderFile($this->getViewPath() . '/' . $view . '.php', $params);
        if ($echo) {
            echo $html;
            return null;
        }
        return $html;
    }

    /**
     * @param array $config
     * @return string
     * @throws ReflectionException
     */
    public static function widget($config = [])
    {
        /* @var $widget Widget */
        $config['class'] = get_called_class();
        $widget = Core::createObject($config);
        return $widget->run();
    }

    abstract public function run();
}
