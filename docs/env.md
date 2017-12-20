## Env Configuration Adapter
The env configuration adapter is suppused to make the configifuration variables in the `env.ini` file easy to access. Autoloading using composer will create the `env()` function witch will be used to access the configuration variables. The `env()` is not case-sensitive so lowercase letters will work as long as the variable names are in capital letters.

### Getting the value from a configuration variable
For example, this is a simple `env.ini` file.

```
[application]
APP_NAME=Genial
DEBUG=true
LOG=true
```

Then if i wanted to check to see if debug is enabled i would do the following below.

```
<?php

/* Expects env dependent to be autoloaded. */

$debug = (bool) env('application', 'debug');

var_dump($debug);
```

The above example example will output a boolean value the evalutes to true. The first argument that is being passed if the section name so `application` would be what you would pass and for the second variable you would put `debug` to see if we hve debug enabled. Also when using the function know it does not return the variable type it will always return as a string so you would have to `$debug = (bool) env('application', 'debug');`.

### Manually setting your own configuration
If you want to manually insert a your own configuration array you need to make sure it is in correct format before insert or else the env configuration adapter will throw errors telling you why the array is not valid.

Here is a example configuration array below that will work.
```
[
    'application' => [
        'APP_SECRET_KEY' => null,
        'APP_NAME'       => 'Genial',
        'DEBUG'          => false,
        'LOG'            => true,
    ],
    'server' => [
        'FORCE_HTTPS' => false,
    ],
    'session' => [
        'SESSION_NAME'    => 'Genial',
        'SESSION_ENCRYPT' => true,
        'SESSION_ENCODE'  => true,
    ],
    'cookie' => [
        'COOKIE_LIFETIME'  => 0,
        'COOKIE_PATH'      => '/',
        'COOKIE_DOMAIN'    => 'localhost',
        'COOKIE_HTTP_ONLY' => true,
    ],
    'database' => [
        'DB_HOST' => null,
        'DB_USER' => null,
        'DB_PASS' => null,
        'DB_NAME' => null,
    ],
    'route' => [
        'ROUTING_ENABLED' => false,
    ]
]
```
Then to insert it manual you would call the env class statically like shown below.
```
<?php

/* Expects env dependent to be autoloaded. */

use Genial\Env\Env;

$array = [
    'application' => [
        'APP_SECRET_KEY' => null,
        'APP_NAME'       => 'Genial',
        'DEBUG'          => false,
        'LOG'            => true,
    ],
    'server' => [
        'FORCE_HTTPS' => false,
    ],
    'session' => [
        'SESSION_NAME'    => 'Genial',
        'SESSION_ENCRYPT' => true,
        'SESSION_ENCODE'  => true,
    ],
    'cookie' => [
        'COOKIE_LIFETIME'  => 0,
        'COOKIE_PATH'      => '/',
        'COOKIE_DOMAIN'    => 'localhost',
        'COOKIE_HTTP_ONLY' => true,
    ],
    'database' => [
        'DB_HOST' => null,
        'DB_USER' => null,
        'DB_PASS' => null,
        'DB_NAME' => null,
    ],
    'route' => [
        'ROUTING_ENABLED' => false,
    ],
];

Env::setConfig($array);

/* Configuration array set. */

```
