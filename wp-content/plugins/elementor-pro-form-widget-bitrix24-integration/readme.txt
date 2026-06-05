=== Elementor Pro Form Widget - Bitrix24 CRM - Integration ===
Contributors: https://codecanyon.net/user/itgalaxycompany
Tags: bitrix24, bitrix24 integration, business leads, elementor pro form widget, elementor pro form widget bitrix24, form, integration, lead finder, lead management, lead scraper, leads, marketing leads, sales leads.

== Description ==

The main task of this plugin is a send your `Elementor Pro Form Widget` forms directly to your Bitrix24 account.

= Features =

* Integrate your `Elementor Pro Form Widget` forms with Bitrix24 CRM;
* Works with any edition of Bitrix24 CRM;
* You can choice that your want to generate - lead, deal, task, contact or company;
* You can set up each form personally, specify which information you want to get;
* Creation of the deal and the task, occurs together with the creation / binding of the contact and the company. (if their fields are filled);
* Creation of notifications in Bitrix24 CRM when adding a lead, deal and task.
* Fields are loaded from the CRM (including custom fields) (except for tasks);
* Integrate unlimited `Elementor Pro Form Widget` forms;
* Supports for uploaded files for types `lead` and `deal`;
* Multiple deal pipeline support;
* Supports getting `utm` params from the `URL`;
* Supports for sending `GA Client ID`;
* Supports for sending `roistat_visit`;
* Image previews;
* Super easy to set-up;

== Installation ==

1. Extract `elementor-pro-form-widget-bitrix24-integration.zip` and upload it to your `WordPress` plugin directory
(usually /wp-content/plugins ), or upload the zip file directly from the WordPress plugins page.
Once completed, visit your plugins page.
2. Be sure `Elementor Pro` Plugin is enabled.
3. Activate the plugin through the `Plugins` menu in WordPress.
4. Go to your `Bitrix24` -> `Applications` -> `Web hooks`.
5. Click `ADD WEB HOOK`. Choose `Inbound web hook`.
6. Check `Tasks`, `Tasks (extended permissions)`, `CRM` and `Chat and Notifications (im)`. Click the button `SAVE`.
7. Copy value from `REST call example URL` without `profile/`.
8. Go to the `Elementor` -> `Bitrix24`.
9. Insert in the field `Inbound web hook` copied value.
10. Validate webhook.
11. When editing forms you can add the `Actions After Submit` section several new action `Bitrix24`.

== Changelog ==

= 1.6.0 =
Feature: added the ability to log (disabled by default).
Feature: multiple responsible for type lead and deal.

= 1.4.1 =
Fixed: filling in the value for the text/link field, if multiple is enabled.
Feature: support for processing utm tags when using caching plugins.

= 1.3.0 =
Feature: ability to set task deadline in minutes.
Feature: ability to set priority for the task.

= 1.1.0 =
Feature: auto set responsible if not specified for task.
Fixed: required task fields.

= 1.0.1 =
Fixed: resolve utm params.

= 1.0.0 =
Initial public release
