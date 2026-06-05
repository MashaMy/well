<?php

use luckywp\scriptsControl\admin\widgets\header\Header;
use luckywp\scriptsControl\core\Core;

?>
<div class="wrap">
    <?= Header::widget(['tab' => 'settings']) ?>
    <?php Core::$plugin->settings->showPage(false) ?>
</div>