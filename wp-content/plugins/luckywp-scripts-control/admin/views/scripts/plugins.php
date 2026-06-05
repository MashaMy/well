<?php
/**
 * @var $table WP_Plugin_Install_List_Table
 */

use luckywp\scriptsControl\admin\widgets\header\Header;

?>
<div class="wrap">
    <?= Header::widget(['tab' => 'plugins']) ?>
    <div id="plugin-filter">
        <?php $table->display() ?>
    </div>
</div>