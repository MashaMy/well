<?php
/**
 * @var $tab string
 */

use luckywp\scriptsControl\admin\Rate;
use luckywp\scriptsControl\core\admin\helpers\AdminUrl;

?>
<h1>LuckyWP Scripts Control</h1>
<h2 class="nav-tab-wrapper lwpscTabs">
    <a href="<?= AdminUrl::toOptions('scripts') ?>" class="nav-tab<?= $tab == 'scripts' ? ' nav-tab-active' : '' ?>">
        <span class="dashicons dashicons-editor-code"></span>
        <?= esc_html__('Scripts', 'luckywp-scripts-control') ?>
    </a>
    <a href="<?= AdminUrl::toOptions('scripts', 'settings') ?>" class="nav-tab<?= $tab == 'settings' ? ' nav-tab-active' : '' ?>">
        <span class="dashicons dashicons-admin-generic"></span>
        <?= esc_html__('Settings', 'luckywp-scripts-control') ?>
    </a>
    <a href="<?= AdminUrl::toOptions('scripts', 'plugins') ?>" class="nav-tab<?= $tab == 'plugins' ? ' nav-tab-active' : '' ?>">
        <span class="dashicons dashicons-admin-plugins"></span>
        <?= esc_html__('LuckyWP Plugins', 'luckywp-scripts-control') ?>
    </a>
    <a href="<?= Rate::LINK ?>" target="_blank" class="lwpscTabs_rate"><?= sprintf(
            esc_html__('Leave a %s plugin review on WordPress.org', 'luckywp-scripts-control'),
            '★★★★★'
        ) ?></a>
</h2>