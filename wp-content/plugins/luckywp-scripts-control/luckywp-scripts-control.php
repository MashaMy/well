<?php
/*
Plugin Name: LuckyWP Scripts Control
Plugin URI: https://theluckywp.com/product/scripts-control/
Description: A great way to insert and manage custom code (CSS, JS, meta tags, etc.) into website before &lt;/head&gt;, after &lt;body&gt; or before &lt;/body&gt;.
Version: 1.2.1
Author: LuckyWP
Author URI: https://theluckywp.com/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: luckywp-scripts-control
Domain Path: /languages

LuckyWP Scripts Control is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

LuckyWP Scripts Control is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with LuckyWP Scripts Control. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

require 'lwpscAutoloader.php';
$lwpscAutoloader = new lwpscAutoloader();
$lwpscAutoloader->register();
$lwpscAutoloader->addNamespace('luckywp\scriptsControl', __DIR__);

$config = require(__DIR__ . '/config/plugin.php');
(new \luckywp\scriptsControl\plugin\Plugin($config))->run('1.2.1', __FILE__, 'lwpsc_');
