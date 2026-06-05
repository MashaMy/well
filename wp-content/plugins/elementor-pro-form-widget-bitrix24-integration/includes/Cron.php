<?php
namespace IwantToBelive\Elementor\Form\Bitrix\Integration\Includes;

class Cron
{
    private static $instance = false;

    protected function __construct()
    {
        add_action('init', [$this, 'createCron']);
        add_action(Bootstrap::CRON_TASK, [$this, 'cronAction']);
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function createCron()
    {
        if (!wp_next_scheduled(Bootstrap::CRON_TASK)) {
            wp_schedule_event(time(), 'hourly', Bootstrap::CRON_TASK);
        }
    }

    public function cronAction()
    {
        $settings = get_option(Bootstrap::OPTIONS_KEY);

        if (!empty($settings['webhook'])) {
            Crm::updateInformation();
        }
    }

    private function __clone()
    {
        // Nothing
    }
}
