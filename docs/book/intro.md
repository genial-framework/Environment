# Introduction
The env configuration file adapter is used to convert the `.env.ini` configuration file into an array that can be accessed using the `env` global function. This is mainly used throughout the entire framework so that each dependent can access a section array of configuration value or a single configuration value from a single section array.

## Before You Start
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
> It will always return the value as a string

`.env.ini`
```ini
[application]
APP_SECRET_KEY=null
APP_NAME      =Genial
DEBUG         =false
LOG           =true

```


`test.php`
```php
<?php

require __DIR__ . '/bootstrap.php';

$appName = env('application', 'app_name', '');

echo $appName;

```
The above exaple will output `Genial` the second argument is not case-sensitive so lowercase characters. If you want the data type to be bool you would do the example below.

`test.php`
```php

require __DIR__ . '/bootstrap.php';

$appName = (bool) env('application', 'debug', false);

var_dump(is_bool($appName));

```
Now that will output `true` becuase we converted the string value into a bool value.

You can only get the section if you want by not including the last two arguments. If the section does not exist it will throw a `UnderflowException` exception and return null from the `env()` function.

`test.php`
```php
require __DIR__ . '/bootstrap.php';

$appArray = env('application');

var_dump($appArray);

```
## Links
- https://github.com/Genial-Framework/Env/blob/master/docs/book/env.md
- https://github.com/Genial-Framework/Env/blob/master/docs/book/config.md


