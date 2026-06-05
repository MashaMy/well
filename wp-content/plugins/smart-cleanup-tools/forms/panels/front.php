<?php require(SCT_PATH.'forms/shared/status.php'); ?>

<div class="sct-front-content">
    <div class="sct-plugin-logo">
        <span class="sct-logo-smart">SMART</span>
        <span class="sct-logo-plugin">CLEANUP TOOLS</span>
    </div>
    <div class="sct-plugin-version">
        <?php echo $settings['__date__']; ?>
        <span class="sct-version-version">Version: <strong><?php echo $settings['__version__']; ?></strong></span>
    </div>

    <table>
        <thead>
            <tr>
                <th colspan="2"><?php _e("Quick Statistics Overview", "smart-cleanup-tools"); ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><?php _e("Number of cleanups", "smart-cleanup-tools"); ?></th>
                <td><strong><?php echo $globals['counter']; ?></strong></td>
            </tr>
            <tr>
                <th><?php _e("Records removed", "smart-cleanup-tools"); ?></th>
                <td><strong><?php echo $globals['rows']; ?></strong></td>
            </tr>
            <tr>
                <th><?php _e("Overhead removed", "smart-cleanup-tools"); ?></th>
                <td><strong><?php echo $globals['overhead']; ?></strong></td>
            </tr>
            <tr>
                <th><?php _e("Space recovered", "smart-cleanup-tools"); ?></th>
                <td><strong><?php echo sct_size_format($globals['space']); ?></strong></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="sct-front-extras">
    <h3><?php _e("Information", "smart-cleanup-tools"); ?></h3>
        <a class="button-secondary" href="admin.php?page=smart-cleanup-tools-front"><?php _e("Front Page", "smart-cleanup-tools"); ?></a>
        <a class="button-secondary" href="admin.php?page=smart-cleanup-tools-about"><?php _e("About", "smart-cleanup-tools"); ?></a>

    <h3><?php _e("Cleanup", "smart-cleanup-tools"); ?></h3>
        <a class="button-secondary" href="admin.php?page=smart-cleanup-tools-cleanup"><?php _e("Cleanup", "smart-cleanup-tools"); ?></a>
        <a class="button-secondary" href="admin.php?page=smart-cleanup-tools-reset"><?php _e("Reset", "smart-cleanup-tools"); ?></a>
        <?php if (!is_network_admin()) { ?>
        <a class="button-secondary" href="admin.php?page=smart-cleanup-tools-removal"><?php _e("Removal", "smart-cleanup-tools"); ?></a>
        <?php } ?>

    <h3><?php _e("Tools", "smart-cleanup-tools"); ?></h3>
        <a class="button-secondary" href="admin.php?page=smart-cleanup-tools-scheduler"><?php _e("Scheduler", "smart-cleanup-tools"); ?></a>
        <a class="button-secondary" href="admin.php?page=smart-cleanup-tools-statistics"><?php _e("Statistics", "smart-cleanup-tools"); ?></a>
        <a class="button-secondary" href="admin.php?page=smart-cleanup-tools-logs"><?php _e("View Logs", "smart-cleanup-tools"); ?></a>
        <a class="button-secondary" href="admin.php?page=smart-cleanup-tools-settings"><?php _e("Settings", "smart-cleanup-tools"); ?></a>
        <a class="button-secondary" href="admin.php?page=smart-cleanup-tools-impexp"><?php _e("Export / Import", "smart-cleanup-tools"); ?></a>
</div>
<div class="sct-front-extras" id="sct-quick-cleanup-results">
    <form method="POST" id="sct-cleanup-form-quick">
        <?php wp_nonce_field('smart-cleanup-tools-cleanup'); ?>

        <input type="hidden" name="sct[scope]" value="<?php echo $scope; ?>" />
        <input type="hidden" name="sct[quick]" value="on" />

        <div class="sct-front-quick">
            <div><?php _e("Quick Cleanup", "smart-cleanup-tools"); ?></div>
        </div>
        <div class="sct-quick-overviews">
            <div class="sct-overview-item"><?php _e("Tools", "smart-cleanup-tools"); ?>: <span><?php echo $summary['quick_active']; ?></span></div>
            <div class="sct-overview-item"><?php _e("Records", "smart-cleanup-tools"); ?>: <span><?php echo $summary['quick_records']; ?></span></div>
            <div class="sct-overview-item"><?php _e("Size", "smart-cleanup-tools"); ?>: <span><?php echo str_replace(' ', '', sct_size_format($summary['quick_size'])); ?></span></div>
        </div>

        <div class="sct-quick-notices">
            <?php _e("Some tools are not available for Quick Cleanup, and you should use main Cleanup panel to approve everything that can be removed.", "smart-cleanup-tools"); ?> 
            <strong><?php _e("As always, to be extra safe, backup your database before proceeding.", "smart-cleanup-tools"); ?></strong>
        </div>

        <?php echo join('', $results['quick']); ?>

        <input<?php echo $summary['quick_active'] == 0 ? ' disabled="disabled"' : ''; ?> id="sct-cleanup-quick" class="button-primary" type="submit" value="<?php _e("Run Quick Cleanup", "smart-cleanup-tools"); ?>" />
    </form>
</div>
