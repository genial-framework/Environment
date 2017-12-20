## Env Configuration Adapter
The env configuration adapter is suppused to make the configifuration variables in the `env.ini` file easy to access. Autoloading using composer will create the `env()` function witch will be used to access the configuration variables. The `env()` is not case sensitive so lower case letters will work as long as the variable names are in capital letters.

### Basic Usage
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
The above example example will output a boolean value the evalutes to true. The first argument that is being passed if the section name so `application` would be what you would pass and for the second variable you would put `debug` to see if we hve debug enabled. Also when using the function know it does not return the variable type it will always return as a string so you would have to `$debug = (bool) env('application', 'debug');`
