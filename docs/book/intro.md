# Introduction
The env configuration file adapter is used to convert the `.env.ini` configuration file into an array that can be accessed using the `env` global function. This is mainly used throughout the entire framework so that each dependent can access a section array of configuration value or a single configuration value from a single section array.

## Before Your Start
Before you start you need to download/install composer so you can install the env configuration file adapter. After that create the `.env.ini` and the `bootstrap.php` file in the same directory as the `composer.json` and `composer.lock` files. In your `bootstrap.php` file you need to call the autoloader.

`bootstrap.php`
```php
<?php

// Needed so the `.env.ini file` is callable
define('APP_ROOT', __DIR__);

// Composer autoload
require APP_ROOT . '/vendor/autoload.php';

// At this point you are all set

```
## Usage
On every file just require the `bootstrap.php` to each file. The `env()` function has three arguments. The first argument is the name of the section you want to access. The second one is the name of the configuration variable inside the section you want to access. The last argument is used as a default return value if the variable is not found. This makes access to the `.env.ini` file easy.

> The `env()` function does not return it's actual data type

```php
<?php

require __DIR__

```
