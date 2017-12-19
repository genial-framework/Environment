## Env Configuration Adapter
The env configuration adapter is suppused to make the configifuration variables in the `env.ini` file easy to access. Autoloading using composer will create the `env()` function witch will be used to access the configuration variables. For example, if i had this in my `env.ini` file:
```
[application]
APP_NAME=Genial
DEBUG=true
LOG=true
```
