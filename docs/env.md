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
The above example example will output a boolean value the evalutes to true.
