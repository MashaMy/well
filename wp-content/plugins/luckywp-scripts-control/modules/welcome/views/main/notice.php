<?php

use luckywp\scriptsControl\core\admin\helpers\AdminHtml;
use luckywp\scriptsControl\core\admin\helpers\AdminUrl;

?>
<div class="notice notice-info lwpscNotice lwpscWelcome">
    <p>
        <?= sprintf(
        /* translators: %s: LuckyWP Scripts Control */
            esc_html__('%s — a great way to insert and manage custom code (CSS, JS, meta tags, etc.) into website.', 'luckywp-scripts-control'),
            '<b>LuckyWP Scripts Control</b>'
        ) ?>
    </p>
    <p class="lwpscNotice_buttons">
        <?= AdminHtml::buttonLink(esc_html__('Go to page "Scripts"', 'luckywp-scripts-control'), AdminUrl::toOptions('scripts'), [
            'theme' => AdminHtml::BUTTON_THEME_PRIMARY,
        ]) ?>
        <?= AdminHtml::button(esc_html__('Hide', 'luckywp-scripts-control'), [
            'class' => 'lwpscWelcome_hide',
            'theme' => AdminHtml::BUTTON_THEME_LINK,
        ]) ?>
    </p>
</div>