<?php
/**
 * @var $itemsByArea array
 */

use luckywp\scriptsControl\admin\widgets\header\Header;
use luckywp\scriptsControl\admin\widgets\itemRow\ItemRow;
use luckywp\scriptsControl\core\admin\helpers\AdminHtml;
use luckywp\scriptsControl\core\helpers\ArrayHelper;
use luckywp\scriptsControl\plugin\entities\Area;

?>
<div class="wrap">
    <?= Header::widget(['tab' => 'scripts']) ?>
    <div class="lwpscManage">
        <div class="lwpscManage_tag">
            &lt;html&gt;
            <br>
            &lt;head&gt;
        </div>
        <div class="lwpscManage_area" data-id="<?= Area::HEAD ?>">
            <div class="lwpscManage_items">
                <?php
                foreach (ArrayHelper::getValue($itemsByArea, Area::HEAD, []) as $item) {
                    echo ItemRow::widget(['item' => $item]);
                }
                ?>
            </div>
            <div class="lwpscManage_add">
                <?= AdminHtml::button(esc_html__('Add Code', 'luckywp-scripts-control')) ?>
            </div>
        </div>
        <div class="lwpscManage_tag">
            &lt;/head&gt;
            <br>
            &lt;body&gt;
        </div>
        <div class="lwpscManage_area" data-id="<?= Area::BODY_BEGIN ?>">
            <div class="lwpscManage_items">
                <?php
                foreach (ArrayHelper::getValue($itemsByArea, Area::BODY_BEGIN, []) as $item) {
                    echo ItemRow::widget(['item' => $item]);
                }
                ?>
            </div>
            <div class="lwpscManage_add">
                <?= AdminHtml::button(esc_html__('Add Code', 'luckywp-scripts-control')) ?>
            </div>
        </div>
        <div class="lwpscManage_tag">
            … <?= esc_html__('page content', 'luckywp-scripts-control') ?> …
        </div>
        <div class="lwpscManage_area" data-id="<?= Area::BODY_END ?>">
            <div class="lwpscManage_items">
                <?php
                foreach (ArrayHelper::getValue($itemsByArea, Area::BODY_END, []) as $item) {
                    echo ItemRow::widget(['item' => $item]);
                }
                ?>
            </div>
            <div class="lwpscManage_add">
                <?= AdminHtml::button(esc_html__('Add Code', 'luckywp-scripts-control')) ?>
            </div>
        </div>
        <div class="lwpscManage_tag">
            &lt;/body&gt;
            <br>
            &lt;/html&gt;
        </div>
    </div>
</div>