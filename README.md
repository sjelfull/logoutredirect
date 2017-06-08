# Logout Redirect plugin for Craft CMS

Configure where to send users after they logout.

![Screenshot](resources/icon.png)

## Installation

To install Logout Redirect, follow these steps:

1. Download & unzip the file and place the `logoutredirect` directory into your `craft/plugins` directory
4. Install plugin in the Craft Control Panel under Settings > Plugins
5. The plugin folder should be named `logoutredirect` for Craft to see it.

Logout Redirect works on Craft 2.4.x and Craft 2.5.x.

## Configuring Logout Redirect

```php
<?php
// To redirect all users after logout - this will override the two other config options
'redirectAfterLogout' => '/goodbye',

// To redirect CP users after logout
'redirectAfterCpLogout'   => '/cp-goodbye',

// To redirect site users after logout
'redirectAfterSiteLogout' => '/goodbye',
```

Brought to you by [Superbig](https://superbig.co)
