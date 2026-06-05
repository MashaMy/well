<?php
/**
 * @var $model \luckywp\scriptsControl\admin\forms\item\ItemForm
 * @var $itemId int
 */

use luckywp\scriptsControl\core\admin\helpers\AdminHtml;
use luckywp\scriptsControl\core\admin\helpers\AdminUrl;
use luckywp\scriptsControl\core\helpers\Html;

?>
<div class="lwpscModalBox">
    <div class="lwpscModalBox_close lwpscModal-close" title="<?= esc_attr__('Cancel', 'luckywp-scripts-control') ?>"></div>
    <div class="lwpscModalBox_title"><?= esc_html__('Edit Code', 'luckywp-scripts-control') ?></div>
    <form
        action="<?= AdminUrl::toAjax('lwpsc_edit_item', ['id' => $itemId]) ?>"
        data-ajax-form="1"
    >
        <div class="lwpscModalBox_body">

            <?php
            if ($model->hasErrors()) {
                echo '<div class="lwpscModalForm_errors">';
                foreach ($model->getErrorSummary() as $error) {
                    echo '<p>' . $error . '</p>';
                }
                echo '</div>';
            }
            ?>

            <div class="lwpscModalForm_field">
                <div class="lwpscModalForm_field_label">
                    <?= $model->getAttributeLabel('caption') ?>
                </div>
                <div class="lwpscModalForm_field_el">
                    <?= AdminHtml::textInput(Html::getInputName($model, 'caption'), $model->caption) ?>
                </div>
            </div>

            <div class="lwpscModalForm_field">
                <div class="lwpscModalForm_field_label">
                    <?= $model->getAttributeLabel('body') ?>
                </div>
                <div class="lwpscModalForm_field_el">
                    <?= AdminHtml::textarea(Html::getInputName($model, 'body'), $model->body) ?>
                </div>
            </div>

        </div>
        <div class="lwpscModalBox_footer">
            <div class="lwpscModalBox_footer_buttons">
                <?= AdminHtml::button(esc_html__('Cancel', 'luckywp-scripts-control'), [
                    'class' => 'lwpscModal-close ' . (is_rtl() ? 'lwpscFloatRight' : 'lwpscFloatLeft'),
                ]) ?>
                <?= AdminHtml::button(esc_html__('Save', 'luckywp-scripts-control'), [
                    'theme' => AdminHtml::BUTTON_THEME_PRIMARY,
                    'submit' => true,
                    'class' => is_rtl() ? 'lwpscFloatLeft' : 'lwpscFloatRight',
                ]) ?>
            </div>
        </div>
    </form>
</div>