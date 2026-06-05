<?php
/**
 * @var $item \luckywp\scriptsControl\plugin\entities\Item
 */

use luckywp\scriptsControl\core\admin\helpers\AdminHtml;
use luckywp\scriptsControl\core\admin\helpers\AdminUrl;
use luckywp\scriptsControl\core\helpers\Html;

?>
<div class="lwpscModalBox">
    <div class="lwpscModalBox_close lwpscModal-close" title="<?= esc_attr__('Cancel', 'luckywp-scripts-control') ?>"></div>
    <div class="lwpscModalBox_title"><?= esc_html__('Confirmation', 'luckywp-scripts-control') ?></div>
    <form
        action="<?= AdminUrl::toAjax('lwpsc_delete_item', ['id' => $item->id]) ?>"
        data-ajax-form="1"
    >
        <div class="lwpscModalBox_body">
            <?php if ($item->caption) { ?>
                <p>
                    <b><?= Html::encode($item->caption) ?></b>
                </p>
            <?php } ?>
            <p>
                <i><?= nl2br(Html::encode($item->body)) ?></i>
            </p>
            <p>
                <?= esc_html__('Are you sure to delete this code?', 'luckywp-scripts-control') ?>
            </p>
            <?= Html::hiddenInput('delete', 1) ?>
        </div>
        <div class="lwpscModalBox_footer">
            <div class="lwpscModalBox_footer_buttons">
                <?= AdminHtml::button(esc_html__('Cancel', 'luckywp-scripts-control'), [
                    'class' => 'lwpscModal-close ' . (is_rtl() ? 'lwpscFloatRight' : 'lwpscFloatLeft'),
                ]) ?>
                <?= AdminHtml::button(esc_html__('Delete', 'luckywp-scripts-control'), [
                    'theme' => AdminHtml::BUTTON_THEME_LINK_DELETE,
                    'submit' => true,
                    'class' => is_rtl() ? 'lwpscFloatLeft' : 'lwpscFloatRight',
                ]) ?>
            </div>
        </div>
    </form>
</div>