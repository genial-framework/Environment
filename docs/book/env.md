# Env Class
You can also get the configuration from the `.env.ini` file using the class directly.

## Setting The Config
You can manually set a new config by creating a custom array. If that is the case do not even worry about creating the `.env.ini` file s it is not needed. To simply set a config you would do the following below.

`test.php`
```php
<?php

use Genial\Env\Env as EnvAdapter;

require __DIR__ . '/bootstrap.php';

$config = [
    'application' => [
        'APP_SECRET_KEY' => null,
        'APP_NAME'       => 'Genial',
        'DEBUG'          => false,
        'LOG'            => true
    ],
];

EnvAdapter::setConfig($config);

// Configuration set

```
When setting the config, the array needs to be valid. Meaning it has to have a depth of 2, and the configuration variable name needs to be uppercase, the configuration variable name needs to have a length of 30, nd the value for it needs to hav a length of 250. Adding legths prevents overloading.

## Getting The Config
Once you set if manually you can access it through the `env()` function, but if you prefer the class you can do the following below.

`test.php`
```php
<?php

use Genial\Env\Env as EnvAdapter;

require __DIR__ . '/bootstrap.php';

$config = [
    'application' => [
        'APP_SECRET_KEY' => null,
        'APP_NAME'       => 'Genial',
        'DEBUG'          => false,
        'LOG'            => true
    ],
];

EnvAdapter::setConfig($config);

// Configuration set

$appName = EnvAdapter::getConfig('application', 'app_name'); // Same as `$appName = env('application', 'app_name');`

echo $appName;

```
> Doing the method above will not have a defualt return value. Instead it will throw an `UnderflowException` exception.

## Clearing The Config
If you want to clear the config just run the code below.

`test.php`
```php
<?php

use Genial\Env\Env as EnvAdapter;

require __DIR__ . '/bootstrap.php';

$config = [
    'application' => [
        'APP_SECRET_KEY' => null,
        'APP_NAME'       => 'Genial',
        'DEBUG'          => false,
        'LOG'            => true
    ],
];

EnvAdapter::setConfig($config);

// Configuration set

EnvAdapter::clearConfig();

// Configuration cleared

```
## Links
- https://github.com/Genial-Framework/Env/blob/master/docs/book/config.md
- https://github.com/Genial-Framework/Env/blob/master/docs/book/intro.md
