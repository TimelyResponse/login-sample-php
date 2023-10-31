Login-sample

Installation
------------

#### Clone the Repository
	$ git clone https://github.com/TimelyResponse/login-sample-php.git

#### Install necessary dependencies with `Composer`
	$ composer install --no-dev

#### Run through web-based installer
Open this link in your web browser (replacing [yoursite.com] with your site address)

    http://{yoursite.com}/install/index.php

Select an installation option from the pop-up modal that appears: `Automated` or `Manual`

***NOTE*** ** If you are upgrading from a prior version of PHP-Login (>3.1), you should install this version as new and then navigate to the `/install/legacymigration/index.php` page to migrate your existing data to the new application version (to reflect schema updates) **

[Automated Installation Instructions](docs/install_automated.md)

[Manual Installation Instructions](docs/install_manual.md)

Documentation
-------------
[Site Config Settings](docs/site_config.md)

[API Methods](docs/methods.md)

\* *Full API documentation can be found by nagivating to:* `{yoursite.com}/docs/api/index.html`

[Change Log](docs/changelog.md)
