# Time Tracker
Welcome to the source-code for a simple time-tracking app. It uses some of the latest PHP stuff you can find (at the time of writing) - so browse around and I hope you enjoy!

Some of the components / features:
* Composer
* Zend Framework 2
* Doctrine
* Apigility
* Ember.js
* OAuth2 Password authentication
* Boostrap
* Precompiles & minifies Ember templates and caches them to disk.

### INSTALLATION NOTES
* This is a Composer project, hopefully you know what that means.
* Requires Node.JS with the following modules:
    * uglifyjs
    * ember-precompile
* If you're on Windows you'll have to change the path to ember-precompile in
  `module/TimeTracker/config/module.config.php`, around line 6.
* Copy the following configuration files to the `config/autoload` folder and modify them according to your system settings:
    * `vendor/adamlundrigan/ldc-zf-oauth2-doctrine/config/ldc-zf-oauth2-doctrine.local.php.dist`
* Copy `config/autoload/local.php.dist` and rename it to `local.php` (in the same folder). Change settings accordinly.

### Database Setup
Once you configured your Doctrine DB adapter:
* Open a terminal and cd to the project webroot.
* Run the following command: `./vendor/bin/doctrine-orm-module orm:schema-tool:create --force`
* Your database schema will be created for you.

Then execute the statements in `data/db_timetracker.sql` to seed data to the database.

### OTHER NOTES
* [Created a Pull Request](https://github.com/kriswallsmith/assetic/pull/645) to allow Assetic's EmberPrecompileFilter to set the `--basedir` option.

------------------------------------------------------------------------------------------
