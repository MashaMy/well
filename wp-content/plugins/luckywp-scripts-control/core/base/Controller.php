<?php

namespace luckywp\scriptsControl\core\base;

use luckywp\scriptsControl\core\Core;
use ReflectionClass;
use ReflectionException;

/**
 * @property string $id
 */
abstract class Controller extends BaseObject implements ViewContextInterface
{

    private $_id;

    /**
     * @return string
     * @throws ReflectionException
     */
    public function getId()
    {
        if ($this->_id === null) {
            $class = new ReflectionClass($this);
            $this->_id .= lcfirst(substr($class->getShortName(), 0, -10));
        }
        return $this->_id;
    }

    private $_viewPath;

    /**
     * @return string
     * @throws ReflectionException
     */
    public function getViewPath()
    {
        if ($this->_viewPath === null) {
            $class = new ReflectionClass($this);
            $this->_viewPath = dirname($class->getFileName()) . '/../views';
            $this->_viewPath .= '/' . $this->id;
        }
        return $this->_viewPath;
    }

    /**
     * @param string $view
     * @return array
     * @throws ReflectionException
     */
    public function getViewFiles($view)
    {
        return [$this->getViewPath() . '/' . $view . '.php'];
    }

    /**
     * @param string $view
     * @param array $params
     * @param bool $echo
     * @return string|null
     * @throws ReflectionException
     */
    public function render($view, $params = [], $echo = true)
    {
        $html = Core::$plugin->view->renderFile($this->getViewFiles($view), $params, $this);
        if ($echo) {
            echo $html;
            return null;
        }
        return $html;
    }

    /**
     * @return self
     * @throws ReflectionException
     */
    public static function getInstance()
    {
        static $instances = [];
        $className = static::class;
        if (!isset($instances[$className])) {
            $instances[$className] = Core::createObject($className);
        }
        return $instances[$className];
    }
}
