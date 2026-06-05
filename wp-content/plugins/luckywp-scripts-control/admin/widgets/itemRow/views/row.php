<?php
/**
 * @var $item \luckywp\scriptsControl\plugin\entities\Item
 */

use luckywp\scriptsControl\core\helpers\Html;

if ('' === $caption = $item->caption) {
    $caption = '<i>' . Html::encode(function_exists('mb_substr') ? mb_substr($item->body, 0, 32) : substr($item->body, 0, 32)) . '</i>';
} else {
    $caption = Html::encode($caption);
}
?>
<div class="lwpscManage_item<?= $item->active ? '' : ' lwpscManage_item-disabled' ?>" data-id="<?= $item->id ?>">
    <div class="lwpscManage_item_sortHandle">::</div>
    <div class="lwpscManage_item_caption"><?= $caption ?></div>
    <div class="lwpscManage_item_actions">
        <?php if ($item->active) { ?>
            <div class="lwpscManage_item_disable lwpscManage_item_action dashicons dashicons-hidden" title="<?= esc_attr__('Disable', 'luckywp-scripts-control') ?>"></div>
        <?php } else { ?>
            <div class="lwpscManage_item_enable lwpscManage_item_action dashicons dashicons-visibility" title="<?= esc_attr__('Enable', 'luckywp-scripts-control') ?>"></div>
        <?php } ?>
        <div class="lwpscManage_item_edit lwpscManage_item_action dashicons dashicons-edit" title="<?= esc_attr__('Edit', 'luckywp-scripts-control') ?>"></div>
        <div class="lwpscManage_item_delete lwpscManage_item_action dashicons dashicons-trash" title="<?= esc_attr__('Delete', 'luckywp-scripts-control') ?>"></div>
    </div>
</div>