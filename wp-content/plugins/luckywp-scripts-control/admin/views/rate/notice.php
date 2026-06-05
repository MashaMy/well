<?php

use luckywp\scriptsControl\admin\Rate;
use luckywp\scriptsControl\core\admin\helpers\AdminHtml;

?>
<div class="notice notice-info lwpscNotice lwpscRate">
    <p>
        <?= esc_html__('Hello!', 'luckywp-scripts-control') ?>
        <br>
        <?= sprintf(
            esc_html__('We are very pleased that you are using the %s plugin within a few days.', 'luckywp-scripts-control'),
            '<b>LuckyWP Scripts Control</b>'
        ) ?>
        <br>
        <?= esc_html__('Please rate plugin. It will help us a lot.', 'luckywp-scripts-control') ?>
    </p>
    <p class="lwpscNotice_buttons">
        <?= AdminHtml::buttonLink(esc_html__('Rate the plugin', 'luckywp-scripts-control'), Rate::LINK, [
            'attrs' => [
                'data-action' => 'lwpsc_rate',
                'target' => '_blank',
            ],
            'theme' => AdminHtml::BUTTON_THEME_PRIMARY,
        ]) ?>
        <?= AdminHtml::button(esc_html__('Remind later', 'luckywp-scripts-control'), [
            'attrs' => [
                'data-action' => 'lwpsc_show_later',
            ],
            'theme' => AdminHtml::BUTTON_THEME_LINK,
        ]) ?>
        <?= AdminHtml::button(esc_html__('I\'ve already rated the plugin', 'luckywp-scripts-control'), [
            'attrs' => [
                'data-action' => 'lwpsc_already_rate',
            ],
            'theme' => AdminHtml::BUTTON_THEME_LINK,
        ]) ?>
    </p>
    <p>
        <b><?= esc_html__('Thank you very much!', 'luckywp-scripts-control') ?></b>
    </p>
</div>