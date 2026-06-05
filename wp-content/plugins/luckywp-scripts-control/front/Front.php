<?php

namespace luckywp\scriptsControl\front;

use luckywp\scriptsControl\core\base\BaseObject;
use luckywp\scriptsControl\core\Core;
use luckywp\scriptsControl\core\helpers\ArrayHelper;
use luckywp\scriptsControl\plugin\entities\Area;

class Front extends BaseObject
{

    public function init()
    {
        add_action('plugins_loaded', function () {
            $itemsByArea = Core::$plugin->items->findAllGroupedByArea(true);

            if ($itemsByArea[Area::HEAD]) {
                add_action('wp_head', function () use ($itemsByArea) {
                    echo implode("\n", ArrayHelper::getColumn($itemsByArea[Area::HEAD], 'body'));
                });
            }

            if ($itemsByArea[Area::BODY_BEGIN]) {
                $html = implode("\n", ArrayHelper::getColumn($itemsByArea[Area::BODY_BEGIN], 'body'));
                if (Core::$plugin->settings->getUseWpBodyOpen()) {
                    add_action('wp_body_open', function () use ($html) {
                        echo $html;
                    }, 1);
                } else {
                    add_action('template_include', function ($template) use ($html) {
                        ob_start(function ($buffer) use ($html) {
                            return preg_replace('/<body[^>]*>/imu', '$0' . $html, $buffer, 1);
                        });
                        return $template;
                    }, 999);
                }
            }

            if ($itemsByArea[Area::BODY_END]) {
                add_action('wp_footer', function () use ($itemsByArea) {
                    echo implode("\n", ArrayHelper::getColumn($itemsByArea[Area::BODY_END], 'body'));
                });
            }
        });
    }
}
