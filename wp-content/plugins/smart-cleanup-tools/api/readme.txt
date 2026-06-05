=== Smart Envato API Library ===
Version: 5.4
Build:   5020
Author:  Milan Petrovic
Email:   support@smartplugins.info
Website: https://www.smartplugins.info/

== Files ==
* envato.api.php
* envato.data.php
* envato.functions.php
* readme.txt

== Storage ==
* store.transient.php
* store.site_transient.php

== Changelog ==
= 5.4 / 2020.06.12. =
* Few minor updates and improvements

= 5.3 / 2019.02.19. =
* Added get_attributes method for individual item
* Added title method for individual item
* Added title_formatted method for individual item
* Added improved processing of the item attributes
* Fixed cache cleanup for site transient cache

= 5.2 / 2019.02.12. =
* Switched to the ImpactRadius affiliates system support
* Updated all Envato URL's now use HTTPS based links

= 5.1 / 2016.09.27. =
* Added endpoint for 'user/statement'
* Added method for checking if Envato API is working
* Removed Legacy API support
* Remoced ActiveDen support
* Fixed missing 3DOcean search URL

= 5.0 / 2016.03.29. =
* Removed some outdated API calls from new API
* Added some missing API calls added recently
* Unified calls for all available calls according to new API

= 4.1.1 / 2015.09.09. =
* Item object includes new property for item name slug
* Fixed invalid URL's for individual items for preview and screenshots

= 4.1 / 2015.08.31. =
* Few minor updates to the new Envato API code
* Error logging now saves the debug trace of the call origin
* Fixed generating cache key to include personal tokan (new API)
* Fixed problem with generating URL query string (new API)
* Fixed missing vitals() method for compatibility purpose (new API)
* Fixed missing items() method for compatibility purpose (new API)
* Fixed problem with handling server error with no description (new API)
* Fixed problem with assigning username for private calls (legacy API)

= 4.0 / 2015.07.12. =
* Old API now moved to Legacy
* Added New API object
* New API uses Personal Token Authentication
