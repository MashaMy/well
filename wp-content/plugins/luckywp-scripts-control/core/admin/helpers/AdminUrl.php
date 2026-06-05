<?php

namespace luckywp\scriptsControl\core\admin\helpers;

use luckywp\scriptsControl\core\Core;

class AdminUrl
{

    /**
     * @param string $pageId
     * @param string|null $action
     * @param array $params
     * @return string
     */
    public static function to($pageId, $action = null, $params = [])
    {
        return static::makePageUrl('admin.php', $pageId, $action, $params);
    }

    /**
     * @param string $pageId
     * @param string|null $action
     * @param array $params
     * @return string
     */
    public static function toOptions($pageId, $action = null, $params = [])
    {
        return static::makePageUrl('options-general.php', $pageId, $action, $params);
    }

    /**
     * @param string $action
     * @param array $params
     * @return string
     */
    public static function toAjax($action, $params = [])
    {
        $params['action'] = $action;
        return static::makeUrl('admin-ajax.php', $params);
    }

    /**
     * @param string $wpPage
     * @param string $pageId
     * @param string|null $action
     * @param array $params
     * @return string
     */
    protected static function makePageUrl($wpPage, $pageId, $action = null, $params = [])
    {
        $params['page'] = Core::$plugin->prefix . $pageId;
        if ($action !== null) {
            $params['action'] = $action;
        }
        return static::makeUrl($wpPage, $params);
    }

    /**
     * @param string $wpPage
     * @param array $params
     * @return string
     */
    protected static function makeUrl($wpPage, $params = [])
    {
        return admin_url($wpPage . '?' . http_build_query($params));
    }

    /**
     * @param string $pageId
     * @param string $action
     * @return bool
     */
    public static function isPage($pageId, $action = '')
    {
        return Core::$plugin->request->get('page') == Core::$plugin->prefix . $pageId
            && (!$action || Core::$plugin->request->get('action') == $action);
    }
}
